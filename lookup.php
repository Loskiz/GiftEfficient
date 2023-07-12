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
            #gift{
                height: 100px;
                width: auto;
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
            <h1>Look Up Gift</h1>
            <img src="img/gift.jpg" alt="Gift" id="gift">
            <form class="row justify-content-center" method="GET" action="lookup_conf.php">
                <div class="col-6">
                    <label class="form-label">Username: </label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="row justify-content-center">
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </div>
                    
                </div>
            </form>
            <div class="row" id="wishlist">
                
            </div>
        </div>
    </body>
</html>