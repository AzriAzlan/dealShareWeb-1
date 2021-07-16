<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="mycss.css">
    <!-- Load icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ms_MY/sdk.js#xfbml=1&version=v11.0"
        nonce="4R0xQADw"></script>
    <!--navigation-->

    <nav class="navbar navbar-fixed-top navbar-expand-md justify-content-end navbar-dark bg-primary">
        <a class="navbar-brand" href="#">DealShare</a>
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-navigation">


            <ul class="navbar-nav ml-auto">
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
            </ul>

    </nav>

    <!--Content-->
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <div class="row content" style="border-top:solid darkcyan 10px; width:80%; border-radius:10px">
                <?php
                    include "detailsDeallogic.php"
                ?>
            </div>
        </div>
    </div>
</body>

</html>