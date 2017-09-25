<?php
include("connect.php");
session_start();

if(!$_SESSION['user']){

	echo "<script type='text/javascript'>document.location.href='index.php';</script>";

}
if(isset($_REQUEST['del'])){
if($_REQUEST['del']){

	$sqlDel = "delete from user where id=".$_REQUEST['del'];
	$conn->query($sqlDel);
	echo "<script type='text/javascript'>document.location.href='home.php';</script>";
}
}

$sqlFetchData = "select * from user";

$result = $conn->query($sqlFetchData);


?>

<html>
	<title>
	</title>
	<head>
	</head>
	<body>
		<table>
			<tr><td>HI | <a href="logout.php">Log Out</a></td>
			</tr>
			<tr><td>DATA<a href="new.php">(new)</a></td>
			</tr>
			<tr><th>ID</th><th>Name</th><th>Email</th><th>DELETE</th><th>Upadate</th>
			</tr>
			<?php

			while ($row = $result->fetch_assoc()){
			
				echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td><a href='home.php?del={$row['id']}'>delete</a></td><td><a href='new.php?up={$row['id']}'>Update</a></td></tr>";
			
			}

			?>
		</table>
	</body>
</html>
