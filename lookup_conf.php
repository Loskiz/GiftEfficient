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

    $sql = "SELECT * from items LEFT JOIN users ON items.users_user_id = users.user_id LEFT JOIN types ON items.types_type_id = types.type_id WHERE users.username = '$username';";
    $result = $mysqli->query($sql);

    if (!$result) {
        echo $mysqli->error;
        $mysqli->close();
        exit();
    }
    $mysqli->close();
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <style>
            #main{
                margin-left: auto;
                margin-right: auto;
                width: 800px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">GiftEfficient</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="navbar-nav">
                      <a class="nav-link" href="lookup.php">Lookup Gift</a>
                      <a class="nav-link" href="add_gift.php">Add Gift</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container" id="main">
            <div class="row" id="wishlist">
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Link</th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ( $row = $result->fetch_assoc() ) : ?>
                            <!--title, release_date, genre, rating, label, format, sound, award-->
                            <tr>
                                <td>
                                    <a href="delete_conf.php?item_id=<?php echo $row['item_id']; ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this gift?');">
                                        Delete
                                    </a>
                                </td>
                                
                                <td>
                                    <?php echo $row['item_name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['type_name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['quantity']; ?>
                                </td>
                                <td>
                                    <a href="https://<?php echo $row['link']; ?>" class="btn btn-outline-info" >Buy</a>
                                </td>
                                <td>
                                    <a href="edit_gift.php?item_id=<?php echo $row['item_id']; ?>&username=<?php echo $row['username'];?>&item_name=<?php echo $row['item_name']; ?>&quantity=<?php echo $row['quantity']; ?>&type_id=<?php echo $row['type_id']; ?>&link=<?php echo $row['link'];?>" class="btn btn-outline-warning">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>