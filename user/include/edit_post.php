<?php
	
	$temp;
	$post_id;
	if(isset($_GET['post_id'])){
		$the_post_id = $_GET['post_id'];
	}
	
		$query = "SELECT * FROM posts WHERE post_id={$the_post_id}";
		$all_posts = mysqli_query($connection, $query);
		
		while($row = mysqli_fetch_assoc($all_posts)){
			
			$post_title = $row['post_title'];
			$post_category_id = $row['post_category_id'];
			$post_image = $row['post_image'];
			$post_tags = $row['post_tags'];
			$post_date = $row['post_date'];
			$post_content = $row['post_content'];
			
			$temp = $post_image;
			$post_id = $the_post_id ;
		}

		
?>
<?php

	if(isset($_POST['update_post'])){
		$post_title = $_POST['post_title'];
		$post_category_id = $_POST['post_category_id'];
		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		$post_image = $_FILES['post_image']['name'];
		
		if(empty($post_image)){
			$post_image = $temp;
		}
		else{
			$post_image_temp = $_FILES['post_image']['tmp_name'];
			move_uploaded_file($post_image_temp, "../images/$post_image");
			$post_image = 'images/'. $post_image;
			
		}
		
		$query = "UPDATE posts SET ";
		$query .="post_title = '{$post_title}', ";
		$query .="post_category_id = {$post_category_id}, ";
		$query .="post_image = '{$post_image}', ";
		$query .="post_tags = '{$post_tags}', ";
		$query .="post_content = '{$post_content}' ";
		$query .="WHERE post_id = {$post_id}";

		$update_post_query = mysqli_query($connection, $query);
		if(!$update_post_query){
			die("Update Failed " . mysqli_error());
		}
		else{
		echo "<p class='bg-warning'>Updated Post : <a href='../post.php?p_id={$post_id}'>View post</a> or <a href='all_post.php'>Edit more post</a></p><hr />";

		}

	}


?>



<form action="" method="post" enctype="multipart/form-data">
		
		<div class="form-group">
			<label for="post_title">Post Title</label>
			<input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title" />
		</div>
		
			<div class = "row">
				<div class="col-sm-4 col-md-3">
				<div class="form-group">
				<label for="post_category_id">Post Category</label>
				
				<select name="post_category_id" id="" class="form-control">
				<?php
					$query = "SELECT * FROM category";
					$query_result = mysqli_query($connection, $query);
					
					while($row = mysqli_fetch_assoc($query_result)){
						$cat_id = $row['cat_id'];
						$cat_title = $row['cat_title'];
						
						if($post_category_id== $cat_id){
							echo "<option selected value='$cat_id'>{$cat_title}</option>";
						}
						else
						echo "<option value='$cat_id'>{$cat_title}</option>";
					}
					
					
				?>
				</select>
			</div>
			
			</div>
		</div>
		
		
		
		<div class="form-group">
			<img width="200" src="../<?php echo $post_image; ?>" alt="" />
		</div>
		
		<div class="form-group">
			<label for="post_image">Post Image</label>
			<input  type="file" name="post_image" />
		</div>
		
		<div class="form-group">
			<label for="post_tags">Post Tags</label>
			<input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags" />
		</div>
		
		<div class="form-group">
			<label for="post_content">Post Content</label>
			<textarea class="form-control" name="post_content" id="" rows="10"><?php echo $post_content; ?></textarea>
		</div>
		
		<div class="form-group">
			<input type="submit" class="btn btn-primary" name="update_post" value="Update Post" />
		</div>
	
	</form>
	
