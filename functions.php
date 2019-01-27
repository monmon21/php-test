<?php 
$conn = mysqli_connect("localhost","root","","login");

function registrasi($data){
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	$email = mysqli_real_escape_string($conn, $data["email"]);
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	
	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM users WHERE username='$username'");

	if (filter_var($email, FILTER_VALIDATE_EMAIL) == true){
		echo "";
	}else {
		
		echo "Bukan alamat email";

		return false;
	}


	if(mysqli_fetch_assoc($result)){
		echo"
			<script>
			alert ('username sudah ada');
			</script>
		";

		return false;
	} 


	//cek konfirmasi password
	if($password !== $password2){
		echo"
		<script>
		alert('konfirmasi password tidak sesuai');
		</script>
		";

		return false;
	} 



	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambahkan useername ke database
	mysqli_query($conn, "INSERT INTO users VALUES ('','$username','$email','$password')");


	return mysqli_affected_rows($conn);
}



 ?>