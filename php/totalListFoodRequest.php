<?php
    $all = $_GET['filter'];
    $c = '';
    $s = '';
    $count = 0;
    $total[] = array();

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
    else if($all!=''){
        $foodSql = $con->query("SELECT * FROM `tblfood` WHERE Category = '".$c."' and Status = 2 ORDER BY FoodDate DESC");    
    }
    
    while($i = $foodSql->fetch_assoc()){
        $total[] = $i["FoodName"];
    } 

    $c = count($total) - 1;
    echo  'ចំនួនមុខម្ហូបសរុប៖ '.$c;
?>