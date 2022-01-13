<?php  include('config.php'); ?>
<!-- Source code for handling registration and login -->
<?php  include('includes/registration-login.php'); ?>

<?php include('includes/head_section.php'); ?>

<title>Obnoxious 9 Games | Sign up </title>
</head>
<body class="d-flex flex-column min-vh-100">
		<!-- Navbar -->
			<?php include( ROOT_PATH . '/includes/navbar.php'); ?>
		<!-- // Navbar -->
<div class="container">
<div class='row justify-content-center mt-5'>
	<div class='col-sm-4'>
		<div class='card shadow-lg rounded-3'>
		<form class='ms-5' method="post" action="register.php" >
			<h2 class='mt-2'>Register</h2>
            <?php include(ROOT_PATH . '/includes/errors.php'); ?>
			<input class='mb-2' type="text" name="username" value="<?php echo $username; ?>"  placeholder="Username">
	 		<input class='mb-2' type="email" name="email" value="<?php echo $email ?>" placeholder="Email">
			<input class='mb-2' type="password" name="password_1" placeholder="Password">
			<input class='mb-2' type="password" name="password_2" placeholder="Password confirmation">
			<br>
			<button style="font-family: 'Major Mono Display', monospace;" type="submit" class="btn btn-dark mb-2" name="reg_user">register</button>
			<p>
				Already a member? <a href="login.php">Sign in</a>
			</p>
		</form>
	</div>
</div>
</div>
</div>
<!-- // container -->
<!-- Footer -->
	<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->