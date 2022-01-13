<?php include('config.php'); ?>
<?php include('includes/public_functions.php'); ?>
<?php include('includes/head_section.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/post_functions.php'); ?>
<?php 
	// Get posts under a particular topic
	if (isset($_GET['topic'])) {
		$topic_id = $_GET['topic'];
		$posts = getPublishedPostsByTopic($topic_id);
	}
?>
	<title>Obnoxious 9 Games | Home </title>
</head>
<body class="d-flex flex-column min-vh-100">
	<!-- Navbar -->
	<?php include( ROOT_PATH . '/includes/navbar.php'); ?>
<!-- // Navbar -->
<div class="container">
<!-- content -->
<div class="content">
	<h2 style='font-family: "Audiowide", sans-serif;'>
		Articles on <u><?php echo getTopicNameById($topic_id); ?></u>
	</h2>
	<hr>
	<div class="container">
	<div class="row">
	<?php foreach ($posts as $post): ?>
		<div class="col-sm-4 mb-4">
		<div class="card shadow-lg rounded-3 border border-1 border-secondary h-100" style="margin-left: 0px;">
			<img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="card_image_top rounded-top h-50" alt="">
			<?php if (isset($post['topic']['name'])): ?>
						<a 
							href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $post['topic']['id'] ?>"
							class="btn btn-dark rounded-0" style="z-index: 2; font-family: 'Major Mono Display', monospace;">
							<?php echo $post['topic']['name'] ?>
						</a>
					<?php endif ?>
			<a href="single_post.php?post-slug=<?php echo $post['slug']; ?>" class="card-link stretched-link"></a>
				<div class="card-body">
					<h3 style='font-family: "Titillium Web", sans-serif;' class="card-title fst-italic"><?php echo $post['title'] ?></h3>
				</div>
				<span class="card-footer"><?php echo date("F j", strtotime($post["created_at"])); ?> by:<?php echo getPostAuthorById($post['user$id']); ?></span>
		</div>
		</div>
	<?php endforeach ?>
	</div>
	</div>
	</div>
</div>
<!-- // content -->
</div>
<!-- // container -->

<!-- Footer -->
	<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->