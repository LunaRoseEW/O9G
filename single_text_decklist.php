<?php  include('config.php'); ?>
<?php include('includes/head_section.php'); ?>

<?php

if (isset($_GET['number'])) {
	$deckId = $_GET['number'];

	$sql = 'SELECT * FROM textdeck WHERE id=' . $deckId;

	$result = mysqli_query($conn, $sql);
    $decklist = mysqli_fetch_all($result, MYSQLI_ASSOC);
	

    foreach($decklist as $key => $value){
		$html.= "<div>     {$key} = > {$value}   </div>";
		foreach($value as $key2 => $value2){
			$html.= "<div>          {$key2} => {$value2}     </div>";
		}
    }
	
}

?>

<title>Obnoxious 9 Games | Decklists </title>
</head>

<body class="d-flex flex-column min-vh-100">
		<!-- Navbar -->
			<?php include( ROOT_PATH . '/includes/navbar.php'); ?>
		<!-- // Navbar -->

<p></p>

<div class="container">
<?php echo $html; ?>
</div>
<!-- // container -->
<!-- Footer -->
<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->