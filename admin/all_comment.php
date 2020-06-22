
<?php
	include "include/admin_header.php";
?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php
			include "include/admin_navigation.php";
		?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome admin to comments
                            <small> <?php echo  $_SESSION['username']; ?> </small>
                        </h1>
						
						<table class="table table-bordered table-hover">
								<thead>
									<tr>
									  <th>ID</th>
									  <th>Author</th>
									  <th>Email</th>
									  <th>Content</th>
									  <th>Status</th>
									  <th>In Responce to</th>
									  <th>Approve</th>
									  <th>Unapprove</th>
									  <th>Date</th>
									  <th>Time</th>
									</tr>
								 </thead>
								 <tbody>
								 <?php
													 
								$query = "SELECT * FROM comments ORDER BY comment_id DESC";
								$all_posts = mysqli_query($connection, $query);
								
								while($row = mysqli_fetch_assoc($all_posts)){
									$comment_id = $row['comment_id'];
									$comment_author = $row['comment_author'];
									$comment_email = $row['comment_email'];
									$comment_content = $row['comment_content'];
									$comment_status = $row['comment_status'];
									$comment_date = $row['comment_date'];
									$comment_time = $row['comment_time'];
									$comment_post_id = $row['comment_post_id'];
									
									echo "<tr>";
									echo "<td>$comment_id</td>";
									echo "<td>$comment_author</td>";
									echo "<td>$comment_email</td>";
									echo "<td>$comment_content</td>";
									echo "<td>$comment_status</td>";
									
									$query = "SELECT post_title FROM posts WHERE post_id = $comment_post_id";
									$comment_post = mysqli_query($connection, $query);
									while($row = mysqli_fetch_assoc($comment_post)){
										$title = $row['post_title'];
										echo "<td>$title</td>";
									}
									
									echo "<td><a href='all_comment.php?com_id={$comment_id}'>Approve</a></td>";
									echo "<td><a href='all_comment.php?comment_id={$comment_id}'>Unapprove</a></td>";
									echo "<td>$comment_date</td>";
									echo "<td>$comment_time</td>";
									echo "<td><a href='all_comment.php?delete={$comment_id}'>Delete</a></td>";
									echo "</tr>";
								}
							 ?>
							 
							 
							 </tbody>

						</table>
						
						<?php
						if(isset($_GET['com_id'])){
							$comment_id = $_GET['com_id'];
							
							$query = "UPDATE comments SET comment_status = 'Approve' WHERE comment_id = $comment_id";
							$STATUS_query = mysqli_query($connection, $query);
								if(!$STATUS_query){
									die("QUERY FAILED " . mysqli_error($connection));
								}
							header("Location: all_comment.php");
						}
						
						if(isset($_GET['comment_id'])){
							$comment_id = $_GET['comment_id'];
							
							$query = "UPDATE comments SET comment_status = 'Unapprove' WHERE comment_id = $comment_id";
							$STATUS_query = mysqli_query($connection, $query);
								if(!$STATUS_query){
									die("QUERY FAILED " . mysqli_error($connection));
								}
							header("Location: all_comment.php");
						}
						
						if(isset($_GET['delete'])){
							$comment_id = $_GET['delete'];
							
							$query = "DELETE FROM comments WHERE comment_id = $comment_id";
							$STATUS_query = mysqli_query($connection, $query);
								if(!$STATUS_query){
									die("QUERY FAILED " . mysqli_error($connection));
								}
							header("Location: all_comment.php");
	
						}
						
						
						?>
						
						
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php
	include "include/admin_footer.php";
?>
