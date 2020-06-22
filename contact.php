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
	 
		
				if(isset($_POST['submit'])){
					$from ="From: ". $_POST['email'];
					$subject = wordwrap($_POST['subject'], 70);
					$body = $_POST['body'];
					$to = "mdashikur567@gmail.com";
					
					mail($to, $subject, $body, $from);
					
				}
			
			
			?>
	<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3>Contact</h3>
				</div>
				<div class="panel-body">
					<form action="contact.php" method="post">
						<div class="form-group">
							<input name="email" type="text" class="form-control" placeholder="Enter Your Email" value="">
						</div>
						<div class="form-group">
							<input name="subject" type="text" class="form-control" placeholder="Enter Subject" value="">
						</div>
						<div class="form-group">
							<textarea class="form-control" name="body" rows="10"></textarea>
						</div>
						<div class="form-group">
							<button class="btn btn-primary form-control" type="submit" name="submit">Submit</button>
						</div>
					</form>
				</div>
			
			</div>
			
			
			
		</div>
		
		
		
	</div>
	</div>
	
	
	
	<div class="container">
	<?php 
			include "include/footer.php"
		?>