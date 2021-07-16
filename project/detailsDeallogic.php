<?php
session_start();
//pdo
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=dealShare','root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!(isset($_POST['dealID'])) && !(isset($_POST['promocode'])) && !(isset($_POST['name']))){
    //Display all registered deal
    $stmts = $pdo->prepare('SELECT deal_id,deal_name,deal_logo, promo_code,tagLine,reward,reward_unit,description,validity, company_address, company_postcode, company_country
    FROM deal 
    where deal_id=:dealID');
    $stmts -> execute(array(
        ':dealID' => $_GET['deal_id']
    ));
     
    $result = $stmts->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $dealID=htmlentities($row['deal_id']);
        echo
            '<img class="col-lg-3" src="data:image/jpeg;base64,'.base64_encode($row['deal_logo']).'"/ style="margin-top:10px; height:300;">
            <div class="col-lg-9" style="margin-top:10px">
                <form method="POST">
                    <button class="float-right" type="submit" name="claim" style="background:none; border:none; position:" >
                        <img src="Icon/2635422.png" style="width:5rem; height:5rem;">
                    </button>
                </form>
                <h1 style="color:black; text-align:center; font-size:50px; text-transform: uppercase;">'. htmlentities($row['deal_name']) . '</h1>
                <div class="row" style="border-top-style:solid; border-bottom-style:solid;">
                    <p class="col-lg-6" style="text-align:left;">Promo code: <strong>'. htmlentities($row['promo_code']) . '</strong></p>
                    <p class="col-lg-6" style="text-align:right;"> Expired: '. htmlentities($row['validity']) . '</p>
                </div>
                <h5>Description:</h5>
                <ul>'. htmlentities($row['description']) . '</ul>
                <h5>Tagline:</h5>
                <ul>'. htmlentities($row['tagLine']) . '</ul>
                <h5>Reward Redeem:</h5>
                <ul>'. htmlentities($row['reward']). htmlentities($row['reward_unit']) . '</ul>
                <h5>Address:</h5>
                <ul>'. htmlentities($row['company_address']).'</br>'. htmlentities($row['company_postcode']) .'</br>'. htmlentities($row['company_country']) .'</ul>
            </div>';
            if (isset($_POST['claim'])){
                $sql = "INSERT INTO saved_deals (user_id,deal_id) VALUES (:userid,:dealid)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(
                    ':userid' => $_SESSION['user_id'],
                    ':dealid' => $dealID
                )
            );
            }
    }
}
?>