	<?php 
		include "include/db.php"
	?>
	<!-- Header -->
	<?php 
		include "include/header.php"
	?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <!--
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				-->
                <a class="navbar-brand" href="index.php">N-RAS Mess Blog</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            

        </div>
        <!-- /.container -->
    </nav>
	<?php
	 $message = "<b>Fill all field</b>";
		$firstname2 = "";
		$lastname2 = "";
		$username2 = "";
		$password2 = "";
		$email2 = "";
		
				if(isset($_POST['submit'])){
					
					$username = $_POST['username'];
					$email = $_POST['email'];
					$password = $_POST['password'];
					$firstname = $_POST['firstname1'];
					$lastname = $_POST['lastname1'];
					
					$username = mysqli_real_escape_string($connection, $username);
					$email = mysqli_real_escape_string($connection, $email);
					$password = mysqli_real_escape_string($connection, $password);
					$firstname = mysqli_real_escape_string($connection, $firstname);
					$lastname = mysqli_real_escape_string($connection, $lastname);
					
					if(empty($username) || empty($email) || empty($password) || empty($firstname) || empty($lastname)){
						$message = "<b style='color:red'>All field are required**</b>";
					}
					else{
						$query = "SELECT * FROM users WHERE username = '{$username}'";
						$user_query = mysqli_query($connection,$query);
						$count = mysqli_num_rows($user_query);
						
						
						if($count == 1){
							$message = "<b style='color:red'>The username already exists**</b>";
							$firstname2 = $firstname;
							$lastname2 = $lastname;
							$username2 = $username;
							$password2 = $password;
							$email2 = $email;
							
						}else{
						
							$password = crypt($password, '$2a$07$usesomesillystringforsalt$');
						
							$query1 = "INSERT INTO users (username, user_password, user_firstname, user_lastname, user_email, user_role) ";
							$query1 .= "VALUES ('{$username}', '{$password}', '{$firstname}', '{$lastname}', '{$email}', 'Subscriber')";
							$user_registry = mysqli_query($connection, $query1);
							if(!$user_registry){
								die("Query Failed " . mysqli_error($connection));	
							}
							
							$message = "<b style='color:green'>Registration Succesfull..!!</b>";
							
						}
					
					}
				}
			
			
			?>
	<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3>Registration</h3>
				</div>
				<div class="panel-body">
					<form action="registration.php" method="post">
						<div class="form-inline">
							<div class="form-group"><input name="firstname1" type="text" class="form-control" placeholder="Enter firstname" value="<?php echo $firstname2; ?>"></div>
							<div class="form-group"><input name="lastname1" type="text" class="form-control" placeholder="Enter lastname" value="<?php echo $lastname2; ?>"></div>
						</div>
						<div class="form-group"></div>
						<div class="form-group">
							<input name="username" type="text" class="form-control" placeholder="Enter username" value="<?php echo $username2; ?>">
						</div>
						<div class="form-group">
							<input name="email" type="text" class="form-control" placeholder="Enter email" value="<?php echo $email2; ?>">
						</div>
						<div class="form-group">
							<input name="password" type="password" class="form-control" placeholder="Enter password" value="<?php echo $password2; ?>">
						</div>
						<div class="form-group">
							<a href="../registration.php"><button class="btn btn-primary form-control" type="registration" name="submit">Registration</button></a>
						</div>
					</form>
				</div>
				<?php echo "<div class='panel-footer text-center'>$message</div>"; ?>
			</div>
			
			
			
		</div>
		
		
		
	</div>
	</div>
	
	
	
	<div class="container">
	<?php 
			include "include/footer.php"
		?>