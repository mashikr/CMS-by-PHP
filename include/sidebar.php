<div class="col-md-4">
		
		
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
					<form action="/cms/search" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
					</form>
                    <!-- /.input-group -->
                </div>
				<!-- login -->
                <div class="well">
                    <?php
						if(isset($_SESSION['user_role'])){		
					?>
						<h4>Logged in as <span class="text-primary"> <?php echo $_SESSION['username'] ?></span> </h4>
					<?php
							if($_SESSION['user_role'] == "Admin"){
								echo "<a href='/cms/admin/'><button class='btn btn-info form-control' type='' name=''>Go Admin Panel</button></a>";
							}
							else{
								echo "<a href='/cms/user/'><button class='btn btn-info form-control' type='' name=''>Go User Panel</button></a>";
							}
							echo "<div class='form-group'></div>";
							echo "<a href='include/logout.php'><button class='btn btn-danger form-control' type='' name=''>Logout</button></a>";
						}
					else{
					?>
					
					
					<h4>Login</h4>
					<form action="include/login.php" method="post">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" placeholder="Enter username">
                    </div>
					<div class="input-group">
                        <input name="password" type="password" class="form-control" placeholder="Enter password">
						<span class="input-group-btn"><button class="btn btn-info" type="search" name="login">Login</button></span>
                    </div>
					</form>
					<?php } ?>
                    <!-- /.input-group -->
                </div>
				<div class="well">
					<h4>Registration</h4>
					<a href="/cms/registration"><button class="btn btn-info form-control" type="registration" name="">Registration</button></a>
				</div>
				<div class="well">
					<h4>Contact to Admin</h4>
					<a href="/cms/contact"><button class="btn btn-info form-control" type="registration" name="">Contact</button></a>
				</div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
							<?php
				
								$query = "SELECT * FROM category";
								$all_category = mysqli_query($connection, $query);
								
								while($row = mysqli_fetch_assoc($all_category)){
									$cat_id = $row['cat_id'];
									$cat_title = $row['cat_title'];
									echo "<li><a href='/cms/category_post/{$cat_id}'>{$cat_title}</a></li>";
								}
								
							?>
							<!--
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
							-->
								
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Hi N-RASian</h4>
                    <p>This blog is for your fun.You will make fun posts about each other here.</p> 
					<p>So, lets enjoy it</p>
					
                </div>

            </div>