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
                        <li>
                        <?php if (isset($_SESSION['user']['username'])) { ?>
		                    <a href="logout.php" class="btn btn-dark">logout</a>
                    <?php }else{ ?>
                        <div class="btn-group">
                        <a class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Sign In
                        </a>
                            <div class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
			                    <form class="px-4 py-3" action="login.php" method="post" >
                                    <p>Username/Email:</p>
				                    <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
                                    <p>Password:</p>
				                    <input type="password" name="password"  placeholder="Password"> 
				                    <button class="btn btn-light dropdown-item" type="submit" name="login_btn">Sign in</button>
                                    <a href="register.php" class="dropdown-item">New here? Sign up!</a>
			                    </form>
                            </div>
		                </div>  
                <?php } ?>
                        </li>
                    </ul>

            </div>
        </div>
        </nav> 