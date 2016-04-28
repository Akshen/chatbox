<?php
	$servername = 'localhost';
	$username = ''; //Your Username
	$password = ''; //Your Password
	$db_name = 'records'; //Your DB name

	if($conn = new mysqli($servername,$username,$password,$db_name)){
		 return true;
	}
	else
	{
		echo "Error in connection of db";
	}

?>
