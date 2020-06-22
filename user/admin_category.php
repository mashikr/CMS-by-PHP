
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
                            Welcome user to categories page
                            <small> <?php echo  $_SESSION['username']; ?> </small>
                        </h1>
                    </div>
                </div>
				<div class="row">
				<div class="col-sm-12 col-md-6">
				
				<?php
					insert_category();
				?>
				
				
					  <form action="" method="post">
						<div class="form-group">
							<label for="cat_title">Add Category</label>
							<input name="cat_title" type="text" class="form-control">
						</div>
						<div class="form-group">
							<input name="submit" class="btn btn-primary mt-3" type="submit" value="Add Category" />
						</div>
					</form>
						
				<?php
					if(isset($_GET['edit'])){
						$cat_id = $_GET['edit'];
						include "include/update_category.php";
					}
				?>
						
                    </div>
					
					
					<div class="col-sm-12 col-md-6">
						<table class="table table-bordered">
							<tr>
							  <th>Category ID</th>
							  <th>Category Title</th>
							</tr>
							
						<?php
				
							select_category();
						?>
						</table>
						
						
					</div>
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
