<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
            <div class="container-fluid">
                <a class="navbar-brand mb-0 h1" href="index.php"><h3>Obnoxious 9 Games</h3></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php"><h6>Home</h6></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="upcoming.php"><h6>Upcoming Features</h6></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="decklists.php"><h6>Decklists</h6></a>
                        </li>
                    </ul>
                    <?php if (isset($_SESSION['user']['username'])) { ?>
	                    <div class="logged_in_info">
		|
		                    <span><a href="logout.php">logout</a></span>
	                    </div>
                    <?php }else{ ?>
	                <div class="banner">

		                <div class="login_div">
			                <form action="login.php" method="post" >
				                <h2>Login</h2>
				                <div style="width: 60%; margin: 0px auto;">
					                <!--<?p hp include(ROOT_PATH . '/includes/errors.php') ?>-->
				                </div>
				                <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
				                <input type="password" name="password"  placeholder="Password"> 
				                <button class="btn btn-light" type="submit" name="login_btn">Sign in</button>
			                </form>
                            <a href="register.php" class="btn btn-light">Register</a>
		                </div>
	                </div>
                <?php } ?>
            </div>
        </nav> 