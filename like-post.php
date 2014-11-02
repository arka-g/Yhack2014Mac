<?php

try
{
$obj = $_GET['y'];
$m = new MongoClient(); // create a new mongo client
$db = $m->login;
$collection = $db->mycol; //
echo "Connected to the mongodb server";

// $like = $_POST['json_obj'];
//echo $obj;
$finalarr = explode (" ", $obj);
$query = array('username' => $finalarr[2]);
$projection = array("_id" => 0, "username" => 1, "password" => 1, "value" =>1);
$findUser = $collection->find(array('username'=>$finalarr[2]));
//var_dump($query["value"]);
$findUser = $collection->find($query,$projection);
foreach ($findUser as $key) {
	//var_dump($key["value"]);	
}
array_push($key["value"], $finalarr[0]);
var_dump($key["value"]);
// print_r(array($key => ["value"]));
//var_dump($new_arr);					$key => value
//[1,2(space),3(name)]
// $collection->update(
// 	array()
// 	{		
// 	'username':'$finalarr[2]'
// 	},
// 	{
// 		$set:
// 		{
// 			value:$finalarr[0]
// 		}
// 	}
// );
//db.mycol.update({'username':'kevin'},{$set:{value: 0}})
// echo "num1 : " +  $finalarr[0];
// echo "num2 : " + $finalarr[1];
// $findUser = $collection->find();

//var_dump($obj);
// $newdata=array('$set'=>array("value"=>$finalarr[0]));
$newdata=array('$set'=>array("value"=>$key["value"]));
// //var_dump($new_arr);
$collection->update(array("username"=>$finalarr[2]),$newdata);
	// break;
}
catch (MongoConnectionException $e) 
{
  die("Couldn't conect to the mongodb server");
}

?>