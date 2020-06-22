<?php include "db.php" ?>
<?php session_start(); ?>
<?php 
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$username = mysqli_real_escape_string($connection, $username);
	$password = mysqli_real_escape_string($connection, $password);
	
	$password = crypt($password, '$2a$07$usesomesillystringforsalt$');
	
	$query = "SELECT * FROM users WHERE username = '{$username}'";
	$select_user = mysqli_query($connection, $query);
	
	if(!$select_user){
		die("Query Failed " . mysqli_error($connection));
	}
	
	while($row = mysqli_fetch_array($select_user)){
		$db_user_id = $row['user_id'];	
		$db_username = $row['username'];	
		$db_password = $row['user_password'];	
		$db_user_firstname = $row['user_firstname'];	
		$db_user_lastname = $row['user_lastname'];
		$db_user_role = $row['user_role'];
		

	}
		
	if($username !== $db_username ||  $password !== $db_password){
		
		header("Location: /cms/");
	}
	else {
	$_SESSION['user_id'] = $db_user_id;
	$_SESSION['username'] = $db_username;
	$_SESSION['firstname'] = $db_user_firstname;
	$_SESSION['lastname'] = $db_user_lastname;
	$_SESSION['user_role'] = $db_user_role;
	
		if($_SESSION['user_role'] == 'Subscriber'){
			header("Location: ../user");
		}else{
			header("Location: ../admin");
		}
	
	}
}





?>