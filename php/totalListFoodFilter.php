<?php
    $all = $_GET['filter'];
    $c = '';
    $s = '';
    $total[] = [];
    
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

    if($all== 4 || $all == 14  || $all == 24 || $all == 34){
        $s = 2;
    }
    else if($all== 5 || $all == 15 || $all == 25 || $all == 35){
        $s = 1;
    }    
    else if($all== 6 || $all == 16 || $all == 26 || $all == 36){
        $s = 3;
    }

    if($all==''){
        $foodSql = $con->query("SELECT * FROM `tblfood` WHERE UserCode = '".$usercode."' ORDER BY FoodDate DESC");    
    }
    else if($c!='' && $s!=''){    
        $foodSql = $con->query("SELECT * FROM `tblfood` WHERE UserCode = '".$usercode."' and Category = '".$c."' and Status = '".$s."' ORDER BY FoodDate DESC");    
    }
    else if($c!='' && $s==''){
        $foodSql = $con->query("SELECT * FROM `tblfood` WHERE UserCode = '".$usercode."' and Category = '".$c."' ORDER BY FoodDate DESC");    
    }
    else if($c=='' && $s!=''){
        $foodSql = $con->query("SELECT * FROM `tblfood` WHERE UserCode = '".$usercode."' and Status = '".$s."' ORDER BY FoodDate DESC");    
    }

    while($i = $foodSql->fetch_assoc()){
        $total[] = $i["FoodName"];
    } 

    $c = count($total) - 1;
    echo  'ចំនួនមុខម្ហូបសរុប៖ '.$c.'/'.$c;
?>