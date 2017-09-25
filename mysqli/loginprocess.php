<?php

	print_r($_REQUEST);

	//Call Connection

	include("connect.php");

	$sqlFetchUsers = "select * from user";// where name=".$_REQUEST["name"];

	$resultFetchUsers = $conn->query($sqlFetchUsers);

	while( $row = $resultFetchUsers->fetch_assoc()){

		if($row["name"] == $_REQUEST['name']){
		
			if($row["password"] == $_REQUEST['password']){	

				echo "yes";
				
				session_start(); //Start Seesion
			
				$_SESSION['user'] = $row["id"];
				
				echo "<script type='text/javascript'>document.location.href='home.php';</script>";



			}
			else{

				echo "Wrong Password";			

			}	

		}else{

			echo "No user Found ";
			
		}		
	
	}

?>