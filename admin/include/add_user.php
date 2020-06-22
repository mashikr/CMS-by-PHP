<?php
		if(isset($_POST['create_user'])){
			$username = $_POST['username'];
			
			$password = $_POST['password'];
			$password = crypt($password, '$2a$07$usesomesillystringforsalt$');
			
			$user_firstname = $_POST['user_firstname'];
			$user_lastname = $_POST['user_lastname'];
			$user_email = $_POST['user_email'];
			$user_role = $_POST['user_role'];
			
			$query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email,user_role) ";
			$query .="VALUES ('{$username}','{$password}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_role}')";
			
			$create_post_query = mysqli_query($connection, $query);
			if(!$create_post_query){
				die("QUERY FAILED " . mysqli_error($connection));
			}
			else{
				echo "User Created : <a href='user.php'> View Users</a><br />";
			}
		
		}
	?>
	<form action="" method="post" enctype="multipart/form-data">
		
		<div class="form-group">
			<label for="user_firstname">First Name</label>
			<input type="text" class="form-control" name="user_firstname" />
		</div>
		<div class="form-group">
			<label for="user_lastname">Last Name</label>
			<input type="text" class="form-control" name="user_lastname" />
		</div>
		<div class="form-group">
			<label for="user_email">Email</label>
			<input type="text" class="form-control" name="user_email" />
		</div>
		
		<div class = "row">
			<div class="col-xs-3">
				<div class="form-group">
				<label for="user_role">User Role</label>
				<select name="user_role" id="" class="form-control">
					<option value="Subscriber">Subscriber</option>
					<option value="Admin">Admin</option>
				</select>
			</div>
			
			</div>
		</div>
		
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" class="form-control" name="username" />
		</div>
		
		<div class="form-group">
			<label for="password">Password</label>
			<input type="text" class="form-control" name="password" />
		</div>
		
		<div class="form-group">
			<input type="submit" class="btn btn-primary" name="create_user" value="Add User" />
		</div>
	
	</form>
	
