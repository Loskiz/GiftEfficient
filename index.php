<?php 
$api_key = getenv("API_KEY_FINNHUB");
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <style>
            #gift{
                height: 150px;
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
        <div class="container text-center">
            <h1>GiftEfficient</h1>
            <img src="img/gift.jpg" alt="Gift" id="gift">
            <p>Let's face it: getting the right present is hard</p>
            <p>So why don't make it easier and let the other party decide for themselves?</p>
            <p>See what other people actually want so you can gift efficiently</p>
            <p>Keep track of finances so you know you have the money</p>
            <div>Stock Lookup</div>
            
            <div class="row">
                <div class="col">
                    <h3>Register</h3>
                    <form action="register.php" class="row justify-content-center" method="GET" id="registerform">
                        <div class="col-8">
                            <label class="form-label">
                                Username
                            </label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary mt-3" id="reg_submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col">
                    <h3>Look up stock by Ticker</h3>
                    <form class="row justify-content-center" id="stock-search-form">
                        <div class="col-8">
                            <label class="form-label">
                                Ticker
                            </label>
                            <input type="text" class="form-control" name="f">
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-2">
                                <button type="button" class="btn btn-primary mt-3" id="stock-search">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row" id="stock-info">
                <h3>Stock Infomation</h3>
                <div class="col" id="prices">
                </div>
            </div>
            
            

        </div>
        <script>
            document.querySelector("#reg_submit").onclick=function(){
                if(document.querySelector("#registerform").username.value.trim()==""){
                    alert("User name cannot be empty");
                    return false;
                }
            }

            function createPrices(data){
                let smText = document.createElement("h5");
                smText.innerHTML="Summary"
                let hr=document.createElement("hr");
                document.querySelector("#prices").appendChild(smText);
                document.querySelector("#prices").appendChild(hr);

                let hp = document.createElement("h5");
                hp.innerHTML="High Price:" + data.h;
                let lp = document.createElement("h5");
                lp.innerHTML="Low Price:" +data.l;
                let op = document.createElement("h5");
                op.innerHTML="Open Price:" +data.o;
                let cp = document.createElement("h5");
                cp.innerHTML="Close Price:" +data.pc;
                let bt = document.createElement("div");
                bt.innerHTML="<input type='button' class='btn btn-primary' onclick=clearPrices() value='Close'>";

                document.querySelector("#prices").appendChild(hp);
                document.querySelector("#prices").appendChild(lp);
                document.querySelector("#prices").appendChild(op);
                document.querySelector("#prices").appendChild(cp);
                document.querySelector("#prices").appendChild(bt);


            }
            function clearPrices(){
                prices.innerHTML="";
            }
            document.querySelector("#stock-search").onclick = function(){
                let ticker = document.querySelector("#stock-search-form").f.value;
                const url2 = "https://finnhub.io/api/v1/quote?symbol=" + ticker + "&token=<?php echo $api_key?>"
                $.ajax({
                    url: url2,
                    dataType: "json"   
                }).then((data2) => {
                    console.log(data2);
                    createPrices(data2);

                }).fail((error) => {
                    alert("AJAX Error");
                    console.log(error);
                });
                return false;
            }

            
        </script>
    </body>
</html>