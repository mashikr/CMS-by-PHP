
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
                            Welcome admin
                            <small> <?php echo  $_SESSION['username']; ?> </small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
				<div class="row">
                    <div class="col-lg-3 col-md-6">
                       <div class="panel panel-primary">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-file-text fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
									
									<?php
										$query = "SELECT * FROM posts WHERE post_status = 'Posted'";
										$all_post = mysqli_query ($connection, $query);
										$count_post = mysqli_num_rows($all_post);
										
										echo "<div class='huge'>$count_post</div>";
										
									?>
										<div>Posts</div>
									</div>
								</div>
							</div>
						   
						   <a href="all_post.php">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						   </a>
						</div>
					</div>
					
					<div class="col-lg-3 col-md-6">
                       <div class="panel panel-green">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-comments fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
									
									<?php
										$query1 = "SELECT * FROM comments";
										$all_comment = mysqli_query($connection, $query1);
										$num_comment  = mysqli_num_rows($all_comment);
																				
										echo "<div class='huge'>$num_comment</div>";
										
									?>
		
										<div>Comments</div>
									</div>
								</div>
							</div>
						   
						   <a href="all_comment.php">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						   </a>
						</div>
					</div>
					
					<div class="col-lg-3 col-md-6">
                       <div class="panel panel-yellow">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-user fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
									<?php
										$query = "SELECT * FROM users";
										$all_user = mysqli_query ($connection, $query);
										$count_user = mysqli_num_rows($all_user);
										
										echo "<div class='huge'>$count_user</div>";
										
									?>
										<div>User</div>
									</div>
								</div>
							</div>
						   
						   <a href="user.php">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						   </a>
						</div>
					</div>
					
					<div class="col-lg-3 col-md-6">
                       <div class="panel panel-red">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-list fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
									
									<?php
										$query = "SELECT * FROM category";
										$all_cat = mysqli_query ($connection, $query);
										$count_cat = mysqli_num_rows($all_cat);
										
										echo "<div class='huge'>$count_cat</div>";
										
									?>
									<div>Categories</div>
									</div>
								</div>
							</div>
						   
						   <a href="admin_category.php">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						   </a>
						</div>
					</div>
                <!-- /.row -->

            </div>
			
			<div class="row">
			<div class="col-sm-12">
			<?php
				$query = "SELECT * FROM posts WHERE post_status != 'Posted'";
				$pending_post = mysqli_query ($connection, $query);
				$count_pending_post = mysqli_num_rows($pending_post);
				
				$query1 = "SELECT * FROM comments WHERE comment_status = 'Unapprove'";
				$pending_comment = mysqli_query ($connection, $query1);
				$count_pending_com = mysqli_num_rows($pending_comment);
			?>
				<script type="text/javascript" src="../js/loader.js"></script>
					  <script type="text/javascript">
						google.charts.load("current", {packages:['corechart']});
						google.charts.setOnLoadCallback(drawChart);
						function drawChart() {
						  var data = google.visualization.arrayToDataTable([
							["Content", "amount", { role: "style" } ],
							["Active Post", <?php echo $count_post; ?>, "#337ab7"],
							["Pending Post", <?php echo $count_pending_post; ?>, "ff0000"],
							["Total comment", <?php echo $num_comment; ?>, "5cb85c"],
							["Unapprove comment", <?php echo $count_pending_com; ?>, "ff0000"],
							["User", <?php echo $count_user; ?>, "#f0ad4e"],
							["Categories", <?php echo $count_cat; ?>, "#d9534f"]
						  ]);

						  var view = new google.visualization.DataView(data);
						  view.setColumns([0, 1,
										   { calc: "stringify",
											 sourceColumn: 1,
											 type: "string",
											 role: "annotation" },
										   2]);

						  var options = {
							title: "",
							width: 'auto',
							height: 400,
							bar: {groupWidth: "50%"},
							legend: { position: "none" },
						  };
						  var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
						  chart.draw(view, options);
					  }
					  </script>
					<div id="columnchart_values" style="width: 'auto'; height: 400px;"></div>
			</div>
			</div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
	

<?php
	include "include/admin_footer.php";
?>
