<?php  include('config.php'); ?>
<?php  include('includes/public_functions.php'); ?>
<?php 
	if (isset($_GET['post-slug'])) {
		$post = getPost($_GET['post-slug']);
	}
	$topics = getAllTopics();
?>
<?php include('includes/head_section.php'); ?>
<title> <?php echo $post['title'] ?> | Obnoxious 9 Games</title>
</head>
<body class="d-flex flex-column min-vh-100">

	<!-- Navbar -->
	<?php include( ROOT_PATH . '/includes/navbar.php'); ?>
	<!-- // Navbar -->

<div class="container">
	
	<div class="row justify-content-center mt-5" >
		<!-- Page wrapper -->
		<div class="col-sm-12">
			<!-- full post div -->
			<div class="card shadow-lg rounded mb-5">
				<div class='ms-5 me-5'>
			<?php if ($post['published'] == false): ?>
				<h2 class="post-title">Sorry... This post has not been published</h2>
			<?php else: ?>
				<h2 style='font-family: "Josefin Sans", sans-serif;' class="display-3 mt-3"><?php echo $post['title']; ?></h2>
				<hr>
				<div class="post-body-div">
					<?php echo html_entity_decode($post['body']); ?>
				</div>
			<?php endif ?>
			</div>
			</div>
			<!-- // full post div -->
			
			<!-- comments section -->
			<!--  coming soon ...  -->
		</div>
		<!-- // Page wrapper -->

	</div>
</div>
<!-- // content -->

<?php include( ROOT_PATH . '/includes/footer.php'); ?>