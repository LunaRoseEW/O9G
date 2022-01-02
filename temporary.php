<?php   
    declare(strict_types=1);
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    if ( !isset( $_SESSION['user'] ) ) {
        // If username variable is not set, then send them back to the login form.
        header('Location: login.php');
    }

    $phpScript = sanitizeInput($_SERVER['PHP_SELF']);

    function sanitizeInput($data) {
        return htmlspecialchars( stripslashes( trim( $data) ) );
    }// end sanitizeInput()

    function createTextDeck($name, $author, $type, $public, $cardlist){
        try{
            include_once 'config.php';

            $sql = 'INSERT INTO textdeck ' . 
            '( name, player, deck_type, public, cardlist) ' .
            'VALUES ' . 
            "('" . $name . "', '" . $author . "', '" . $type . "', '" . $public . "', '" . $cardlist . "')";

            $result = mysqli_query($conn, $sql);
            
        }catch(PDOException $e){     
            $formError = "there was an error creating this deck. Please try again later.";  
        }
    
    }

    $deck_placeholder = 'Please follow the proper format ignoring parenteses:  
(quantity of the card) : (cardname)                 
Example:                    
7 : Light Aura
2 : Holy Gem
2 : Lightning Alley
1 : Chaos Crystal
1 : Daytime
10 : Silver Bullet
1 : New Year\'s New Beginnings
2 : index
5 : Headless Nun
1 : The Ghost Marshall
1 : Sam Sinclair
7 : Light Elemental
etc...';

    /* ----------------------------------------------------------------------------------------- */
    $insert_id; 
    $name = $author = $formError = $cardlist = '';
    $type = 'User';
    $public = 0;

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
        
        // Get the form field values. Trim and sanitize them first.
        $id = sanitizeInput($_POST['submit']);
        $public = sanitizeInput($_POST['public']);
        $name = sanitizeInput($_POST['name']);
        $author = sanitizeInput($_POST['author']);
        //$type = sanitizeInput($_POST['type']);
        $cardlist  = sanitizeInput($_POST['cardlist']);
   
        // Updates are being saved.
        $isNameEmpty = empty($name);
        $isPlayerEmpty = empty($author);
        $isCardlistEmpty = empty($cardlist);

        $hasFormEmptyFields =  $isNameEmpty || $isPlayerEmpty || $isCardlistEmpty;
            
        if ( !$hasFormEmptyFields ) {
                $result = createTextDeck($name, $author, $type, $public, $cardlist);
                $insert_id = mysqli_insert_id($conn);
                header("Location: " . BASE_URL . "/single_decklist.php?" . $insert_id);
                $form_error = "deck created";
                
        } else {
            $formError = "Please fill out all the fields";        
        }
    }
    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ){
        
    }
    
?>
<?php include('includes/head_section.php'); ?>
<title>Obnoxious 9 Games | Decklists </title>
</head>

<body class="d-flex flex-column min-vh-100">
        <!-- Navbar -->
            <?php include( realpath(dirname(__FILE__)) . '/includes/navbar.php'); ?>
        <!-- // Navbar -->

<div>
    <header>
        <h1 class="text-center">Create New Deck</h1>
    </header>
    <hr>

    <form action="<?php echo $phpScript; ?>" method="POST">
        <div>
            <div class="row">
            <div class="col mb-3"> 
                <label class="form-label" for="name" >Deck Name *</label>
                <input class="form-control" id="name" name="name" placeholder="name" value="<?php echo $name; ?>" required>
            </div>
            <div class="col mb-3"> 
                <label class="form-label" for="author">Author *</label>
                <input class="form-control" id="author" name="author" placeholder="author" value="<?php echo $author; ?>" required>
            </div>
            </div>
            <div class="row">
            <div class="col"> 
                <label class="form-label" for="public">Make this deck public?</label>
                <input class="form-check-input" type="checkbox" id="public" name="public" value="<?php echo $public; ?>" >
            </div>
            </div>
            <div class="mb-3"> 
                <label class="form-label" for="cardlist"></label>
                <textarea class="form-control" id="cardlist" name="cardlist" cols="80" rows="16" placeholder="<?php echo $deck_placeholder; ?>" value="<?php echo $cardlist; ?>"></textarea>
            </div>
        </div>

        <!-- Edit buttons -->
        <div>
            <p><?php echo $formError;?></p>
            <div class="mb-3">
                <button type="submit" name="submit" value="<?php echo $insert_id; ?>" class="btn btn-dark">Save</button>  
                <a href="/O9G/decklists.php" name="submit" value=0 class="btn btn-warning">Cancel</a> 
            </div> 
        </div>
    </form>
</div> 

<?php include( realpath(dirname(__FILE__)) . '/includes/footer.php'); ?>
