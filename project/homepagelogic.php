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
        '<div class="col-lg-3 card content" style="background-color:white" onclick="details(\''.$dealnum.'\')">
                <img height=120 width=110 src="data:image/jpeg;base64,'.base64_encode($row['deal_logo']).'"/ class="mx-auto d-block">
                <div class="card-body" style="height:10rem">  
                    <h5 class="card-title" style="color:black; text-transform:uppercase; text-align:center; border-top-style:solid;border-bottom-style:solid;">'. htmlentities($row['deal_name']) . '</h5>
                    <p class="card-text">'. htmlentities($row['description']) . '</p>
                </div>
                <form method="POST">
                    <button type="submit" name="claim" style="background:none; border:none; margin-left:10rem" >
                        <img src="Icon/2635422.png" style="width:5rem; height:5rem;">
                    </button>
                </form>
        </div>';  
        if (isset($_POST['claim'])){
            $sql = "INSERT INTO saved_deals (user_id,deal_id) VALUES (:userid,:dealid)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':userid' => $_SESSION['user_id'],
                ':dealid' => $dealnum
            )
        );
        }
    }
}
else if(isset($_POST['dealID']) && $_POST['dealID']>=0 ){
    echo '<script type="text/javascript"> details('.$_POST['dealID'].'); </script>';
}
?>