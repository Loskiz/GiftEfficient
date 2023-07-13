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