<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/cms/user">CMS user</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
				<li>
					<a href="#">Active user : <?php echo user_online(); ?> </a> 
					<!-- <a href="#">Active user : <span class="useronline"></span> </a>-->
				</li>
				<li>
					<a href="/cms/">Home Page</a>
				</li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo  $_SESSION['username']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/cms/user/profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../include/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="/cms/user/"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>     
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts" class="collapse">
                            <li>
                                <a href="/cms/user/all_post"><i class="fa fa-fw fa-chevron-right"></i> View your posts</a>
                            </li>
                            <li>
                                <a href="/cms/user/all_post/add_post"><i class="fa fa-fw fa-chevron-right"></i> Add a post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/cms/user/admin_category"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                    </li>
					<li>
                        <a href="/cms/user/all_comment"><i class="fa fa-fw fa-file"></i> Comments</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="/cms/user/user"><i class="fa fa-fw fa-chevron-right"></i> View All User</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/cms/user/profile"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>