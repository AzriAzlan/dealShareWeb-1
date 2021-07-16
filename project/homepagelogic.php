<?php
session_start();

//pdo
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=dealShare','root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!(isset($_POST['dealID'])) && !(isset($_POST['promocode'])) && !(isset($_POST['name']))){
    $stmts = $pdo->query('SELECT d.deal_id,d.deal_name, d.deal_logo, d.promo_code, d.tagLine, d.reward, d.reward_unit, d.description,r.deal_status FROM deal d inner join deal_review r on d.deal_id=r.deal_id where r.deal_status="approved"');
    $result = $stmts->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $dealnum=htmlentities($row['deal_id']);
        echo
        '<div class="col-lg-2 card content" style="background-color:white; border-bottom:solid blue 5px" onclick="details(\''.$dealnum.'\')">
                <img height=120 width=110 src="data:image/jpeg;base64,'.base64_encode($row['deal_logo']).'"/ class="mx-auto d-block">
                <div class="card-body" style="height:11rem;">  
                    <h5 class="card-title" style="color:black; text-transform:uppercase; text-align:center; border-top-style:solid;border-bottom-style:solid;">'. htmlentities($row['deal_name']) . '</h5>
                    <p class="card-text" style="">'. htmlentities($row['tagLine']) . '</p>
                </div>
        </div>';  
    }
}
else if(isset($_POST['dealID']) && $_POST['dealID']>=0 ){
    echo '<script type="text/javascript"> details('.$_POST['dealID'].'); </script>';
}
?>