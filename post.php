	<?php 
		include "include/db.php"
	?>
	<!-- Header -->
	<?php 
		include "include/header.php"
	?>

    <!-- Navigation -->
    <?php 
		include "include/navigation.php"
	?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-sm-12 col-md-8">

                <!-- Blog Post -->

                <?php
					if(isset($_GET['p_id'])){
						$post_id = $_GET['p_id'];
					}
					
					$query1 = "UPDATE posts SET post_view_count = post_view_count + 1 WHERE post_id = {$post_id}";
					$view_update = mysqli_query($connection, $query1);
					
					$query = "SELECT * FROM posts WHERE post_id = {$post_id} AND post_status = 'Posted'";
					$all_posts = mysqli_query($connection, $query);
					
					$num_of_row = mysqli_num_rows($all_posts);
					
					while($row = mysqli_fetch_assoc($all_posts)){
						$post_id = $row['post_id'];
						$post_title = $row['post_title'];
						$post_author = $row['post_author'];
						$post_date = $row['post_date'];
						$post_time = $row['post_time'];
						$post_content = $row['post_content'];
						$post_image = $row['post_image'];
				?>
				
						<!-- First Blog Post -->
						<h2>
							<a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
						</h2>
						<p class="lead">
							by <a href="#"><?php echo $post_author ?></a>
						</p>
						<p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date.' at '.$post_time ?></p>
						<hr>
						<img class="img-responsive" width="900" height="300" src="/cms/<?php echo $post_image ?>" alt="">
						<hr>
						<p><?php echo $post_content; ?></p>
						
						<hr>
				


                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
						<?php	if(!isset($_SESSION['username'])){
						
						echo "<div class='form-group'><label for='comment_author'>Username</label><input type='text' class='form-control' name='comment_author' /></div>";
						 
						}
						 ?>
                        <div class="form-group">
							<label for="comment">Comment</label>
                            <textarea name="comment" class="form-control" rows="3"></textarea>
                        </div>
                        <button name="submit_comment" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
				<?php
				if(isset($_POST['submit_comment'])){
					
					if($_SESSION['username'] == ""){
						$author = $_POST['comment_author'];
					}
					else { $author = $_SESSION['username']; }
					
					$comment = $_POST['comment'];
					$comment_post_id = $_GET['p_id'];
					
					if(empty($author) || empty($comment)){
						echo "<script type='text/javascript'>alert('All text field requred')</script>";
					}
					else{
						
						$query1 = "SELECT user_email from users WHERE username = '{$author}'";
						$user_email = mysqli_query($connection, $query1);
						while($row = mysqli_fetch_assoc($user_email)){
							$email = $row['user_email'];
						}
						
						if(empty($email) || $email == ""){
						echo "<script type='text/javascript'>alert('User not exists')</script>";
						}else{
							$query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date, comment_time) ";
							$query .= "VALUES ($comment_post_id,'{$author}', '{$email}', '{$comment}', 'Approve', now(), now())";
							$create_comment_query = mysqli_query($connection, $query);
										if(!$create_comment_query){
											die("QUERY FAILED " . mysqli_error($connection));
									}
							
						}
						
						
					}
				}
				
				?>

                <hr>

                <!-- Posted Comments -->
				
				<?php
					$post_id = $_GET['p_id'];
					$query = "SELECT * FROM comments WHERE comment_post_id = $post_id AND comment_status = 'Approve' ORDER BY comment_id DESC";
					$execute_query = mysqli_query($connection, $query);
					
					while($row = mysqli_fetch_assoc($execute_query)){
						$author = $row['comment_author'];
						$date1 = $row['comment_date'];
						$date = date("d-m-Y", strtotime($date1));
						$time = $row['comment_time'];
						$content = $row['comment_content'];

				?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $author ?>
                            <small><?php echo $date ?> at <?php echo $time ?></small>
                        </h4>
                        <?php echo $content ?>
                    </div>
                </div>

                <?php
					}
				?>
			<?php
					}
					if($num_of_row == 0){
						echo "<h2>No Post availale</h2>";
					}
				?>
            </div>
	<hr />
            <!-- Blog Sidebar Widgets Column -->

            <?php 
				include "include/sidebar.php"
			?>
                    <!-- /.row -->
                </div>

        <!-- /.row -->
	</div>
        <hr>

         <!-- Footer -->
        <?php 
			include "include/footer.php"
		?>
