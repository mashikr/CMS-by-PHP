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
				
				

				<?php
				if(isset($_GET['category'])){
					$post_cat_id = $_GET['category'];
				}
				
				//for page number
				$per_page = 5;
				
				if(isset($_GET['page'])){
					$page = $_GET['page'];
					$post_cat_id = $_GET['cat_id'];
					
				}else{
					$page = "";
				}
				if($page == "" || $page == 1){
					$page_1 = 0;
				}else{
					$page_1 = ($page * $per_page) - $per_page;
				}
				
				
				
				$post_query_count = "SELECT * FROM posts WHERE post_category_id = {$post_cat_id} AND post_status = 'Posted'";
				$find_count = mysqli_query($connection, $post_query_count);
				$count = mysqli_num_rows($find_count);
				
				$count = ceil($count/$per_page);
				//page number
					
					//for category name
					$query1 = "SELECT cat_title FROM category WHERE cat_id = {$post_cat_id}";
					$cat_title = mysqli_query($connection, $query1);

					while($row = mysqli_fetch_assoc($cat_title)){
						$category_title = $row['cat_title'];
						echo "<h1 class='page-header'>Posts on <small> $category_title</small></h1><hr />";
					}
					
					//category name
					
					
				//for post
					$query = "SELECT * FROM posts WHERE post_category_id = {$post_cat_id} AND post_status = 'Posted' ORDER BY post_id DESC LIMIT $page_1, $per_page";
					$all_posts = mysqli_query($connection, $query);
					
					$count2 = mysqli_num_rows($all_posts);
					if($count2==0){
						echo "<h2>NO POST</h2>";
					}
					else {
					while($row = mysqli_fetch_assoc($all_posts)){
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
						<img class="img-responsive" width="900" height="300" src="/cms/<?php echo $post_image ?>" alt="">
						<hr>
						<p><?php echo $post_content . '...' ?></p>
						<a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

						<hr><hr />
				<?php
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
				
				<!-- Pager -->
                <ul class="pager">
                 <?php  
					
					for($i = 1; $i<= $count; $i++){
						if($i == $page){
							echo "<li><a class='active_link' href='category_post.php?page={$i}&cat_id={$post_cat_id}'>{$i}</a></li>";
						}else{
							echo "<li><a href='category_post.php?page={$i}&cat_id={$post_cat_id}'>{$i}</a></li>";
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
        
	<hr />
        <!-- Footer -->
        <?php 
			include "include/footer.php"
		?>
