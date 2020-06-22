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
            <div class="col-md-8">

                <!-- Blog Post -->

                <?php
					if(isset($_GET['post_author'])){
						$post_author = $_GET['post_author'];
					}
							//for page number
						$per_page = 5;
						
						if(isset($_GET['page'])){
							$page = $_GET['page'];
							$post_author = $_GET['post_author'];
							
						}else{
							$page = "";
						}
						if($page == "" || $page == 1){
							$page_1 = 0;
						}else{
							$page_1 = ($page * $per_page) - $per_page;
						}
						
						$post_query_count = "SELECT * FROM posts WHERE post_author = '{$post_author}' AND post_status = 'Posted'";
						$find_count = mysqli_query($connection, $post_query_count);
						$count = mysqli_num_rows($find_count);
						
						$count = ceil($count/$per_page);
					
					echo "<h2> All Post by $post_author</h2><hr />";
					
					
					$query = "SELECT * FROM posts WHERE post_author = '{$post_author}' AND post_status = 'Posted' ORDER BY post_id DESC LIMIT $page_1, $per_page";
					$all_posts = mysqli_query($connection, $query);
					
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
						<img class="img-responsive" width="900" height="300" src="<?php echo $post_image ?>" alt="">
						<hr>
						<p><?php echo $post_content .'...' ?></p>
						
						<hr><hr />
				<?php
					}
				?>
			<!-- Pager -->
                <ul class="pager">
                 <?php  
					
					for($i = 1; $i<= $count; $i++){
						if($i == $page){
							echo "<li><a class='active_link' href='author_post.php?page={$i}&post_author={$post_author}'>{$i}</a></li>";
						}else{
							echo "<li><a href='author_post.php?page={$i}&post_author={$post_author}'>{$i}</a></li>";
						}	
					}
					
				?>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->

            <?php 
				include "include/sidebar.php"
			?>
                    <!-- /.row -->
                </div>

        <!-- /.row -->

        <hr>

         <!-- Footer -->
        <?php 
			include "include/footer.php"
		?>
