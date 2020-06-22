<?php
		if(isset($_POST['create_post'])){
			$post_title = $_POST['post_title'];
			$post_author = $_SESSION['username'];
			$post_category_id = $_POST['post_category_id'];
			$post_status = $_POST['post_status'];
			
			$post_image = $_FILES['post_image']['name'];
			$post_image_temp = $_FILES['post_image']['tmp_name'];
			
			$post_tags = $_POST['post_tags'];
			$post_content = $_POST['post_content'];
			
			//$post_comment_count = $_POST['post_comment_count'];
			
			move_uploaded_file($post_image_temp, "../images/$post_image");
			$post_image = 'images/'. $post_image;
			
			$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_time, post_image, post_content, post_tags,post_comment_count, post_status) ";
			$query .="VALUES ('{$post_category_id}','{$post_title}','{$post_author}',now(),now(),'{$post_image}','{$post_content}','{$post_tags}',0,'{$post_status}')";
			
			$create_post_query = mysqli_query($connection, $query);
			if(!$create_post_query){
				die("QUERY FAILED " . mysqli_error($connection));
			}
			
		
		}
	?>
						<form action="" method="post" enctype="multipart/form-data">
							
							<div class="form-group">
								<label for="post_title">Post Title</label>
								<input type="text" class="form-control" name="post_title" />
							</div>
							
							<div class = "row">
								<div class="col-xs-3">
									<div class="form-group">
									<label for="post_category_id">Post Category</label>
									<select name="post_category_id" id="" class="form-control">
									<?php
										$query = "SELECT * FROM category";
										$query_result = mysqli_query($connection, $query);
										
										while($row = mysqli_fetch_assoc($query_result)){
											$cat_id = $row['cat_id'];
											$cat_title = $row['cat_title'];

											echo "<option value='$cat_id'>{$cat_title}</option>";
										}
										
										
									?>
									</select>
								</div>
								
								</div>
							</div>
							
							
							<div class="row">
								<div class="col-xs-3">
									<div class="form-group">
										<label for="post_status">Post Status</label>
										<select name="post_status" id="" class="form-control">
											<option value="Posted">Posted</option>
											<option value="Pending">Pending</option>
										</select>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label for="post_image">Post Image</label>
								<input type="file" name="post_image" />
							</div>
							
							<div class="form-group">
								<label for="post_tags">Post Tags</label>
								<input type="text" class="form-control" name="post_tags" />
							</div>
							
							<div class="form-group">
								<label for="post_content">Post Content</label>
								<textarea class="form-control" name="post_content" rows="10"></textarea>
							</div>
							
							<div class="form-group">
								<input type="submit" class="btn btn-primary" name="create_post" value="Publish Post" />
							</div>
						
						</form>
						
						
