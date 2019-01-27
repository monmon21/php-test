<?php 
session_start();

if(isset($_SESSION["login"]) ) {
	header("Location: index1.php");
	exit;
}


require 'functions.php';


if(isset($_POST["login"])){

	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];


	$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' && email = '$email'");
	//cek email


	//cek username
	if(mysqli_num_rows($result) === 1){


		//cek password

		$row = mysqli_fetch_assoc($result);
		if(password_verify($password, $row["password"])){
			// set session
			$_SESSION["login"] = true;

			header("Location: index1.php");
			exit;
		}
	}

	$error = true;
}

 ?>





<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<style>
		label{
			display: block;
		}
	</style>
</head>
<body>

<form action="" method="post">
	<h1> Halaman Login </h1>

	<?php if(isset($error)) :?>
		<p style="color:red; font-style: italic">Username/email/password salah</p>
	<?php endif; ?>
	
	<ul>
		<li>
			<label for="username">Username :</label>
			<input type="text" name="username" id="username"
			required>
		</li>
		<li>
			<label for="email">Email :</label>
			<input type="text" name="email" id="email"
			required>
		</li>
		<li>
			<label for="password">Password :</label>
			<input type="password" name="password" id="password"
			required>
		</li>
		<li>
			<button type="submit" name="login"> LOGIN </button>
		</li>
		<li>
			<p> Belum Regist ? <a href="registrasi.php">Sign Up</a></p>
		</li>
	</ul>
</form>

</body>
</html>