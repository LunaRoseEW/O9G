<?php  include('config.php'); ?>
<?php include('includes/head_section.php'); ?>

<?php

if (isset($_GET['number'])) {
	$deckId = $_GET['number'];

	$sql = "SELECT * FROM deck WHERE id='$deckId' ORDER BY updated_at LIMIT 1;";

    $sql2 = "SELECT d.id, d.name r.qty c.id c.name FROM deck d WHERE id='$deckId' 
    JOIN deck_card r ON d.id=" . 'r.deck$id '. 
    "JOIN card c ON " . 'r.card$id' . "=c.id;";
	
	$result = mysqli_query($conn, $sql2);
    $decklist = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$html = '';

    foreach($decklist as $key => $value){
        $html.= "<div>     {$key} => {$value}     </div>";
    }
	
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
<?php echo $html; ?>

<div class="container">

</div>
<!-- // container -->
<!-- Footer -->
<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->