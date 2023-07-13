<?php
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"],1);

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
        $item_id = $_POST['item_id'];
        $user_id = $row['user_id'];
        $gift_name = $_POST['gift_name'];
        $type = $_POST['type'];
        $quantity = $_POST['quantity'];
        $link = $_POST['link'];
        $sql = "UPDATE items SET 
            item_name='$gift_name', quantity=$quantity, link='$link', users_user_id=$user_id, types_type_id=$type 
            WHERE item_id=$item_id;";
        $result = $mysqli->query($sql);
        if (!$result) {
            echo $mysqli->error;
            $mysqli->close();
            exit();
        }
        $mysqli->close();
    $message = "Successfully edited the item";
    }
    else{
    $message = "The user does not exist";
    }
?>
<h1><?php echo $message?></h1>
<a href="lookup.php">Back to Look Up Page</a>