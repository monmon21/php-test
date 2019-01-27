<?php 
require 'functions.php';


if(isset($_POST["register"])){


	if( registrasi($_POST) > 0){
		echo"
			<script>
			alert ('Data berhasil di registrasi');
			document.location.href='login.php';
			</script>
			";
	} else {
		echo mysqli_error($conn);
	}
}



 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
	<style>
		label{
			display: block;
		}
	</style>
</head>
<body>
<form action="" method="post">

<h1> ISI DATA REGISTRASI </h1>

<ul>
	<li>
		<label for="username">Username :</label>
		<input type="text" name="username" id="username"
		required 
		>
	</li>
	<li>
		<label for="email">Email :</label>
		<input type="text" name="email" id="email"
		required
		>
	</li>
	<li>
		<label for="password">Password :</label>
		<input type="password" name="password" id="password"
		required
		>
	</li>
	<li>
		<label for="password2">Konfirmasi password :</label>
		<input type="password" name="password2" id="password2"
		required
		>
	</li>
	<li>
		<button type="submit" name="register"> LOGIN </button>
	</li>
	<li>
		<p> tidak jadi regist ? <a href="login.php">Kembali ke menu login</a></p>
	</li>
</ul>
</form>
</body>
</html>