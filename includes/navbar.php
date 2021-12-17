<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
            <div class="container-fluid">
                <a class="navbar-nav navbar-brand mb-0 h1" href="index.php"><h3>Obnoxious 9 Games</h3></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-nav collapse navbar-collapse" id="navbarSupportedContent">
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
	                <div class="navbar-nav">

		                <div class="login_div navbar-nav">
			                <form class="form-inline my-2 my-lg-0" action="login.php" method="post" >
				                <h2>Login</h2>

				                <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
				                <input type="password" name="password"  placeholder="Password"> 
				                <button class="btn btn-light" type="submit" name="login_btn">Sign in</button>
                                <a href="register.php" class="btn btn-light ms-auto">Register</a>
			                </form>
		                </div>
	                </div>
                <?php } ?>
            </div>
        </div>
        </nav> 