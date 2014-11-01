<?php
	$username = $_POST['username'];
	$password = $_POST['password'];
	try{
		//echo "AS";
		$connection = new MongoClient();
		//connect to login db
		$db = $connection->login;

		//select a collection
		$collection = $db->mycol;

		//find all the entries in our collection that match that username
		$findUser = $collection->find();

		// foreach($findUser as $count){
		// 	echo $count["username"];
		// }
		//loop through found results
		foreach($findUser as $user){
			$storedUser = $user["username"]; //useless
			$storedPass = $user["password"];
			if ($username == $storedUser && $password == $storedPass){
				//echo "yes you are a user";
				header('Location: main.php');

			}
			else{
//				echo "no you suck";
				header('Location: index.html');
			}
			
		}

		//check if entered username matches db username
		

	}
	catch ( MongoConnectionException $e )
	{
	    // if there was an error, we catch and display the problem here
	    echo $e->getMessage();
	}
?>