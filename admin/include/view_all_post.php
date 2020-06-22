<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
			  <th>ID</th>
			  <th>Author</th>
			  <th>Title</th>
			  <th>Category</th>
			  <th>Status</th>
			  <th>Image</th>
			  <th>Tags</th>
			  <th>Comments</th>
			  <th>Date</th>
			  <th>View Post</th>
			  <th>Edit</th>
			  <th>Delete</th>
			  <th>View</th>  
			</tr>
		 </thead>
		 <tbody>
		 <?php
							 
		$query = "SELECT * FROM posts ORDER BY post_id DESC";
		$all_posts = mysqli_query($connection, $query);
		
		while($row = mysqli_fetch_assoc($all_posts)){
			$post_id = $row['post_id'];
			$post_title = $row['post_title'];
			$post_author = $row['post_author'];
			$post_category_id = $row['post_category_id'];
			$post_date = $row['post_date'];
			$post_status = $row['post_status'];
			//$post_comment_count = $row['post_comment_count'];
			$post_image = $row['post_image'];
			$post_tags = $row['post_tags'];
			$post_view_count = $row['post_view_count'];
			
			$query1 = "SELECT * FROM comments WHERE comment_post_id = {$post_id}";
			$all_comment = mysqli_query($connection, $query1);
			$post_comment_count = mysqli_num_rows($all_comment);
			
			
			
			echo "<tr>";
			echo "<td>$post_id</td>";
			echo "<td>$post_author</td>";
			echo "<td>$post_title</td>";
		?>
		<?php
		
		$query = "SELECT cat_title FROM category WHERE cat_id = {$post_category_id}";
		$query_result = mysqli_query($connection, $query);
		$row = mysqli_fetch_assoc($query_result);
			$cat_title = $row['cat_title'];
		
			echo "<td>$cat_title</td>";
			echo "<td>$post_status</td>";
			echo "<td><img width='100' src='../$post_image' alt='post image' /></td>";
			echo "<td>$post_tags</td>";
			echo "<td><a href='post_comment.php?id={$post_id}'>$post_comment_count</a></td>";
			echo "<td>$post_date</td>";
			echo "<td><a href='/cms/post/{$post_id}'>View Post</a></td>";
			echo "<td><a href='all_post.php?source=edit_post&post_id={$post_id}'>Edit</a></td>";
			echo "<td><a onclick=\"javascript: return confirm('Are you sure want to delete?');\" href='all_post.php?delete={$post_id}'>Delete</a></td>";
			echo "<td><a href='all_post.php?reset={$post_id}'>$post_view_count</a></td>";
			echo "</tr>";
		}
	 ?>
	 
	 
	 </tbody>

</table>

<?php
	if(isset($_GET['delete'])){
		$the_post_id = $_GET['delete'];
		
		$query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
		$delete_query = mysqli_query($connection, $query);
		if(!$delete_query){
			die("Query Failed " . mysqli_error());
		}
		header("Location: all_post.php");
		
		$query = "DELETE FROM comments WHERE comment_post_id = {$the_post_id}";
		$delete_commment_query = mysqli_query($connection, $query);
		
		
	}
	
	if(isset($_GET['reset'])){
		$the_post_id = $_GET['reset'];
		
		$query = "UPDATE posts SET post_view_count = 0 WHERE post_id = {$the_post_id}";
		$delete_query = mysqli_query($connection, $query);
		if(!$delete_query){
			die("Query Failed " . mysqli_error());
		}
		header("Location: all_post.php");
		
	}
?>