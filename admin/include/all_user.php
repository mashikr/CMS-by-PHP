<table class="table table-bordered table-hover">
		<thead>
			<tr>
			  <th>ID</th>
			  <th>User Name</th>
			  <th>First Name</th>
			  <th>Last Name</th>
			  <th>Email</th>
			  <th>Role</th>
			</tr>
		 </thead>
		 <tbody>
		 <?php
							 
		$query = "SELECT * FROM users";
		$all_user = mysqli_query($connection, $query);
		
		while($row = mysqli_fetch_assoc($all_user)){
			$user_id = $row['user_id'];
			$username = $row['username'];
			$user_firstname = $row['user_firstname'];
			$user_lastname = $row['user_lastname'];
			$user_email = $row['user_email'];
			$user_role = $row['user_role'];
			
			echo "<tr>";
			echo "<td>$user_id</td>";
			echo "<td>$username</td>";
			echo "<td>$user_firstname</td>";
			echo "<td>$user_lastname</td>";
			echo "<td>$user_email</td>";
			echo "<td>$user_role</td>";
			echo "<td><a href='user.php?us_id={$user_id}'>Admin</a></td>";
			echo "<td><a href='user.php?user_id={$user_id}'>Subscriber</a></td>";
			echo "<td><a href='user.php?source=edit_user&user_id={$user_id}'>Edit</a></td>";
			echo "<td><a href='user.php?delete={$user_id}'>Delete</a></td>";
			echo "</tr>";
		}
	 ?>
	 
	 
	 </tbody>

</table>

<?php
	if(isset($_GET['us_id'])){
		$user_id = $_GET['us_id'];
		
		$query = "UPDATE users SET user_role = 'Admin' WHERE user_id = $user_id";
		$STATUS_query = mysqli_query($connection, $query);
		if(!$STATUS_query){
			die("QUERY FAILED " . mysqli_error($connection));
		}
		header("Location: user.php");
	}
	if(isset($_GET['user_id'])){
		$user_id = $_GET['user_id'];
		
		$query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = $user_id";
		$STATUS_query = mysqli_query($connection, $query);
		if(!$STATUS_query){
			die("QUERY FAILED " . mysqli_error($connection));
		}
		header("Location: user.php");
	}

	if(isset($_GET['delete'])){
		$user_id = $_GET['delete'];
		
		if(isset($_SESSION['user_role'])){
			if($_SESSION['user_role'] == 'admin'){
				$query = "DELETE FROM users WHERE user_id = {$user_id}";
				$delete_query = mysqli_query($connection, $query);
				if(!$delete_query){
					die("Query Failed " . mysqli_error());
				}
				header("Location: user.php");
			}
		}

	}
?>