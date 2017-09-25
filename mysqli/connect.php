<?php

	//connection file

	$servername = "localhost";

	$username = "root";

	$password = "";

	$databsename = "crud";

	//Establish connection 

	$conn = mysqli_connect($servername ,$username ,$password ,$databsename );

	//check for valid connection

	if(!$conn)
		die("connection failed");
	else
		//echo "Connected";

?>