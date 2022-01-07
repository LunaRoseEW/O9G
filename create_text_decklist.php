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

    function createTextDeck($userId, $name, $author, $type, $public, $cardlist){
            include_once 'config.php';

            $sql = 'INSERT INTO textdeck (user$id,name,author,deck_type,public,approved,cardlist) 
            VALUES (' . $userId . ",'" . $name . "', '" . $author . "', '" . $type . "', " . $public . ", 0, '" . $cardlist . "')";
            $result = mysqli_query($conn, $sql); 
            
            $lastId = mysqli_insert_id($conn);

            mysqli_close($conn);

            return $lastId;
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
    $name = $author = $formError = $cardlist = '';
    $type = 'User';
    $public = 0;
    $lastId;

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
        
        // Get the form field values. Trim and sanitize them first.
        $id = sanitizeInput($_POST['submit']);
        //$public = $_POST['public'];
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
                $lastId = createTextDeck($_SESSION['user']['id'], $name, $author, $type, $public, $cardlist);
                //header("Location: " . BASE_URL . "/single_text_decklist.php?number=" . $lastId);
                
                
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
        <h1>Create New Deck</h1>
    </header>

    <form action="<?php echo $phpScript; ?>" method="POST">
        <div>
            <p> 
                <label for="public">Make this deck public?</label>
                <input type="checkbox" id="public" name="public" value="<?php echo $public; ?>" >
            </p>
            <p> 
                <label for="name" >Deck Name</label>
                <span> *</span>
                <input id="name" name="name" placeholder="name" value="<?php echo $name; ?>" required>
            </p>
            <p> 
                <label for="author">Author</label>
                <span> *</span>
                <input id="author" name="author" placeholder="author" value="<?php echo $author; ?>" required>
            </p>
            <p> 
                <label for="cardlist"></label>
                <textarea id="cardlist" name="cardlist" cols="80" rows="16" placeholder="<?php echo $deck_placeholder; ?>" value="<?php echo $cardlist; ?>"></textarea>
            </p>
        </div>

        <!-- Edit buttons -->
        <div>
            <p><?php echo $formError;?></p>
            <p>
                <button id="submit" type="submit" name="submit" value="submit" >Save</button>  
                <a href="/O9G/decklists.php" name="submit" value=0>Cancel</a> 
            </p> 
        </div>
    </form>
</div> 

<?php include( realpath(dirname(__FILE__)) . '/includes/footer.php'); ?>
