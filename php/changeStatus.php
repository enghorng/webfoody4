<?php
    include 'connectToDb.php';
    $obj = new DB();
    $con = $obj->conDb();

    $con->query("UPDATE tblfood SET Status=".$_GET["code"]." WHERE FoodCode='".$_GET["food-id"]."'");

    if($_GET["code"]==1){
        $status = "យល់ព្រម";
    }
    else if($_GET["code"]==3){
        $status = "បដិសេធ";
    }
    else{
        $status = "រងចាំការត្រួតពិនិត្យ";
    }
    echo '<label  id="statuschanged" style="color: blue; float: right; font-family: "Khmer OS Battambang";">
            <i> '.$status.' </i>
          </label>';
?>