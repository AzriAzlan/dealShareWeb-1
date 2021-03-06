<?php
session_start();
//pdo
require_once "../pdo.php";


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
    if(isset($_POST['DealName'])){
        usort($result, function($a, $b) {
            return $a['deal_name'] <=> $b['deal_name'];
        });
    }
    else if(isset($_POST['DealID'])){
        usort($result, function($a, $b) {
            return $a['deal_id'] <=> $b['deal_id'];
        });
    }
    foreach ($result as $row) {
        $dealID=htmlentities($row['deal_id']);
        echo
            '<div class="row content" style="border-top:solid green 10px; width:80%; background-color:white; border-radius:10px">
            <img class="col-lg-3" src="data:image/jpeg;base64,'.base64_encode($row['deal_logo']).'"/ style="margin-top:10px; height:300;">
            <div class="col-lg-9" style="margin-top:10px">
            <!-- Button trigger modal -->    
            <button class="btn float-right" type="button" name="share" style="margin:5px;" data-toggle="modal" data-target="#'.$dealID.'"><i class="fa fa-share-alt fa-2x" aria-hidden="true"></i></button>
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
                <button class="btn btn-primary" type="button" name="redeem" style="margin:5px">redeem</button>
            </div>
            </div>
            
            <!-- The Modal -->
                    <div class="modal fade" id="'.htmlentities($row['deal_id']).'">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
        
                                <!-- Modal Header -->
                                <div class="modal-header ">
                                    <h4 class="modal-title"><strong>'.htmlentities($row['deal_name']).'</strong></h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <h1 style="font-size:30px">Description:</h1>
                                    <p class="card-text">'. htmlentities($row['description']) . '</p>
                                    <h1 style="font-size:30px">Reward:</h1>
                                    <p class="card-text">'. htmlentities($row['reward']). htmlentities($row['reward_unit']) . '</p>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer d-flex justify-content-center">
                                    <div data-href="http://localhost/deal%20application/homepage.php" data-layout="button" data-size="large">
                                        <a target="_blank"
                                            href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2Fdeal%2520application%2Fhomepage.php&amp;src=sdkpreparse"
                                            class="fb-xfbml-parse-ignore"><img src="Icon/fb.png" style="height:50px; margin:10px"></a>
                                    </div>
                                    <a href="https://www.instagram.com/?url=http://localhost/deal%20application/dealshare.php"><img src="Icon/instagram-round-icon-png-5.jpg" style="height:50px; margin:10px"></a>
                                    <a href="http://www.twitter.com/share?url=http://localhost/deal%20application/dealshare.php"><img src="Icon/twittericon.png" style="height:50px; margin:10px"></a>
                                    <a href="whatsapp://send?text='.htmlentities($row['deal_name']).'" data-action="share/whatsapp/share"><img src="Icon/wa.png" style="height:50px; margin:10px"></a>
                                </div>
                            </div>
                        </div>
                    </div>';
    }
}
else if(isset($_POST['dealID']) && $_POST['dealID']>=0 ){
    $stmts = $pdo->prepare('SELECT d.deal_id,d.deal_name, d.deal_logo, d.promo_code, d.tagLine, d.reward, d.reward_unit, d.description,d.validity,
     d.company_address,d.company_postcode,d.company_country,s.user_id 
     FROM deal d inner join saved_deals s 
     on d.deal_id=s.deal_id 
     where s.user_id=:uid and d.deal_id=:dealID');
     $stmts->execute(array(
         ':uid' => $_SESSION['user_id'],
         ':dealID' => $_POST['dealID']
     ));
    $result = $stmts->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $dealID=htmlentities($row['deal_id']);
        echo
            '<div class="row content" style="border-top:solid green 10px; width:80%; background-color:white; border-radius:10px">
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
                <button class="btn btn-success" type="button" name="share" style="margin:5px" data-toggle="modal" data-target="#'.$dealID.'">share</button>
                <!-- Button trigger modal -->
                <button class="btn btn-primary" type="button" name="redeem" style="margin:5px">redeem</button>
            </div>
            </div>
            
            <!-- The Modal -->
                    <div class="modal fade" id="'.htmlentities($row['deal_id']).'">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
        
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">'.htmlentities($row['deal_name']).'</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <h1 style="font-size:30px">Tagline:</h1>
                                    <p class="card-text">'. htmlentities($row['tagLine']) . '</p>
                                    <h1 style="font-size:30px">Description:</h1>
                                    <p class="card-text">'. htmlentities($row['description']) . '</p>
                                    <h1 style="font-size:30px">Reward:</h1>
                                    <p class="card-text">'. htmlentities($row['reward']). htmlentities($row['reward_unit']) . '</p>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <div data-href="http://localhost/deal%20application/homepage.php" data-layout="button" data-size="large">
                                        <a target="_blank"
                                            href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2Fdeal%2520application%2Fhomepage.php&amp;src=sdkpreparse"
                                            class="fb-xfbml-parse-ignore"><img src="Icon/fb.png" style="height:50px; margin:10px"></a>
                                    </div>
                                    <a href="https://www.instagram.com/?url=http://localhost/deal%20application/dealshare.php"><img src="Icon/instagram-round-icon-png-5.jpg" style="height:50px; margin:10px"></a>
                                    <a href="http://www.twitter.com/share?url=http://localhost/deal%20application/dealshare.php"><img src="Icon/twittericon.png" style="height:50px; margin:10px"></a>
                                    <a href="whatsapp://send?text='.htmlentities($row['deal_name']).'" data-action="share/whatsapp/share"><img src="Icon/wa.png" style="height:50px; margin:10px"></a>
                                </div>
                            </div>
                        </div>
                    </div>';
    }
}
?>