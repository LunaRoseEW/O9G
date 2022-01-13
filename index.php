<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>
<?php require_once( ROOT_PATH . '/includes/registration-login.php') ?>
<?php  include(ROOT_PATH . '/admin/includes/post_functions.php'); ?>

<!-- Retrieve all posts from database  -->
<?php $posts = getPublishedPosts(); ?>

<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>
	<title>Obnoxious 9 Games| Home </title>
</head>
<body class="d-flex flex-column min-vh-100">

		<!-- navbar -->
        <?php include(ROOT_PATH . '/includes/navbar.php') ?>       
		<!-- // navbar -->


	<!-- container - wraps whole page -->
	<div class="container">

		<!-- Page content -->
		<div class="content">
			<h2 style='font-family: "Audiowide", sans-serif;'>Recent Articles</h2>
			<hr>
<div class="container">
	<div class="row">
<?php foreach ($posts as $post): ?>
	<div class="col-sm-4 mb-4">
	<div class="card shadow-lg rounded-3 border border-secondary h-100">
		<img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="card_image_top rounded-top h-50" alt="">
        <!-- Added this if statement... -->
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
		<!-- // Page content -->

		<!-- footer -->
        <?php include(ROOT_PATH . '/includes/footer.php') ?>