<?php
    $all = $_GET['filter'];
    $country = '';
    $type = '';
    $total[] = [];

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
        $type = 'Hot';
    }
    else if($all==4 || $all==14 || $all==24){
        $type = 'Ice';
    }
    else if($all==5 || $all==15 || $all==25){
        $type = 'Shake';
    }
    else if($all==6 || $all==16 || $all==26){
        $type = 'Juice';
    }
    else if($all==7 || $all==17 || $all==27){
        $type = 'Simple';
    }

    if($all==''){
        $foodSql1 = $con->query("SELECT * FROM `tblFood` WHERE `Status`=1 and `Category` = 'Drink' ORDER BY FoodDate DESC"); 
        while($i = $foodSql1->fetch_assoc()){
            $total[] = $i["FoodName"];
        } 
    }
    else if($country!='' && $type!=''){
        $foodSql1 = $con->query("SELECT * FROM `tblFood` WHERE `Status`=1 and `Category` = 'Drink' and `Country`='".$country."' and `FoodType`='".$type."' ORDER BY FoodDate DESC");
        while($i = $foodSql1->fetch_assoc()){
            $total[] = $i["FoodName"];
        }
    }
    else if($country!='' && $type==''){
        $foodSql1 = $con->query("SELECT * FROM `tblFood` WHERE `Status`=1 and `Category` = 'Drink' and `Country`='".$country."' ORDER BY FoodDate DESC");         
        while($i = $foodSql1->fetch_assoc()){
            $total[] = $i["FoodName"];
        }
    }
    else if($country=='' && $type!=''){
        $foodSql1 = $con->query("SELECT * FROM `tblFood` WHERE `Status`=1 and `Category` = 'Drink' and `FoodType`='".$type."' ORDER BY FoodDate DESC");         
        while($i = $foodSql1->fetch_assoc()){
            $total[] = $i["FoodName"];
        }
    }

    // $count = 0;
    // if ($foodSql1->num_rows > 0) {         
    //     while($food = $foodSql1->fetch_assoc()) {
    //         if($count == 15) break;
    //         $count++;                                                            
    //     }
    // }
    $c = count($total) - 1;
    echo  'ចំនួនមុខម្ហូបសរុប៖ '.$c.'/'.$c;
    
?>