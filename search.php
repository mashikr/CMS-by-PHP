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

            <!-- Blog Entries Column -->
            <div class="col-md-8">
				
				<h1 class="page-header">
                    News of N-Ras Mess
                    <small>N-Ras mess in housing</small>
                </h1>
				<?php
					if(isset($_POST['submit'])){
						$search = $_POST['search'];
						
						$query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' AND post_status = 'Posted' ";
						$search_query = mysqli_query($connection, $query);
						
						if(!$search_query){
							die("QUERY FAILED" . mysqli_error($connection));
						}
						
						$count = mysqli_num_rows($search_query);
						if($count == 0 || empty($search)){
							echo "<h1>NO RESULT</h1>";
						}
						else {
							
							while($row = mysqli_fetch_assoc($search_query)){
								$post_id = $row['post_id'];
								$post_title = $row['post_title'];
								$post_author = $row['post_author'];
								$post_date = $row['post_date'];
								$post_time = $row['post_time'];
								$post_content = substr($row['post_content'],0,200);
								$post_image = $row['post_image'];
						?>
						
								<!-- First Blog Post -->
								<h2>
									<a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
								</h2>
								<p class="lead">
									by <a href="index.php"><?php echo $post_author ?></a>
								</p>
								<p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date.' at '.$post_time ?></p>
								<hr>
								<img class="img-responsive" src="<?php echo $post_image ?>" alt="" width="900px">
								<hr>
								<p><?php echo $post_content . '...' ?></p>
								<a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

								<hr>
						<?php
							}
						
						}
						
					}
					?>
				
              
				
                <!-- Second Blog Post --><!--
                <h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quasi, fugiat, asperiores harum voluptatum tenetur a possimus nesciunt quod accusamus saepe tempora ipsam distinctio minima dolorum perferendis labore impedit voluptates!</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
				-->
                <!-- Third Blog Post -->
                <!--
				<h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, voluptates, voluptas dolore ipsam cumque quam veniam accusantium laudantium adipisci architecto itaque dicta aperiam maiores provident id incidunt autem. Magni, ratione.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
				-->
				
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php 
				include "include/sidebar.php"
			?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php 
			include "include/footer.php"
		?>
