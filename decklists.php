<?php  include('config.php'); ?>
<?php include('includes/head_section.php'); ?>

<?php
	$type = 'Top';
if (isset($_GET['type'])) {
	$type = $_GET['type'];
}
	$sql = "SELECT * FROM deck WHERE deck_type='$type' ORDER BY updated_at LIMIT 50;";
	
	$result = mysqli_query($conn, $sql);
	$decks = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$html = '';

	foreach($decks as $deck){
		$html .= "<div class='col-sm-4'>" . "<div class='card h-100' style='width: 18rem' id=" . $deck['id'] 
		. " > " . "<div class='card-body'>" . "<h6 class='card-title'>" . $deck['name'] . "</h6>" . 
		"<a href='single_decklist.php?number=" . $deck['id'] . "' class='stretched-link'>" . "</a>" . "</div>" . "</div>" . " </div>";
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