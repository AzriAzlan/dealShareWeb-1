<?php
session_start();
//pdo
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=dealShare','root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!(isset($_POST['dealID'])) && !(isset($_POST['promocode'])) && !(isset($_POST['name']))){
    //Display all registered deal
     $stmts = $pdo->prepare('SELECT d.deal_id,d.deal_name, d.deal_logo, d.promo_code, d.tagLine, d.reward, d.reward_unit, d.description,d.validity,
     d.company_address,d.company_postcode,d.company_country,s.user_id 
     FROM deal d inner join saved_deals s 
     on d.deal_id=s.deal_id 
     where s.user_id=:uid');
     $stmts->execute(array(
         ':uid' => $_SESSION['user_id']
     ));
    $result = $stmts->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $dealID=htmlentities($row['deal_id']);
        echo
            '<div class="row content" style="border-top-style:solid; border-top-color:green; border-top-width:10px; width:80%">
            <img class="col-lg-3" src="data:image/jpeg;base64,'.base64_encode($row['deal_logo']).'"/ style="margin-top:10px; height:300;">
            <div class="col-lg-9" style="margin-top:10px">
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
            </div>
            <div class="col-lg-12 d-flex justify-content-end">
                <button class="btn btn-success" type="button" name="share" style="margin:5px">share</button>
                <button class="btn btn-primary" type="button" name="redeem" style="margin:5px">redeem</button>
            </div>
            </div>';
    }
}
?>