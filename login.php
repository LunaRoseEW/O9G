<?php  include('config.php'); ?>
<?php  include('includes/registration-login.php'); ?>
<?php  include('includes/head_section.php'); ?>
	<title>Obnoxious 9 Games| Sign in </title>
</head>
<body class="d-flex flex-column min-vh-100">
		<!-- Navbar -->
			 <?php include( ROOT_PATH . '/includes/navbar.php'); ?>
		<!-- // Navbar -->
<div class="container">

	<div style="width: 40%; margin: 20px auto;">
		<form method="post" action="login.php" >
			<h2>Login</h2>
			<?php include(ROOT_PATH . '/includes/errors.php') ?>
			<input type="text" name="username" value="<?php echo $username; ?>" value="" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<button type="submit" class="btn btn-primary" name="login_btn">Login</button>
			<p>
				Not yet a member? <a href="register.php">Sign up</a>
			</p>
		</form>
	</div>
</div>
<!-- // container -->

<!-- Footer -->
	<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->