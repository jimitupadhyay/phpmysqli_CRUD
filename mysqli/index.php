<?php
	
	//include("connect.php");
	
	echo "Login page";

?>

<html>
	<title>Login Page
	</title>
	<head>
	</head>
	<body>
	<form method="post" action="loginprocess.php" name="loginform" id="loginform">
		<table>
			<tr>
				<td>name</td><td><input name="name" id="name" type="text"></td>
			</tr>
			<tr>
				<td>password</td><td><input name="password" id="password" type="password"></td>
			</tr>
			<tr>
				<td><input type="submit" value="Login" id="login" /></td>
			</tr>
		</table>
	</form>
	</body>
</html>
