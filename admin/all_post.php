
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
                            Welcome admin to posts
                            <small> <?php echo  $_SESSION['username']; ?> </small>
                        </h1>
						<?php
							if(isset($_GET['source'])){
								$source = $_GET['source'];
							}
							else{
								$source = '';
							}
							switch($source){
								case 'edit_post';
								include "include/edit_post.php";
								break;
								case 'add_post';
								include "include/add_post.php";
								break;
								case '02';
								echo "It's 02";
								break;
								
								default:
								include "include/view_all_post.php";
								break;
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
