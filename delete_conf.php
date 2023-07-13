<?php
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

    $host= $url["host"];
    $user = $url["user"];
    $pass = $url["pass"];
    $db = substr($url["path"],1);

    $mysqli = new mysqli($host, $user, $pass, $db);
    if ($mysqli->connect_errno) {
		echo $mysqli->connect_error;
		exit();
	}

    $item_id = $_GET['item_id'];
    
    $sqln = "DELETE FROM items WHERE item_id=$item_id;";
    $resultn = $mysqli->query($sqln);

    if (!$resultn) {
        echo $mysqli->error;
        $mysqli->close();
        exit();
    }

    $mysqli->close();
    

?>
<h2>Successfully Deleted the Item</h2>
<a href="lookup.php">Back to Look Up Page</a>