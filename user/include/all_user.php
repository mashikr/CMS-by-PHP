<div class="row">
<div id="user-card">
	<?php
				 
		$query1 = "SELECT * FROM users";
		$all_user1 = mysqli_query($connection, $query1);
		
		while($row = mysqli_fetch_assoc($all_user1)){
			$user_firstname = $row['user_firstname'];
			$user_lastname = $row['user_lastname'];
			$user_email = $row['user_email'];
			$user_role = $row['user_role'];

	?>
	<div class="col-sm-4 col-md-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
			Name: <?php echo $user_firstname;?> <?php echo $user_lastname;?>
			</div>
			<div class="panel-body">
			Email: <?php echo $user_email;?>
			</div>
			<div class="panel-footer">
			Role: <?php echo $user_role;?>
		   </div>
		</div>
	</div>

	<?php
		}
	 ?>
	
	
</div>
</div>



<div id="user-table">
<table class="table table-bordered table-hover col-sm-12">
		<thead>
			<tr>
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
			$username = $row['username'];
			$user_firstname = $row['user_firstname'];
			$user_lastname = $row['user_lastname'];
			$user_email = $row['user_email'];
			$user_role = $row['user_role'];
			
			echo "<tr>";
			echo "<td>$username</td>";
			echo "<td>$user_firstname</td>";
			echo "<td>$user_lastname</td>";
			echo "<td>$user_email</td>";
			echo "<td>$user_role</td>";

			echo "</tr>";
		}
	 ?>
	 
	 
	 </tbody>

</table>
</div>