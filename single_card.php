<?php  include('config.php'); ?>
<?php include('includes/head_section.php'); ?>

<?php

if (isset($_GET['number'])) {
	$cardId = $_GET['number'];

	$sql = "SELECT * FROM card WHERE id = " . $cardId;
	$result = mysqli_query($conn, $sql);
    $card = mysqli_fetch_all($result, MYSQLI_NUM);

	$html = $name = $rarity = $set = $set_num = $page_type 
    = $spellbook_limit = $aura_type = $total_aura_cost = $text = '';

    if($card){
        $card = $card[0];
        $name = $card[1];
        $rarity = $card[2];
        $set = $card[3];
        $set_num = $card[4];
        $page_type = $card[5];
        $spellbook_limit = $card[6];
        $aura_type = $card[7];
        $total_aura_cost = $card[8];
        $text = $card[9];
        
        $html.= "<div>Name: {$name}</div>";
        $html.= "<div>Rarity: {$rarity}</div>";
        $html.= "<div>Set: {$set}</div>";
        $html.= "<div>Number in Set: {$set_num}</div>";
        $html.= "<div>Page Type: {$page_type}</div>";
        $html.= "<div>Spellbook Limit: {$spellbook_limit}</div>";
        $html.= "<div>Aura Type: {$aura_type}</div>";
        $html.= "<div>Total Aura Cost: {$total_aura_cost}</div>";
        // TO BE ADDED additional code if the card is a beastie
        $html.= "<div>Card Text: {$text}</div>";
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