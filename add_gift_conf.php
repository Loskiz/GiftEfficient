<?php
    $host = "303.itpwebdev.com";
	$user = "letianz_user1";
	$pass = "USCitp2022";
	$db = "letianz_giftefficient";

    $mysqli = new mysqli($host, $user, $pass, $db);
    if ($mysqli->connect_errno) {
		echo $mysqli->connect_error;
		exit();
	}

    $username = $_POST['username'];
    
    $sqln = "SELECT * from users WHERE username = '$username';";
    $resultn = $mysqli->query($sqln);

    if (!$resultn) {
        echo $mysqli->error;
        $mysqli->close();
        exit();
    }
    if($row = $resultn->fetch_assoc()){
        $user_id = $row['user_id'];
        $gift_name = $_POST['gift_name'];
        $type = $_POST['type'];
        $quantity = $_POST['quantity'];
        $link = $_POST['link'];
        $sql = "INSERT INTO items (item_name, quantity, link, users_user_id, types_type_id) VALUES('$gift_name', '$quantity', '$link', $user_id,$type);";
        $result = $mysqli->query($sql);
        if (!$result) {
            echo $mysqli->error;
            $mysqli->close();
            exit();
        }
        $mysqli->close();
    $message = "Successfully Submitted";
    }
    else{
    $message = "The user does not exist";
    }
    

    

    
?>
<h1><?php echo $message?></h1>
<a href="add_gift.php">Back to Add Gift</a>