<?php
	
	$us_id;
	if(isset($_GET['user_id'])){
		$the_user_id = $_GET['user_id'];
	}
	
		$query = "SELECT * FROM users WHERE user_id={$the_user_id}";
		$user = mysqli_query($connection, $query);
		
		while($row = mysqli_fetch_assoc($user)){
			$user_firstname = $row['user_firstname'];
			$user_lastname = $row['user_lastname'];
			$user_email = $row['user_email'];
			$user_role = $row['user_role'];
			
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
		<div class = "row">
			<div class="col-xs-3">
				<div class="form-group">
				<label for="user_role">User Role</label>
				<select name="user_role" id="" class="form-control">
				<?php

					if($user_role == 'Admin'){
							echo "<option selected value='Admin'>Admin</option>";
							echo "<option value='Subscriber'>Subscriber</option>";
						}
					else{
						echo "<option  value='Admin'>Admin</option>";
						echo "<option selected value='Subscriber'>Subscriber</option>";
					}
						
				?>
				</select>
			</div>
			
			</div>
		</div>
		
		
		
		<div class="form-group">
			<input type="submit" class="btn btn-primary" name="update_user" value="Update User" />
		</div>
	
	</form>
	
<?php

	if(isset($_POST['update_user'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$user_firstname = $_POST['user_firstname'];
		$user_lastname = $_POST['user_lastname'];
		$user_email = $_POST['user_email'];
		$user_role = $_POST['user_role'];
		
		
		
		$query = "UPDATE users SET ";
		$query .="user_firstname = '{$user_firstname}', ";
		$query .="user_lastname = '{$user_lastname}', ";
		$query .="user_email = '{$user_email}', ";
		$query .="user_role = '{$user_role}' ";
		$query .="WHERE user_id = {$us_id}";

		$update_user_query = mysqli_query($connection, $query);
		if(!$update_user_query){
			die("Update Failed " . mysqli_error());
		}

	}

?>
