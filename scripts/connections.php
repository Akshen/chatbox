<?php 
	
	$servername = 'localhost';
	$username = 'root';
	$password = 'N!n?@47';
	$db_name = 'records';

	//Create Connection 
	//$conn = new PDO('mysql:host=localhost;dbname=records',$username,$password);

	if($conn = new mysqli($servername,$username,$password,$db_name)){
		 return true;
	}
	else
	{
		echo "Error in connection of db";
	}
	
	

?>