<?php
    $d = $_GET["filter"];
    if($d=='month'){
        $r = "(MONTH(RegisterDate) = 2 or MONTH(RegisterDate) = 3)"; 
        $f = "(MONTH(FoodDate) = 2 or MONTH(FoodDate) = 3)";
    }
    if($d=='week'){
        $r = "YEARWEEK(`RegisterDate`, 1) = YEARWEEK(CURDATE(), 1)";
        $f = "YEARWEEK(`FoodDate`, 1) = YEARWEEK(CURDATE(), 1)";
    }
    if($d=='day'){
        $r = "DATE(`RegisterDate`) = CURDATE()";
        $f = "DATE(`FoodDate`) = CURDATE()";
    }

    //connect to database
    include 'connectToDb.php';
    $obj = new DB();
    $con = $obj->conDb();

    //Select User Account Information
    $tUser[] = array(); $tUserAll[] = array(); $tAdmin[] = array(); $tMember[] = array();
    $allSql = $con->query("SELECT * FROM `tbluser` WHERE Status=1");
    while($all = $allSql->fetch_assoc()){
        $tUserAll[] = $all["id"];
    } 
    $userSql = $con->query("SELECT * FROM `tbluser` WHERE Status=1 AND ".$r."");
    while($user = $userSql->fetch_assoc()){
        $tUser[] = $user["id"];
    } 
    //Admin and Member Role
    $adminSql = $con->query("SELECT * FROM `tbluser` WHERE Status=1 AND Role=1 AND ".$r."");
    while($admin = $adminSql->fetch_assoc()){
        $tAdmin[] = $admin["id"];
    }
    $memberSql = $con->query("SELECT * FROM `tbluser` WHERE Status=1 AND Role=2 AND ".$r."");
    while($member = $memberSql->fetch_assoc()){
        $tMember[] = $member["id"];
    }
    //Select Food Information
    $tAll = 0; 
    $tApprove[] = array(); $tRequest[] = array(); $tReject[] = array();
    $approveSql = $con->query("SELECT * FROM `tblfood` WHERE Status=1 AND ".$f."");  
    while($approve = $approveSql->fetch_assoc()){
        $tApprove[] = $approve["FoodName"];
    } 
    $requestSql = $con->query("SELECT * FROM `tblfood` WHERE Status=2 AND ".$f."");  
    while($request = $requestSql->fetch_assoc()){
        $tRequest[] = $request["FoodName"];
    } 
    $rejectSql = $con->query("SELECT * FROM `tblfood` WHERE Status=3 AND ".$f."");  
    while($reject = $rejectSql->fetch_assoc()){
        $tReject[] = $reject["FoodName"];
    } 
    $tAll = count($tApprove)+count($tRequest)+count($tReject);
    //Approve
    $tfoodApprove[] = array(); $tsweetApprove[] = array(); $tdrinkApprove[] = array();
    $foodApproveSql = $con->query("SELECT * FROM `tblfood` WHERE Category='Food' AND Status=1 AND ".$f."");  
    while($foodApprove = $foodApproveSql->fetch_assoc()){
        $tfoodApprove[] = $foodApprove["FoodName"];
    }
    $sweetApproveSql = $con->query("SELECT * FROM `tblfood` WHERE Category='Sweet' AND Status=1 AND ".$f."");  
    while($sweetApprove = $sweetApproveSql->fetch_assoc()){
        $tsweetApprove[] = $sweetApprove["FoodName"];
    } 
    $drinkApproveSql = $con->query("SELECT * FROM `tblfood` WHERE Category='Drink' AND Status=1 AND ".$f."");  
    while($drinkApprove = $drinkApproveSql->fetch_assoc()){
        $tdrinkApprove[] = $drinkApprove["FoodName"];
    }
    //Request
    $tfoodRequest[] = array(); $tsweetRequest[] = array(); $tdrinkRequest[] = array();
    $foodRequestSql = $con->query("SELECT * FROM `tblfood` WHERE Category='Food' AND Status=2 AND ".$f."");  
    while($foodRequest = $foodRequestSql->fetch_assoc()){
        $tfoodRequest[] = $foodRequest["FoodName"];
    }
    $sweetRequestSql = $con->query("SELECT * FROM `tblfood` WHERE Category='Sweet' AND Status=2 AND ".$f."");  
    while($sweetRequest = $sweetRequestSql->fetch_assoc()){
        $tsweetRequest[] = $sweetRequest["FoodName"];
    } 
    $drinkRequestSql = $con->query("SELECT * FROM `tblfood` WHERE Category='Drink' AND Status=2 AND ".$f."");  
    while($drinkRequest = $drinkRequestSql->fetch_assoc()){
        $tdrinkRequest[] = $drinkRequest["FoodName"];
    }
    //Reject
    $tfoodReject[] = array(); $tsweetReject[] = array(); $tdrinkReject[] = array();
    $foodRejectSql = $con->query("SELECT * FROM `tblfood` WHERE Category='Food' AND Status=3 AND ".$f."");  
    while($foodReject = $foodRejectSql->fetch_assoc()){
        $tfoodReject[] = $foodReject["FoodName"];
    }
    $sweetRejectSql = $con->query("SELECT * FROM `tblfood` WHERE Category='Sweet' AND Status=3 AND ".$f."");  
    while($sweetReject = $sweetRejectSql->fetch_assoc()){
        $tsweetReject[] = $sweetReject["FoodName"];
    } 
    $drinkRejectSql = $con->query("SELECT * FROM `tblfood` WHERE Category='Drink' AND Status=3 AND ".$f."");  
    while($drinkReject = $drinkRejectSql->fetch_assoc()){
        $tdrinkRequest[] = $drinkReject["FoodName"];
    }

    echo '<div class="col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card card-accent-primary mb-3 dashboardbk" style="max-width: 30rem;">
        <div class="card-header" style="background-image: linear-gradient(to right, #6190E8 , #A7BFE8);">
        <h6 style="text-align: center; margin-bottom: 0px;">រងចាំ</h6></div>
        <div class="card-body text-primary" style="background-color: #c7efe2">
        <div class="row">
        <a href="admin-request.php">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12 text-center" style="padding-left: 30px;">
                <div class="res-circle">
                    <div class="circle-txt">'.(count($tRequest)-1).'មុខ</div>
                    <div class="circle-txt2">'.(number_format(((count($tRequest)-1)*100)/$tAll,2)).'%</div>
                </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-12" style="margin-top: 30px;">
                <p style="font-size: 15px;"><span style="color: blue;">&nbsp;&#9679;</span>ម្ហូប   : '.(count($tfoodRequest)-1).'មុខ</p>
                <p style="font-size: 15px;"><span style="color: blue;">&nbsp;&#9679;</span>បង្អែម : '.(count($tsweetRequest)-1).'មុខ</p>
                <p style="font-size: 15px;"><span style="color: blue;">&nbsp;&#9679;</span>ភេសជ្ជៈ : '.(count($tdrinkRequest)-1).'មុខ</p>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="col-lg-6 col-md-12 col-sm-12 col-12">
