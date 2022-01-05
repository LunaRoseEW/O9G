<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
            <div class="container-fluid">
                <a class="navbar-nav navbar-brand mb-0 h1" href="index.php">
                    <img src="static/images/logoo9g_cropped.png" alt="Obnoxious 9 Games logo" class="w-50">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-nav collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active green" aria-current="page" href="index.php"><h6>Home</h6></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active pink" aria-current="page" href="upcoming.php"><h6>Upcoming Features</h6></a>
                        </li>
                        <li>
                        <div class="dropdown">
                        <a class="btn btn-dark dropdown-toggle green" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Articles
                        </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item green" href="/filtered_posts.php?topic=1">Strategy</a></li>
                                    <li><a class="dropdown-item pink" href="/filtered_posts.php?topic=8">Casual</a></li>
                                    <li><a class="dropdown-item green" href="/filtered_posts.php?topic=3">Finance</a></li>
                                    <li><a class="dropdown-item pink" href="/filtered_posts.php?topic=2">Lore</a></li>
                                    <li><a class="dropdown-item green" href="/filtered_posts.php?topic=9">Card of the Day</a></li>
                                </ul>
		                </div>  
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active pink" href="decklists.php"><h6>Decklists</h6></a>
                        </li>
                        <li>
                        <?php if (isset($_SESSION['user']['username'])) { ?>
		                    <a href="logout.php" class="btn btn-dark">logout</a>
                    <?php }else{ ?>
                        <div class="dropdown">
                        <a class="btn btn-dark dropdown-toggle green" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
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