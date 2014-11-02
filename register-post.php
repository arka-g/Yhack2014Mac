<?php
$uname = $_POST['username'];
$userfound = false;

try{
error_reporting(0);
$m = new MongoClient(); // create a new mongo client
//global $db = $m->selectDB("login"); // select our database
$db = $m->login;
$collection = $db->mycol; //
$findUser = $collection->find();
echo "Connected to the mongodb server";


if (isset($_POST['username']) && isset($_POST['password'])) 
{
    
    foreach($findUser as $user){
            $storedUser = $user["username"]; 

            if ($uname == $storedUser){
                $userfound = true;
                break;
            }
        }

    if ($userfound == false){
    $document = array("username" => $_POST['username'],"password" => $_POST['password'],"value" => []);
    $collection->insert($document);
    header('Location: index.php');

    } else if ($userfound == true){
        echo "There is already a user with this username";
    }

}

} catch (MongoConnectionException $e) {
  echo "Couldn't conect to the mongodb server";
}

?>