<div class="card card-accent-primary mb-3 dashboardbk" style="max-width: 30rem;">
<div class="card-header" style="background-image: linear-gradient(to right, #6190E8 , #A7BFE8);">
<h6 style="text-align: center; margin-bottom: 0px;">យល់ព្រម</h6></div>
<div class="card-body text-primary" style="background-color: #c7efe2">
<div class="row">
<a href="admin-food.php">
    <div class="col-lg-8 col-md-8 col-sm-12 col-12 text-center" style="padding-left: 30px;">
        <div class="res-circle" style="background-image: linear-gradient(to right,green , #11998e)" >
            <div class="circle-txt">'.(count($tApprove)-1).'មុខ</div>
            <div class="circle-txt2">'. number_format(((count($tApprove)-1)*100)/$tAll,2).'%</div>
        </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-12" style="margin-top: 30px;">
    <p style="font-size: 15px;"><span style="color: blue;">&nbsp;&#9679;</span>ម្ហូប   : '.(count($tfoodApprove)-1).'មុខ</p>
        <p style="font-size: 15px;"><span style="color: blue;">&nbsp;&#9679;</span>បង្អែម : '.(count($tsweetApprove)-1).'មុខ</p>
        <p style="font-size: 15px;"><span style="color: blue;">&nbsp;&#9679;</span>ភេសជ្ជៈ : '.(count($tdrinkApprove)-1).'មុខ</p>
    </div>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="card card-accent-primary mb-3 dashboardbk" style="max-width: 30rem;">
                <div class="card-header" style="background-image: linear-gradient(to right, #6190E8 , #A7BFE8);">
                <h6 style="text-align: center; margin-bottom: 0px;">បដិសេធ</h6></div>
                <div class="card-body text-primary" style="background-color: #c7efe2">
                <div class="row">
                <a href="admin-request.php">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 text-center" style="padding-left: 30px;">
                        <div class="res-circle" style="background-image: linear-gradient(to right,red , #cc5333);" >
                            <div class="circle-txt">'.(count($tReject)-1).'មុខ</div>
                            <div class="circle-txt2">'. number_format(((count($tReject)-1)*100)/$tAll,2).'%</div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12" style="margin-top: 30px;">
                    <p style="font-size: 15px;"><span style="color: blue;">&nbsp;&#9679;</span>ម្ហូប   : '.(count($tfoodReject)-1).'មុខ</p>
                        <p style="font-size: 15px;"><span style="color: blue;">&nbsp;&#9679;</span>បង្អែម : '.(count($tsweetReject)-1).'មុខ</p>
                        <p style="font-size: 15px;"><span style="color: blue;">&nbsp;&#9679;</span>ភេសជ្ជៈ : '.(count($tdrinkReject)-1).'មុខ</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="card card-accent-primary mb-3 dashboardbk" style="max-width: 30rem;">
                <div class="card-header" style="background-image: linear-gradient(to right, #6190E8 , #A7BFE8);">
                <h6 style="text-align: center; margin-bottom: 0px;">អ្នកប្រើប្រាស់</h6></div>
                <div class="card-body text-primary" style="background-color: #c7efe2">
                <div class="row">
                <a href="user-info.php">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 text-center" style="padding-left: 30px;">
                        <div class="res-circle" style="background-image: linear-gradient(to right,#800080, #ffc0cb);" >
                            <div class="circle-txt">'.(count($tUser)-1).'នាក់</div>
                            <div class="circle-txt2">'. number_format(((count($tUser)-1)*100)/count($tUserAll),2).'%</div>
                        </div>
                        </a>
                    </div>
                    <div class="" style="margin-top: 30px;">
                        <p style="font-size: 15px;"><span style="color: blue;">&nbsp;&#9679;</span>Admin: '.(count($tAdmin)-1).'នាក់</p>
                        <p style="font-size: 15px;"><span style="color: blue;">&nbsp;&#9679;</span>Member: '.(count($tMember)-1).'នាក់</p>
                    </div>
                </div>
                </div>
            </div>
        </div>';
?>