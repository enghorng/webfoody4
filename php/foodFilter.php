<?php
    $all = $_GET['filter'];
    $country = '';
    $type = '';
    $count = 0;

    //connect to database
    include 'connectToDb.php';
    $obj = new DB();
    $con = $obj->conDb();

    if($all== 1 || $all == 13 || $all == 14){
        $country = "Khmer";
    }
    else if($all== 2 || $all == 23 || $all == 24){
        $country = "Foreign";
    }

    if($all==3 || $all==13 || $all==23){
        $type = 'Water';
    }
    else if($all==4 || $all==14 || $all==24){
        $type = 'NoWater';
    }

    if($all==''){
        $foodSql = $con->query("SELECT * FROM `vuserfood` WHERE `Category` = 'Food' ORDER BY FoodDate DESC"); 
    }
    else if($country!='' && $type!=''){
        $foodSql = $con->query("SELECT * FROM `vuserfood` WHERE `Category` = 'Food' and `Country`='".$country."' and `FoodType`='".$type."' ORDER BY FoodDate DESC");
        // echo "SELECT * FROM `Sweetvuserfood` WHERE `Category` = 'Food' and `Country`='".$country."' and `FoodType`='".$type."' ORDER BY FoodDate DESC";      
    }
    else if($country!='' && $type==''){
        $foodSql = $con->query("SELECT * FROM `vuserfood` WHERE `Category` = 'Food' and `Country`='".$country."' ORDER BY FoodDate DESC");         

    }
    else if($country=='' && $type!=''){
        $foodSql = $con->query("SELECT * FROM `vuserfood` WHERE `Category` = 'Food' and `FoodType`='".$type."' ORDER BY FoodDate DESC");         

    }
    
    if ($foodSql->num_rows > 0) {         
        while($food = $foodSql->fetch_assoc()) {
            if($count == 15) break;
            $count++;
            echo '<div class="col-lg-4 col-md-6 col-sm-12 col-12 card foodcard">
                    <div class="food-div">
                        <a href="food-detail.php?food-id='.$food['FoodCode'].'">
                        <img class="card-img-top" src="../images/Food/'.$food['FoodImage'].'"></a>
                    </div>
                    <a href="food-detail.php?food-id='.$food['FoodCode'].'"><h6>'.$food['FoodName'].'</h6></a>
                    <div class="media align-self-left">
                        <img src="../images/User/'.$food['UserImage'].'" alt="John Doe" class="ml-3 mt-3 rounded-circle photouser" style="width:25px; height: 25px; margin-left: 10px;">
                        <div class="align-self-center">
                        <p class="mb-0" style="padding-top: 17px; font-size: 11px; color: gray;">&nbsp; &nbsp; '.$food['FullName'].'</p>
                        </div>
                    </div>
                </div>';                                                     
        }
    }
    else{
        echo '<div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <p>​ មិនមាន </p>
              </div>';
    }
?>