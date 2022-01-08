<?php  include('config.php'); ?>
<?php include('includes/head_section.php'); ?>

<?php
	if ( !isset( $_SESSION['user'] ) ) {
		// If username variable is not set, then send them back to the login form.
		header('Location: login.php');
	}
		$sql = "SELECT * FROM textdeck WHERE " . 'user$id=' . $_SESSION['user']['id'];
	
	$result = mysqli_query($conn, $sql);
	$decks = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$html = '';

	foreach($decks as $deck){
		$html .= "<div class='col-sm-4'>" . "<div class='card shadow-lg rounded border border-1 border-secondary h-100' ' id=" . $deck['id'] 
		. " > " . "<div class='card-body'>" . "<h5 class='card-title'>" . $deck['name'] . "</h5>" . "<div class='card-text'>" . "</div>" . "<div class='card-footer'>" . $deck['created_at']  . "</div>"  .
		"<a href='single_text_decklist.php?number=" . $deck['id'] . "' class='stretched-link'>" . "</a>" . "</div>" . "</div>" . " </div>";
	}
?>

<title>Obnoxious 9 Games | Decklists </title>
</head>

<body class="d-flex flex-column min-vh-100">
		<!-- Navbar -->
			<?php include( ROOT_PATH . '/includes/navbar.php'); ?>
		<!-- // Navbar -->

<form method="get">
	<button type="submit" name="type" value="Top">Event Top</button>
	<button type="submit" name="type" value="User">User Submitted</button>
</form>
<p></p>
<form method="post">
	<div class="container">
		<div class="row">
			<?php echo $html; ?>
		</div>
	</div>
</form>

<div class="container">

</div>
<!-- // container -->
<!-- Footer -->
<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->