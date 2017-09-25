<?php
include("connect.php");
session_start();

if(!$_SESSION['user']){

	echo "<script type='text/javascript'>document.location.href='index.php';</script>";

}
if(isset($_REQUEST['up'])){
	if($_REQUEST['up']){
		$sql = "select * from user where id=".$_REQUEST['up'];
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
	}
}
if(isset($_REQUEST['up1'])){
	if($_REQUEST['up1']){

		
		$updateSQL = "update user set name='".$_REQUEST['name']."', password='".$_REQUEST['password']."', email='".$_REQUEST['email']."' where id=".$_REQUEST['up1'];

		$smt = $conn->query($updateSQL);
		
		
		echo "<script type='text/javascript'>alert('Updated...');</script>";
		echo "<script type='text/javascript'>document.location.href='home.php';</script>";

	

	}
}
else if(isset($_REQUEST['new'])){
	if($_REQUEST['new']){

	
	$insertSQL = "INSERT INTO USER (name, password, email) VALUES (?, ?, ?)";
	$stmt = $conn->prepare($insertSQL);
	$stmt->bind_param("sss", $name, $password, $email);
	
	$name = $_REQUEST['name'];
	$password = $_REQUEST['password']; 
	$email = $_REQUEST['email'];

	$stmt->execute();

	echo "<script type='text/javascript'>alert('SAVED...');</script>";
	echo "<script type='text/javascript'>document.location.href='home.php';</script>";

	

}
}

?>
<html>
	<title>
	</title>
	<head>
	</head>
	<body>
		<form method="post" action="new.php" name="loginform" id="loginform">
		<table>
			<tr>
				<td>name</td><td><input name="name" id="name" type="text"

				value="<?php 
				if(isset($_REQUEST['up'])){
					if($_REQUEST['up']){
						echo $row['name'];
					}
				}	
				?>"
				></td>
			</tr>
			<tr>
				<td>password</td><td><input name="password" id="password" type="password"
				value="<?php 
				if(isset($_REQUEST['up'])){
					if($_REQUEST['up']){
						echo $row['password'];
					}
				}	
				?>"
				></td>
			</tr>
			<tr>
				<td>EMAIL ID</td><td><input name="email" id="email" type="text"
				value="<?php 
				if(isset($_REQUEST['up'])){
					if($_REQUEST['up']){
						echo $row['email'];
					}
				}	
				?>"
				></td>
				<?php 
				if(isset($_REQUEST['up'])){
					if($_REQUEST['up']){
						echo "<input type='hidden' value=".$row['id']." name='up1' />";
					}
				}	
				?>
			</tr>
			<tr>
				<?php 
				if(isset($_REQUEST['up'])){
					if($_REQUEST['up']){
					
				?>
				<td><input type="submit" value="Update" id="up" /></td>
				<?php
					}
				} 
				else{
				?>
				<td>
				<input type="hidden" value="new" name="new" />
				<input type="submit" value="ADD" id="add" /></td>
				<?php 
				}
				?>
			</tr>
		</table>
	</form>
	</body>
</html>