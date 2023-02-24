<?php
$username = $_POST['username'];
$password = $_POST['password'];

if(!empty($username)||!empty($password)){
	$host = "localhost";
	$dbusername = "root";
	$dbpassword ="";
	$dbname = "logincheck";

	$conn  = new mysqli ($host,$dbusername,$dbpassword,$dbname);

	if(mysqli_connect_error()){
		die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
	}
	else{
		$query = "SELECT * from logincheck where username='$username' and password='$password'";
		$result = mysqli_query($conn,$query);
		$count=mysqli_num_rows($result);
		if($count>0){
			header("Location:dashboard.html");
		}
		else{
			echo "Incorrect username or password";
		}
	}
}
?>