<?php
	
	
		$the_user_id = $_SESSION['user_id'];
	
		$query = "SELECT * FROM users WHERE user_id={$the_user_id}";
		$user = mysqli_query($connection, $query);
		
		while($row = mysqli_fetch_assoc($user)){
			$password = $row['user_password'];
			$user_firstname = $row['user_firstname'];
			$user_lastname = $row['user_lastname'];
			$user_email = $row['user_email'];
			$us_id = $the_user_id;
		}	
?>



<form action="" method="post" enctype="multipart/form-data">
		
		<div class="form-group">
			<label for="user_firstname">First Name</label>
			<input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname" />
		</div>
		<div class="form-group">
			<label for="user_lastname">Last Name</label>
			<input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname" />
		</div>
		<div class="form-group">
			<label for="user_email">Email</label>
			<input value="<?php echo $user_email; ?>" type="text" class="form-control" name="user_email" />
		</div>
		
		<div class="form-group">
			<label for="password">Set New Password</label>
			<input value="" type="text" class="form-control" name="password" />
		</div>
		
		
		<div class="form-group">
			<input type="submit" class="btn btn-primary" name="update_user" value="Update Profile" />
		</div>
	
	</form>
	
<?php

	if(isset($_POST['update_user'])){
		
		if($_POST['password'] !== ''){
			$password2 = $_POST['password'];
			$password2 = crypt($password2, '$2a$07$usesomesillystringforsalt$');
			
		}
		else{
			$password2 = $password;
		}
		
		
		$user_firstname = $_POST['user_firstname'];
		$user_lastname = $_POST['user_lastname'];
		$user_email = $_POST['user_email'];
		
		$query = "UPDATE users SET ";
		$query .="user_password = '{$password2}', ";
		$query .="user_firstname = '{$user_firstname}', ";
		$query .="user_lastname = '{$user_lastname}', ";
		$query .="user_email = '{$user_email}' ";
		$query .="WHERE user_id = {$us_id}";
		
		//echo $query . '<br>';
		
		$update_user_query = mysqli_query($connection, $query);
		if(!$update_user_query){
			die("Update Failed " . mysqli_error());
		}
		header("Location: profile.php");

	}

?>
