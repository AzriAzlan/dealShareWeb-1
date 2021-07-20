<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="mycss.css">
    <!-- Load icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body class="bg">
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ms_MY/sdk.js#xfbml=1&version=v11.0"
        nonce="4R0xQADw"></script>
    <!--navigation-->

    <nav class="navbar navbar-fixed-top navbar-expand-md justify-content-end navbar-dark bg-primary">
        <a class="navbar-brand" href="#">DealShare</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-navigation">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="homepage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="userIntReg1.php">Register Deal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dealShare.php">Saved Deals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="deal_review.php">Review</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="rewardpage.php">Reward</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="POST">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                    name="dealID">
                    <button class="btn my-2 my-sm-0" type="submit" style="border-radius:10px; height:35px; background-color:aqua"><i class="fa fa-search"></i></button>
            </form>

    </nav>

    <!--Content-->
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="row content d-flex justify-content-center"
                style="border-top:solid aqua 10px; width:50%; background-color:white; border-radius:10px">
                <div class="col-lg-9" style="margin-top:10px">
                    <h1
                        style="color:black; text-align:center; font-size:50px; text-transform: uppercase; border-bottom:solid 5px">
                        Reward</h1>
                    <h5>Referral point: </h5>
                    <ul>
                        <li>1st generation referrer 5 points. </li>
                        <li>2nd generation referrer 2 points</li>
                        <li>3rd generation referrer 1 point. </li>
                    </ul>
                    <h5>Point:</h5>
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="50" style="border:solid 1px; border-radius:10px; background-color:gainsboro">
                    <h5>Total Reward:</h5>
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="RM980" style="border:solid 1px; border-radius:10px; background-color:gainsboro">
                </div>
                <div class="col-lg-12 d-flex justify-content-end">
                    <button class="btn btn-primary" type="button" name="redeem" style="margin:5px">claim</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>