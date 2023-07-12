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

    
    $sql = "SELECT * from types;";
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
            <h1>Edit Form</h1>
            <form class="row justify-content-center" action="edit_conf.php" method="POST" id="addform">
                <input hidden type="text" name="item_id" value="<?php echo $_GET['item_id']?>">
                <div class="col-6">
                    <label class="form-label">Username: </label>
                    <input type="text" class="form-control" name="username" value="<?php echo $_GET['username'];?>">
                </div>
                <div class="col-6">
                    <label class="form-label">Gift Name: </label>
                    <input type="text" class="form-control" name="gift_name" value="<?php echo $_GET['item_name'];?>">
                </div>
            
                <div class="col-6">
                    <label class="form-label">Type: </label>
                    <select class="form-select" name="type">
                        <?php while($row = $result->fetch_assoc()) : ?>
							<option value= <?php echo $row["type_id"]?>> 
								<?php echo $row["type_name"] ?>
							</option>;
						<?php endwhile;?>
                    </select>
                </div>

                <div class="col-6">
                    <label class="form-label">Quantity: </label>
                    <input type="text" class="form-control" name="quantity" value="<?php echo $_GET['quantity']?>">
                </div>
            
            
                <div class="col-12">
                    <label class="form-label">Link: </label>
                    <input type="text" class="form-control" name="link" value="<?php echo $_GET['link']?>">
                </div>
                <div class="col-4">
                    <button class="btn btn-primary mt-3" type="submit" id="submit">Submit</button>
                </div>
            </form>
        </div>
        <script>
            document.querySelector("#submit").onclick=function(){
                console.log(document.querySelector("#addform").quantity.value.trim());
                let isnum = /^\d+$/;
                if(document.querySelector("#addform").username.value.trim()==""){
                    alert("username cannot be empty");
                    return false;
                }
                else if(document.querySelector("#addform").gift_name.value.trim()==""){
                    alert("Gift name cannot be empty");
                    return false;
                }
                else if(document.querySelector("#addform").quantity.value.trim()==""){
                    alert("quantity cannot be empty");
                    return false;
                }
                else if((document.querySelector("#addform").quantity.value).match(/^[0-9]+$/) == null){
                    alert("quantity must be a number");
                    return false;
                }
            }
        </script>
    </body>
</html>
