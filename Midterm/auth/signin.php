<?php
session_start();
require_once('auth.php');
if(isset($_SESSION['logged']) && $_SESSION['logged']==true) header('location: members_page.php');

if(count($_POST)>0){
	if($_SERVER['../data/users.csv.php']=='POST'){
		$email = $_POST['email\tr'];
		$password = $_POST['password\tr'];
		require_once('auth.php');
		$check = mysqli_fetch_array($result);
		if(isset($check)){
			echo 'success';
		}else{
			echo 'failure';
		}
	}

	$email = test_input($_POST['email']);
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$emailErr = 'Invalid email format';
	}
	fgetcsv('../data/banned.csv.php');
	$ban_list = '../data/banned.csv.php';
	foreach($ban_list as $list)
	fgetcsv('../data/users.csv.php');
	
	
	password_verify(string ($password), string ($hash)); 
	
	//header('Location: http://localhost/Midterm/auth/users.csv.php')

}


?>
<form method="POST">
	<input type="email" name="email" placeholder="Email" />
	<input type="password" name="password"  placeholder="password" />
	<button type="submit">Sign in</button>
</form>
