<?php  include('config.php'); ?>
<?php include('includes/head_section.php'); ?>

<?php

if (isset($_GET['number'])) {
	$deckId = $_GET['number'];

	$sql3 = 'SELECT deck.id AS deckId, deck.name AS deckName, 
	deck_card.deck$id, deck_card.card$id, deck_card.qty, 
	card.id AS cardId, card.name AS cardName FROM deck JOIN deck_card JOIN card 
	WHERE deck.id = ' . $deckId . ' AND deck_card.deck$id = ' . $deckId . 
	' AND deck_card.card$id = card.id';
	
	$result = mysqli_query($conn, $sql3);
    $decklist = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$html = '';
	
	$name = $decklist[0]['deckName'];

    foreach($decklist as $key => $value){
		//$html.= "<div>     {$key} = > {$value}     </div>";
		$html.= $value['qty'] . " " . $value['cardName'] . "<br>";
	
}
}

?>

<title>Obnoxious 9 Games | Decklists </title>
</head>

<body class="d-flex flex-column min-vh-100">
		<!-- Navbar -->
			<?php include( ROOT_PATH . '/includes/navbar.php'); ?>
		<!-- // Navbar -->

<div class="container mt-5">
	<div class='row'>
		<div class="col-sm-5">
			<div class="card shadow-lg rounded border border-1 border-secondary h-100">
				<h3 class="card-title"><?php echo $name; ?></h3>
				<hr>
				<div class='list-unstyled'>
					<?php echo $html; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- // container -->
<!-- Footer -->
<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->