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
	<div class='row justify-content-center mt-5'>
	<div class='col-sm-4'>
		<div class='card shadow-lg rounded-3'>
		<form method="post" action="login.php" class='ms-5' >
			<h2 class='mt-2'>Login</h2>
			<?php include(ROOT_PATH . '/includes/errors.php') ?>
			<input class='mb-2' type="text" name="email" value="<?php echo $email; ?>" value="" placeholder="email">
			<input type="password" name="password" placeholder="Password">
			<br>
			<button style="font-family: 'Major Mono Display', monospace;" type="submit" class="btn btn-dark mt-2 mb-2" name="login_btn">login</button>
			<p>
				Not yet a member? <a href="register.php">Sign up</a>
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