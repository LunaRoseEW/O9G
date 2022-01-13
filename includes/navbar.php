<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top shadow-lg">
            <div class="container-fluid">
                <a class="navbar-nav navbar-brand" href="index.php">
                    <img src="static/images/logoo9g_cropped.png" alt="Obnoxious 9 Games logo" class="w-50">
                </a>
                <button aria-expanded="false" class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                </button>
                <div class="collapse-sm" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-3 mt-3 mb-lg-0">
                        <li class="nav-item">
                            <a style='font-family: "Bebas Neue", display;' class="nav-link active green" aria-current="page" href="index.php"><span class='h5'>Home</span></a>
                        </li>
                        <li class="nav-item">
                            <a style='font-family: "Bebas Neue", display;' class="nav-link active pink" aria-current="page" href="upcoming.php"><span class='h5'>Upcoming Features</span></a>
                        </li>
                        <li>
                        <div class="dropdown">
                        <a style='font-family: "Bebas Neue", display;' class="btn btn-dark dropdown-toggle green" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class='h5'>Articles</span>
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
                            <a style='font-family: "Bebas Neue", display;' class="nav-link active pink" href="text_decklists.php"><span class='h5'>Decklists</span></a>
                        </li>
                        <li>
                        <?php if (isset($_SESSION['user']['username'])) { ?>
		                    <a style='font-family: "Bebas Neue", display;' href="logout.php" class="btn btn-dark"><span class='h5'>logout</span></a>
                    <?php }else{ ?>
                        <div class="dropdown">
                        <a style='font-family: "Bebas Neue", display;' class="btn btn-dark dropdown-toggle green" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class='h5'>Sign In</span>
                        </a>
                            <div class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
			                    <form class="px-4 py-3" action="login.php" method="post" >
                                    <p>Email:</p>
				                    <input type="text" name="email" value="<?php echo $email; ?>" placeholder="email">
                                    <p class="mt-3">Password:</p>
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