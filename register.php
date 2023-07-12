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

    $username = $_GET['username'];
    $sql = "INSERT INTO users (username) VALUES ('$username');";
    $result = $mysqli->query($sql);

    if (!$result) {
        echo $mysqli->error;
        $mysqli->close();
        exit();
    }

    $mysqli->close();
?>
<h1>Successfully Registered</h1>
<a href="index.php">Back to the Main Page</a>