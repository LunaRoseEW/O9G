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

    foreach($decklist as $key => $value){
		$html.= "<div>     {$key} = > {$value}     </div>";
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