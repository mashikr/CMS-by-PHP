
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
                    <div class="col-sm-12">
                        <h1 class="page-header">
                            Welcome to all user list page
                            <small> <?php echo  $_SESSION['username']; ?> </small>
                        </h1>
						<?php
							include "include/all_user.php";
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
