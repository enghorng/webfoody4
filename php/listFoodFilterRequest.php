<?php
    
    $all = $_GET['filter'];
    $c = '';
    $s = '';
    $count = 0;


    //connect to database
    include 'connectToDb.php';
    $obj = new DB();
    $con = $obj->conDb();

    $sql = $con->query("SELECT * FROM `tblcheckrole` WHERE id = 1");    
    $roleSql = $sql->fetch_assoc();
    $usercode = $roleSql["UserCode"];

    if($all== 1 || $all == 14  || $all == 15 || $all == 16){
        $c = "Food";
    }
    else if($all== 2 || $all == 24 || $all == 25 || $all == 26){
        $c = "Sweet";
    }    
    else if($all== 3 || $all == 34 || $all == 35 || $all == 36){
        $c = "Drink";
    }

    if($all==''){
        $foodSql = $con->query("SELECT * FROM `tblfood` WHERE Status =2 ORDER BY FoodDate DESC");    
    }
    else{
        $foodSql = $con->query("SELECT * FROM `tblfood` WHERE Category = '".$c."' and Status = 2 ORDER BY FoodDate DESC");    
    }
    
    if ($foodSql->num_rows > 0) {         
        while($food = $foodSql->fetch_assoc()) {
            if($count == 15) break;
            $count++;
            //Check Status
            if($food["Status"]==2){
              $color = "blue";
            }

            echo '<div class="col-lg-4 col-md-6 col-sm-12 col-12 card foodcard">
                    <div class="food-div">
                    <a href="checkFood.php?food-id='.$food['FoodCode'].'">
                    <img class="card-img-top" src="../images/'.$food['Category'].'/'.$food['FoodImage'].'"></a>
                    </div>
                    <a href="checkFood.php?food-id='.$food['FoodCode'].'"><h6>'.$food['FoodName'].'</h6></a>
                    <span style="color: '.$color.';" class="text-right">&nbsp;&#9679;</span>
                  </div>';                                                     
        }
    }
    else{
        echo '<div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <p>​ មិនមាន </p>
              </div>';
    }
?>