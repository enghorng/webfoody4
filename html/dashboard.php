<?php
    //connect to database
    include '../php/connectToDb.php';
    $obj = new DB();
    $con = $obj->conDb();
    $con->query('SET character_set_results=utf8');

    //Disply User Name
    $sql = $con->query("SELECT * FROM `tblcheckrole` WHERE id = 1");    
    $roleSql = $sql->fetch_assoc();
    $role = $roleSql["Role"];
    $name = $roleSql["FirstName"];
    $usercode = $roleSql["UserCode"];  

    //Select User Account Information
    $tUser[] = array(); $tUserAll[] = array(); $tAdmin[] = array(); $tMember[] = array();
    $allSql = $con->query("SELECT * FROM `tbluser` WHERE Status=1");
    while($all = $allSql->fetch_assoc()){
        $tUserAll[] = $all["id"];
    } 
    $userSql = $con->query("SELECT * FROM `tbluser` WHERE Status=1 AND (MONTH(RegisterDate) = 2 or MONTH(RegisterDate) = 3)");
    while($user = $userSql->fetch_assoc()){
        $tUser[] = $user["id"];
    } 
    //Admin and Member Role
    $adminSql = $con->query("SELECT * FROM `tbluser` WHERE Status=1 AND Role=1 AND (MONTH(RegisterDate) = 2 or MONTH(RegisterDate) = 3)");
    while($admin = $adminSql->fetch_assoc()){
        $tAdmin[] = $admin["id"];
    }
    $memberSql = $con->query("SELECT * FROM `tbluser` WHERE Status=1 AND Role=2 AND (MONTH(RegisterDate) = 2 or MONTH(RegisterDate) = 3)");
    while($member = $memberSql->fetch_assoc()){
        $tMember[] = $member["id"];
    }
    //Select Food Information
    $tAll = 0; 
    $tApprove[] = array(); $tRequest[] = array(); $tReject[] = array();
    $approveSql = $con->query("SELECT * FROM `tblfood` WHERE Status=1 AND (MONTH(FoodDate) = 2 or MONTH(FoodDate) = 3)");  
    while($approve = $approveSql->fetch_assoc()){
        $tApprove[] = $approve["FoodName"];
    } 
    $requestSql = $con->query("SELECT * FROM `tblfood` WHERE Status=2 AND (MONTH(FoodDate) = 2 or MONTH(FoodDate) = 3)");  
    while($request = $requestSql->fetch_assoc()){
        $tRequest[] = $request["FoodName"];
    } 
    $rejectSql = $con->query("SELECT * FROM `tblfood` WHERE Status=3 AND (MONTH(FoodDate) = 2 or MONTH(FoodDate) = 3)");  
    while($reject = $rejectSql->fetch_assoc()){
        $tReject[] = $reject["FoodName"];
    } 
    $tAll = count($tApprove)+count($tRequest)+count($tReject);
    //Approve
    $tfoodApprove[] = array(); $tsweetApprove[] = array(); $tdrinkApprove[] = array();
    $foodApproveSql = $con->query("SELECT * FROM `tblfood` WHERE Category='Food' AND Status=1 AND (MONTH(FoodDate) = 2 or MONTH(FoodDate) = 3)");  
    while($foodApprove = $foodApproveSql->fetch_assoc()){
        $tfoodApprove[] = $foodApprove["FoodName"];
    }
    $sweetApproveSql = $con->query("SELECT * FROM `tblfood` WHERE Category='Sweet' AND Status=1 AND (MONTH(FoodDate) = 2 or MONTH(FoodDate) = 3)");  
    while($sweetApprove = $sweetApproveSql->fetch_assoc()){
        $tsweetApprove[] = $sweetApprove["FoodName"];
    } 
    $drinkApproveSql = $con->query("SELECT * FROM `tblfood` WHERE Category='Drink' AND Status=1 AND (MONTH(FoodDate) = 2 or MONTH(FoodDate) = 3)");  
    while($drinkApprove = $drinkApproveSql->fetch_assoc()){
        $tdrinkApprove[] = $drinkApprove["FoodName"];
    }
    //Request
    $tfoodRequest[] = array(); $tsweetRequest[] = array(); $tdrinkRequest[] = array();
    $foodRequestSql = $con->query("SELECT * FROM `tblfood` WHERE Category='Food' AND Status=2 AND (MONTH(FoodDate) = 2 or MONTH(FoodDate) = 3)");  
    while($foodRequest = $foodRequestSql->fetch_assoc()){
        $tfoodRequest[] = $foodRequest["FoodName"];
    }
    $sweetRequestSql = $con->query("SELECT * FROM `tblfood` WHERE Category='Sweet' AND Status=2 AND (MONTH(FoodDate) = 2 or MONTH(FoodDate) = 3)");  
    while($sweetRequest = $sweetRequestSql->fetch_assoc()){
        $tsweetRequest[] = $sweetRequest["FoodName"];
    } 
    $drinkRequestSql = $con->query("SELECT * FROM `tblfood` WHERE Category='Drink' AND Status=2 AND (MONTH(FoodDate) = 2 or MONTH(FoodDate) = 3)");  
    while($drinkRequest = $drinkRequestSql->fetch_assoc()){
        $tdrinkRequest[] = $drinkRequest["FoodName"];
    }
    //Reject
    $tfoodReject[] = array(); $tsweetReject[] = array(); $tdrinkReject[] = array();
    $foodRejectSql = $con->query("SELECT * FROM `tblfood` WHERE Category='Food' AND Status=3 AND (MONTH(FoodDate) = 2 or MONTH(FoodDate) = 3)");  
    while($foodReject = $foodRejectSql->fetch_assoc()){
        $tfoodReject[] = $foodReject["FoodName"];
    }
    $sweetRejectSql = $con->query("SELECT * FROM `tblfood` WHERE Category='Sweet' AND Status=3 AND (MONTH(FoodDate) = 2 or MONTH(FoodDate) = 3)");  
    while($sweetReject = $sweetRejectSql->fetch_assoc()){
        $tsweetReject[] = $sweetReject["FoodName"];
    } 
    $drinkRejectSql = $con->query("SELECT * FROM `tblfood` WHERE Category='Drink' AND Status=3 AND (MONTH(FoodDate) = 2 or MONTH(FoodDate) = 3)");  
    while($drinkReject = $drinkRejectSql->fetch_assoc()){
        $tdrinkRequest[] = $drinkReject["FoodName"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/dashboard-style.css">
    <link rel="stylesheet" href="../css/aboutstyle.css">
    <link rel="stylesheet" href="../css/create-account-style.css">
    <link rel="stylesheet" href="../css/index_style.css">
    <link rel="stylesheet" href="../css/backToTop.css">
    <link rel="stylesheet" href="../css/foodstyle.css">
    <link rel="stylesheet" href="../css/sidenav.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- link for media -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- end link for media -->

  
</head>
<script src="../js/backToTop.js"></script>
<script src="../js/sidenav.js"></script>
<style>
    button{
          font-family: "Khmer OS Battambang";
          background-color: #FB8442;
      }
      .display-none {
    display: none;
  }
</style>
<body>
    <!-- Menu-bar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #043927;">
    <a class="navbar-brand" href="../index.php">
      <img src="../images/Icon/foodlogo.png" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
      style="background-color: white">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

        <!-- <li class="nav-item active">
              <a class="nav-link text-white" href="#">អាហារខ្មែរ<span class="sr-only">(current)</span></a>
            </li> -->

        <li class="nav-item dropdown ab">
          <a class=" text-white nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ​>
            មឺនុយ
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../index.php">ទំព័រដើម</a>
            <a class="dropdown-item" href="about.php">អំពីពួកយើង</a>
            <a class="dropdown-item" href="#">ទំនាក់ទំនង</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="food.php">ម្ហូប</a>
            <a class="dropdown-item" href="sweet.php">បង្អែម</a>
            <a class="dropdown-item" href="drink.php">ភេសជ្ជ:</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item display-none" href="add-food.php" id="dropdownAdd">បន្ថែមមុខម្ហូប</a>
            <a class="dropdown-item display-none" href="dashboard.php" id="dropdownAdmin">រដ្ឋបាល</a>
            <?php  
                      if($role==0){
                          echo '<script type="text/javascript">
                              $("#dropdownAdd").css("display","none");
                              $("#dropdownAdmin").css("display","none");
                              </script>';                                
                      }                            
                      if($role==1){
                          echo '<script type="text/javascript">
                            $("#dropdownAdd").css("display", "block");
                          </script>';
                      }                              
                      if($role==2){
                          echo '<script type="text/javascript">
                            $("#dropdownAdd").css("display", "block");
                            $("#dropdownAdmin").css("display", "block");
                          </script>';
                      }
                  ?>
          </div>
        </li>
        <li class="nav-item ab">
          <a class="nav-link text-white display-none" href="login.php" id="navLogin">ចូលប្រើ</a>
        </li>
        <li class="nav-item ab">
          <a class="nav-link text-white display-none" href="register.php" id="navRegister">ចុះឈ្មោះ</a>
        </li>
        <li class="nav-item ab">
          <a class="nav-link text-white display-none" href="login.php" id="navLogout">ចាកចេញ</a>
        </li>
        <li class="nav-item ab">
          <a class="nav-link text-white display-none" href="html/admin-edit-user.php?id=<?php echo $usercode ?>" id="navUser">អ្នកប្រើប្រាស់</a>
        </li>
        <?php
                    if($role==0){
                        echo '<script type="text/javascript">
                              $("#navLogin").css("display","block");
                              $("#navRegister").css("display","block");
                              </script>';
                    }   
                    else{
                        echo '<script type="text/javascript">
                          $("#navLogout").css("display", "block");
                          $("#navUser").css("display", "block");
                          $("#navUser").text("'.$name.'");
                        </script>';
                    }           
                ?>
      </ul>
      <div class="topnav-centered">
                <form class="form-inline">
                    <input class="form-control mr-sm-2 searchme" type="search" id="txtSearch" placeholder="ឈ្មោះម្ហូបស្វែងរក" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0 text-white" id="btnSearch" type="submit">ស្វែងរក</button>
                </form>
            </div>
            <script>
        $(document).ready(function () {
            $("#btnSearch").click(function(){
                var txt = $("#txtSearch").val();
                window.open("globalsearch.php?s="+txt, "_blank");
            });
        });
    </script>
        </div>
  </nav>
      <!-- End Menu -->

    <!-- Food-Body -->
    <div class="container">
      <div class="row">
        <!-- col1 -->
        <div class="col-lg-2 col-md-4 col-sm-5 col-5 collapse show d-md-flex bg-light pt-2 pl-0 min-vh-100" id="sidebar" style="border-right:2px solid lightgray">
            <ul class="nav flex-column flex-nowrap">
              <li class="nav-item"><a class="nav-link text-truncate​ text-dark" href="#"><h3 style="padding-top: 30px; padding-bottom: 20px;">រដ្ឋបាល</h3></a></li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#submenu1" data-target="#submenu1" data-toggle="collapse">អ្នកប្រើប្រាស់&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-down"></i></a>
                        <div class="collapse" id="submenu1" aria-expanded="false">
                            <ul class="flex-column pl-2 nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="admin.php" ><span>បង្កើតគណនីយថ្មី</span></a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li class="nav-item">
                                    <a class="nav-link" href="user-info.php" ><span>ព័ត៌មានអ្នកប្រើប្រាស់</span></a>
                                </li>
                            </ul>
                        </div>
                </li>
                <div class="dropdown-divider"></div>
                <li class="nav-item"><a class="nav-link text-truncate" href="admin-food.php">ម្ហូប</a></li>
                <div class="dropdown-divider"></div>
                <li class="nav-item"><a class="nav-link text-truncate" href="admin-request.php">ការស្នើសុំ</a></li>
                <div class="dropdown-divider"></div>
                <li class="nav-item"><a class="nav-link text-truncate" href="dashboard.php">Dashboard</a></li>
                <div class="dropdown-divider"></div>
            </ul>
        </div>
        <!-- End-Col-1 -->
        
        <!-- col2 -->
        <div class="col-lg-10 col-md-8 col-sm-7 col-7" style="padding-top: 40px;">
            <div class="row" style="margin-bottom: 20px; margin-top: 10px;">
                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <h4>Dashboard</h4>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-3"></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                <select class="form-control" style="font-family: KhmerOSbattambang;" id="dropdown-date">
                    <option value="month">ពីរខែនេះ</option>
                    <option value="week">សប្តាហ៌នេះ</option>
                    <option value="day">ថ្ងៃនេះ</option>
                </select>
                </div>
            </div>
            <div class="row" id="Dashboard1">

                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="card card-accent-primary mb-3 dashboardbk" style="max-width: 30rem;">
                        <div class="card-header" style="background-image: linear-gradient(to right, #6190E8 , #A7BFE8);">
                        <h6 style="text-align: center; margin-bottom: 0px;">រងចាំ</h6></div>
                        <div class="card-body text-primary" style="background-color: #c7efe2">
                        <div class="row">
                        <a href="admin-request.php">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-12 text-center" style="padding-left: 30px;">
                                
                                <div class="res-circle">
                               
                                    <div class="circle-txt"><?php echo count($tRequest)-1 ?>មុខ</div>
                                    <div class="circle-txt2"><?php echo number_format(((count($tRequest)-1)*100)/$tAll,2) ?>%</div>
                                   
                                </div>
                                </a>
                            </div>
                             
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12" style="margin-top: 30px;">
                                <p style="font-size: 15px;"><span style='color: blue;'>&nbsp;&#9679;</span>ម្ហូប   : <?php echo count($tfoodRequest)-1 ?>មុខ</p>
                                <p style="font-size: 15px;"><span style='color: blue;'>&nbsp;&#9679;</span>បង្អែម : <?php echo count($tsweetRequest)-1 ?>មុខ</p>
                                <p style="font-size: 15px;"><span style='color: blue;'>&nbsp;&#9679;</span>ភេសជ្ជៈ : <?php echo count($tdrinkRequest)-1 ?>មុខ</p>
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
                                <div class="res-circle" style="background-image: linear-gradient(to right,green , #11998e);" >
                                    <div class="circle-txt"><?php echo count($tApprove)-1 ?>មុខ</div>
                                    <div class="circle-txt2"><?php echo number_format(((count($tApprove)-1)*100)/$tAll,2) ?>%</div>
                                  </div>
                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12" style="margin-top: 30px;">
                            <p style="font-size: 15px;"><span style='color: blue;'>&nbsp;&#9679;</span>ម្ហូប   : <?php echo count($tfoodApprove)-1 ?>មុខ</p>
                                <p style="font-size: 15px;"><span style='color: blue;'>&nbsp;&#9679;</span>បង្អែម : <?php echo count($tsweetApprove)-1 ?>មុខ</p>
                                <p style="font-size: 15px;"><span style='color: blue;'>&nbsp;&#9679;</span>ភេសជ្ជៈ : <?php echo count($tdrinkApprove)-1 ?>មុខ</p>
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
                        <a href="admin-food.php">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12 text-center" style="padding-left: 30px;">
                                <div class="res-circle" style="background-image: linear-gradient(to right,red , #cc5333);" >
                                    <div class="circle-txt"><?php echo count($tReject)-1 ?>មុខ</div>
                                    <div class="circle-txt2"><?php echo number_format(((count($tReject)-1)*100)/$tAll,2) ?>%</div>
                                  </div>
                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12" style="margin-top: 30px;">
                            <p style="font-size: 15px;"><span style='color: blue;'>&nbsp;&#9679;</span>ម្ហូប   : <?php echo count($tfoodReject)-1 ?>មុខ</p>
                                <p style="font-size: 15px;"><span style='color: blue;'>&nbsp;&#9679;</span>បង្អែម : <?php echo count($tsweetReject)-1 ?>មុខ</p>
                                <p style="font-size: 15px;"><span style='color: blue;'>&nbsp;&#9679;</span>ភេសជ្ជៈ : <?php echo count($tdrinkReject)-1 ?>មុខ</p>
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
                                    <div class="circle-txt"><?php echo count($tUser)-1; ?>នាក់</div>
                                    <div class="circle-txt2"><?php echo number_format(((count($tUser)-1)*100)/count($tUserAll),2); ?>%</div>
                                  </div>
                </a>
                            </div>
                            <div class="" style="margin-top: 30px;">
                                <p style="font-size: 15px;"><span style='color: blue;'>&nbsp;&#9679;</span>Admin: <?php echo count($tAdmin)-1; ?>នាក់</p>
                                <p style="font-size: 15px;"><span style='color: blue;'>&nbsp;&#9679;</span>Member: <?php echo count($tMember)-1; ?>នាក់</p>
                            </div>
                        </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        <!-- End-Col-2 -->
    </div>

    </div>
      <!-- End-Food-Body -->

    <!-- Footer -->

    <div class="container-fluid" style="padding:30px; background-color: #043927;"">
        <div class="row" style="padding-top: 20px; text-align: center;">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <img src="../images/Icon/foodlogo.png" alt="">
                <div class="text-white">QuickCook</div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <h5 class="text-white" style="margin-bottom: 30px;">ព័ត៌មានបន្ថែម</h5>
                <p class="text-white">អាស័យដ្ឋាន៖  ផ្ទះលេខ១៣, ផ្លូវ12A, សង្កាត់ដង្កោ, ខណ្ណដង្កោ, រាជធានីភ្នំពេញ, កម្ពុជា</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <h5 class="text-white" style="margin-bottom: 30px;">ភ្ជាប់ទំនាក់ទំនងជាមួយពួកយើង</h5>
                <div class="social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                </div>
                
            </div>
        </div>
    </div>

    <!-- End Footer -->
    
    <!-- Bottom-To-Top -->
    <a id="back-to-top" href="#" class="btn btn-lg back-to-top bg-info" role="button">
        <i class="fa fa-chevron-up" style="color: whitesmoke;"></i>
    </a>
    <!-- End bottom to top -->
    <script>
          $(document).ready(function () {
            $("#dropdown-date").change(function(){
                var d = $("#dropdown-date").val();
                $.ajax({    //create an ajax request to display.php
                    type: "GET",
                    url: "../php/dashboardFilter.php",             
                    dataType: "html",   
                    data: {filter:''+d},         
                    success: function(data){                    
                        $("#Dashboard1").html(data);
                    }
                });
            });
        });
    </script>
        
    
</body>
</html>