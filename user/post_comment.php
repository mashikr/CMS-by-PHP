
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
                    <div class="col-sm-10">
                        <h1 class="page-header">
                            Welcome admin to post comments
                            <small> <?php echo  $_SESSION['username']; ?> </small>
                        </h1>
						
						<div class="row">
							<div id="comment-card">
								<?php 		 
									if(isset($_GET['id'])){
									$post_id = $_GET['id'];
														 
										$query1 = "SELECT * FROM comments WHERE comment_post_id = '$post_id' ORDER BY comment_id DESC";
										$all_posts1 = mysqli_query($connection, $query1);		
											while($row = mysqli_fetch_assoc($all_posts1)){
												$comment_id = $row['comment_id'];
												$comment_author = $row['comment_author'];
												$comment_email = $row['comment_email'];
												$comment_content = $row['comment_content'];
												$comment_status = $row['comment_status'];
												$comment_date = $row['comment_date'];
												$comment_time = $row['comment_time'];
												$comment_post_id = $row['comment_post_id'];
												
												
												$query2 = "SELECT post_title FROM posts WHERE post_id = $comment_post_id";
												$comment_post2 = mysqli_query($connection, $query2);
												while($row = mysqli_fetch_assoc($comment_post2)){
													$title = $row['post_title'];
												} 
								?>
								<div class="col-sm-4 col-md-4">
									<div class="panel panel-primary">
										<div class="panel-heading">
											Author: <?php echo $comment_author;?> <br />
											Email: <?php echo $comment_email;?> <br />
											Status: <?php echo $comment_status;?>
										</div>
										<div class="panel-body">
											<b>Responses post:</b> <?php echo $title;?> <br />
											<b>Comment:</b> <?php echo $comment_content;?>
										</div>
										<div class="panel-body">
											Time: <?php echo $comment_time;?> <br />
											Date: <?php echo $comment_date;?>
										</div>
										<div class="panel-footer">
											<div class="row">	
												<div class="link"><a href="post_comment.php?com_id=<?php echo $comment_id;?>&&post_id=<?php echo $post_id?>">Approve</a></div>
												<div class="link"><a href='post_comment.php?comment_id=<?php echo $comment_id; ?>&&post_id=<?php echo $post_id?>'>Unapprove</a></div>
											</div>
									   </div>
										<div class="panel-footer text-center">
											<a href='post_comment.php?delete=<?php echo $comment_id ?>&&post_id=<?php echo $post_id?>'>Delete</a>
									   </div>
									</div>
								</div>

								<?php
									}
									}
								 ?>
								
								
							</div>
							</div>
						
						
						
						<div id="comment-table">
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
								
							if(isset($_GET['id'])){
								$post_id = $_GET['id'];
													 
								$query = "SELECT * FROM comments WHERE comment_post_id = '$post_id' ORDER BY comment_id DESC";
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
									
									echo "<td><a href='post_comment.php?com_id={$comment_id}&&post_id={$post_id}'>Approve</a></td>";
									echo "<td><a href='post_comment.php?comment_id={$comment_id}&&post_id={$post_id}'>Unapprove</a></td>";
									echo "<td>$comment_date</td>";
									echo "<td>$comment_time</td>";
									echo "<td><a href='post_comment.php?delete={$comment_id}&&post_id={$post_id}'>Delete</a></td>";
									echo "</tr>";
								}
							}
							 ?>
							 
							 
							 </tbody>

						</table>
						</div>
						<?php

						if(isset($_GET['com_id'])){
							$comment_id = $_GET['com_id'];
							$post_id = $_GET['post_id'];
							
							$query = "UPDATE comments SET comment_status = 'Approve' WHERE comment_id = $comment_id";
							$STATUS_query = mysqli_query($connection, $query);
								if(!$STATUS_query){
									die("QUERY FAILED " . mysqli_error($connection));
								}
							header("Location: post_comment.php?id={$post_id}");
						}
						
						if(isset($_GET['comment_id'])){
							$comment_id = $_GET['comment_id'];
							$post_id = $_GET['post_id'];
							
							$query = "UPDATE comments SET comment_status = 'Unapprove' WHERE comment_id = $comment_id";
							$STATUS_query = mysqli_query($connection, $query);
								if(!$STATUS_query){
									die("QUERY FAILED " . mysqli_error($connection));
								}
							header("Location: post_comment.php?id={$post_id}");
						}
						
						if(isset($_GET['delete'])){
							$comment_id = $_GET['delete'];
							$post_id = $_GET['post_id'];
							
							$query = "DELETE FROM comments WHERE comment_id = $comment_id";
							$STATUS_query = mysqli_query($connection, $query);
								if(!$STATUS_query){
									die("QUERY FAILED " . mysqli_error($connection));
								}
							header("Location: post_comment.php?id={$post_id}");
							$query = "UPDATE posts SET post_comment_count = post_comment_count - 1 ";
							$query .= "WHERE post_id = $comment_post_id";
							$update_comment_count = mysqli_query($connection, $query);
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
