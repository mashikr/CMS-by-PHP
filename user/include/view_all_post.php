<div class="row">

<div id="post-card">
		<?php
		$query1 = "SELECT * FROM posts WHERE post_author = '{$_SESSION['username']}' ORDER BY post_id DESC";
		$all_posts1 = mysqli_query($connection, $query1);
		
		while($row = mysqli_fetch_assoc($all_posts1)){
			$post_id = $row['post_id'];
			$post_title = $row['post_title'];
			$post_author = $row['post_author'];
			$post_category_id = $row['post_category_id'];
			$post_date = $row['post_date'];
			$post_status = $row['post_status'];
			$post_image = $row['post_image'];
			$post_tags = $row['post_tags'];
			$post_view_count = $row['post_view_count'];
			
			$query2 = "SELECT * FROM comments WHERE comment_post_id = {$post_id}";
			$all_comment2 = mysqli_query($connection, $query2);
			$post_comment_count = mysqli_num_rows($all_comment2);
			
			$query3 = "SELECT cat_title FROM category WHERE cat_id = {$post_category_id}";
			$query_result3 = mysqli_query($connection, $query3);
			$row = mysqli_fetch_assoc($query_result3);
			$cat_title = $row['cat_title'];
		
		?>
		<div class="col-sm-4 col-md-3">
	   <div class="panel panel-primary">
			<div class="panel-heading">
				ID: <?php echo $post_id; ?> <br />
				Author: <?php echo $post_author; ?> <br />
				Category: <?php echo $cat_title; ?> <br />
				Status: <?php echo $post_status; ?>
			</div>
			<div class="panel-heading">
			Title: <?php echo $post_title; ?>
			</div>
		   <div >
				<img class="card-img" src="../<?php echo $post_image; ?>" alt="" />
			</div>
			<div class="panel-body">
				Tags: <?php echo $post_tags; ?> <br />
				Date: <?php echo $post_date; ?> <br />
				<a href="post_comment.php?id=<?php echo $post_id; ?>">Comments: <?php echo $post_comment_count; ?></a><br />
				View: <?php echo $post_view_count; ?>
			</div>
		   <div class="panel-footer">
			<div class="row">
			<div class="link"><a href="all_post.php?source=edit_post&post_id=<?php echo $post_id?>">Edit</a></div>
			<div class="link"><a onclick="javascript: return confirm('Are you sure want to delete?');" href='all_post.php?delete=<?php echo $post_id; ?>'>Delete</a></div>
			</div>
		   </div>
		   <a href="../post.php?p_id=<?php echo $post_id;?>">
			<div class="panel-footer">
				<span class="pull-left">View Post</span>
				<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>
			</div>
		   </a>
		</div>
		</div>
		<?php } ?>
</div>
</div>
<div class="row">
	
<div class="col-xs-12" id="post-table">

<table class="table table-bordered table-hover">
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
							 
		$query = "SELECT * FROM posts WHERE post_author = '{$_SESSION['username']}' ORDER BY post_id DESC";
		$all_posts = mysqli_query($connection, $query);
		
		while($row = mysqli_fetch_assoc($all_posts)){
			$post_id = $row['post_id'];
			$post_title = $row['post_title'];
			$post_author = $row['post_author'];
			$post_category_id = $row['post_category_id'];
			$post_date = $row['post_date'];
			$post_status = $row['post_status'];
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
			echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
			echo "<td><a href='all_post.php?source=edit_post&post_id={$post_id}'>Edit</a></td>";
			echo "<td><a onclick=\"javascript: return confirm('Are you sure want to delete?');\" href='all_post.php?delete={$post_id}'>Delete</a></td>";
			echo "<td>$post_view_count</td>";
			echo "</tr>";
		}
	 ?>
	 
	 
	 </tbody>

</table>
</div>
</div>
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
	
	
?>