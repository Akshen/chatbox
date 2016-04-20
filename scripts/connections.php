<?php 
	
	$servername = 'localhost';
	$username = 'root';
	$password = 'N!n?@47';
	$db_name = 'records';

	//Create Connection 
	//$conn = new mysqli($servername,$username,$password,$db_name);

	if($conn = new mysqli($servername,$username,$password,$db_name)){
		 return true;
	}
	else
	{
		echo "Error in connection of db";
	}
	
	

?>