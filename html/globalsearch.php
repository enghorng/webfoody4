<?php
    $name = $_GET["s"];
    $n = "N'%".$name."%'";
    //connect to database
    include '../php/connectToDb.php';
    $obj = new DB();
    $con = $obj->conDb();

    $sql = $con->query("SELECT * FROM `tblcheckrole` WHERE id = 1");    
    $roleSql = $sql->fetch_assoc();
    $role = $roleSql["Role"];
    $name = $roleSql["FirstName"];
    $code = $roleSql["UserCode"];

    //Select Food Information
    $foodSql = $con->query("SELECT * FROM `vuserfood` WHERE Category = 'Food' and FoodName LIKE ".$n." ORDER BY FoodDate DESC");    
    //Select Sweet Information
    $sweetSql = $con->query("SELECT * FROM `vuserfood` WHERE Category = 'Sweet' and FoodName LIKE ".$n." ORDER BY FoodDate DESC");  
    //Select Food Information
    $drinkSql = $con->query("SELECT * FROM `vuserfood` WHERE Category = 'Drink' and FoodName LIKE ".$n." ORDER BY FoodDate DESC");  

    $count = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/aboutstyle.css">
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <!-- end link for media -->

  
</head>
<script src="../js/backToTop.js"></script>
<script src="../js/sidenav.js"></script>
<style>
    button{
          font-family: "Khmer OS Battambang";
          background-color: #FB8442;
      }
    .display-none{
      display: none;
    }
</style>

<body>
    <!-- Menu-bar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #043927;">
        <a class="navbar-brand" href="../index.php">
            <img src="../images/Icon/foodlogo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color: white">
            <span class="navbar-toggler-icon"></span>
          </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <!-- <li class="nav-item active">
              <a class="nav-link text-white" href="#">អាហារខ្មែរ<span class="sr-only">(current)</span></a>
            </li> -->

            <li class="nav-item dropdown ab">
                <a class=" text-white nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"​>
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
                              $("#dropdownAdd").css("display","block");
                              </script>';
                      }                              
                      if($role==2){
                          echo '<script type="text/javascript">
                              $("#dropdownAdd").css("display","block");
                              $("#dropdownAdmin").css("display","block");
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
                    <a class="nav-link text-white display-none" href="html/admin-edit-user.php?id=<?php echo $code ?>" id="navUser">អ្នកប្រើប្រាស់</a>
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
                              $("#navLogout").css("display","block");
                              $("#navUser").css("display","block");
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
                window.close();
                window.open("globalsearch.php?s="+txt, "_blank");
            });
        });
    </script>
        </div>
      </nav>
      <!-- End Menu -->

        <!-- card -->
        
        <div class="container" style="padding-left: 0; padding-right: 0;">
            <div class="row no-gutters">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="container" style="padding-left: 0; padding-right: 0;">

                        <!-- Food -->
                        <div class="card bg-light mb-3">
                            <div class="card-header">
                                <span>
                                    <h4>ម្ហូប</h4>
                                </span>
                                <a href='food.php'>
                                    <button class="btn btn-warning" type="button" style="float: right; background-color: #ffb733;">ច្រើនទៀត</button>
                                </a>
                                <!-- <button type="button" class="btn btn-primary btn-sm" style="float: right;">ច្រើនទៀត</button> -->
                            </div>
                            <div class="row">
                                <!-- left -->
                                <div class="col-lg-4 d-none d-lg-block left">
                                    <img src="../images/HomePage/food.png" alt="...">
                                </div>
                                <!-- end left -->

                                <!-- right -->
                                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                                    <div class="container">
                                        <div class="row">
                                            <?php
                                            if ($foodSql->num_rows > 0) {                               
                                                // Show the Last 6 Food Information
                                                while($food = $foodSql->fetch_assoc()) {
                                                    if($count == 6) break;
                                                    $count++;
                                                    echo "<div class='col-lg-4 col-md-6 col-sm-12 col-12 card foodcard' id='food'>
                                                        <div class='food-div'>
                                                            <a target='_blank'>
                                                                <img class='card-img-top' src='../images/Food/".$food['FoodImage']."'>
                                                            </a>
                                                            </div>
                                                            <h6> ".$food['FoodName']." </h6>
                                                            <a href='food-detail.php?food-id=".$food['FoodCode']."'>
                                                                <button type='button' class='btn btn-success btn-sm' name='".$food['FoodCode']."'>របៀបធ្វើ</button>
                                                            </a>    
                                                            <div class='media align-self-left'>
                                                            <img src='../images/User/".$food['UserImage']."' alt='John Doe' class='ml-3 mt-3 rounded-circle photouser' style='width:25px; height: 25px; margin-left: 10px;'>
                                                            <div class='align-self-center'>
                                                                <p class='mb-0' style='padding-top: 17px; font-size: 11px; color: gray;'>&nbsp; &nbsp; ".$food['FullName']."</p>
                                                            </div>
                                                            </div></div>";                                                     
                                                }
                                                $count = 0;
                                            }
                                            else{
                                                echo "<div class='col-lg-12 col-md-12 col-sm-12 col-12'>
                                                        <h1 style='text-align: center; margin-top: 40%; margin-bottom: 40%;'>មិនមាន</h1>
                                                        </div>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End food -->

                        <!-- sweet -->
                        <div class="card bg-light mb-3">
                            <div class="card-header">
                                <span style="font-family: Khmer OS Battambang;">
                                    <h4>បង្អែម</h4>
                                </span>
                                
                                <a href='sweet.php'>
                                    <button class="btn btn-warning" type="button" style="float: right; background-color: #ffb733;">ច្រើនទៀត</button>
                                </a></div>
                            <div class="row">
                                <!-- left -->
                                <div class="col-lg-4 d-none d-lg-block left">
                                    <img src="../images/HomePage/sweet.png" alt="...">
                                </div>
                                <!-- end left -->

                                <!-- right -->
                                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                                    <div class="container">
                                        <div class="row">
                                            <?php
                                                if ($sweetSql->num_rows > 0) {                               
                                                    // Show the Last 6 Sweet Information
                                                    while($sweet = $sweetSql->fetch_assoc()) {
                                                        if($count == 6) break;
                                                        $count ++;
                                                        echo "<div class='col-lg-4 col-md-6 col-sm-12 col-12 card foodcard' id='food'>
                                                            <div class='food-div'>
                                                                <a target='_blank'>
                                                                    <img class='card-img-top' src='../images/Sweet/".$sweet['FoodImage']."'>
                                                                </a>
                                                                </div>
                                                                <h6> ".$sweet['FoodName']." </h6>
                                                                <a href='food-detail.php?food-id=".$sweet['FoodCode']."'>
                                                                    <button type='button' class='btn btn-success btn-sm' name='".$sweet['FoodCode']."'>របៀបធ្វើ</button>
                                                                </a> 
                                                                <div class='media align-self-left'>
                                                                <img src='../images/User/".$sweet['UserImage']."' alt='John Doe' class='ml-3 mt-3 rounded-circle photouser' style='width:25px; height: 25px; margin-left: 10px;'>
                                                                <div class='align-self-center'>
                                                                    <p class='mb-0' style='padding-top: 17px; font-size: 11px; color: gray;'>&nbsp; &nbsp; ".$sweet['FullName']."</p>
                                                                </div>
                                                                </div></div>";                                                     
                                                    }
                                                    $count = 0;
                                                }
                                                else{
                                                    echo "<div class='col-lg-12 col-md-12 col-sm-12 col-12'>
                                                            <h1 style='text-align: center; margin-top: 40%; margin-bottom: 40%;'>មិនមាន</h1>
                                                            </div>";
                                                }
                                            ?>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end sweet -->


                        <!-- Drink -->
                        <div class="card bg-light mb-3">
                            <div class="card-header">
                                <span style="font-family: Khmer OS Battambang;">
                                    <h4>ភេសជ្ជ:</h4>
                                </span>
                                
                                <a href='drink.php'>
                                    <button class="btn btn-warning" type="button" style="float: right; background-color: #ffb733;">ច្រើនទៀត</button>
                                </a><!-- <button type="button" class="btn btn-primary btn-sm" style="float: right;">ច្រើនទៀត</button> -->
                            </div>
                            <div class="row">
                                <!-- left -->
                                <div class="col-lg-4 d-none d-lg-block left">
                                    <img src="../images/HomePage/drink.png" alt="...">
                                </div>
                                <!-- end left -->

                                <!-- right -->
                                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                                    <div class="container">
                                        <div class="row">
                                            <?php
                                                if ($drinkSql->num_rows > 0) {                               
                                                    // Show the Last 6 Drink Information
                                                    while($drink = $drinkSql->fetch_assoc()) {
                                                        if($count == 6) break;
                                                        $count ++;
                                                        echo "<div class='col-lg-4 col-md-6 col-sm-12 col-12 card foodcard' id='food'>
                                                            <div class='food-div'>
                                                                <a target='_blank'>
                                                                    <img class='card-img-top' src='../images/Drink/".$drink['FoodImage']."'>
                                                                </a>
                                                                </div>
                                                                <h6> ".$drink['FoodName']." </h6>                                                                
                                                                <a href='food-detail.php?food-id=".$drink['FoodCode']."'>
                                                                    <button type='button' class='btn btn-success btn-sm' name='".$drink['FoodCode']."'>របៀបធ្វើ</button>
                                                                </a> 
                                                                <div class='media align-self-left'>
                                                                <img src='../images/User/".$drink['UserImage']."' alt='John Doe' class='ml-3 mt-3 rounded-circle photouser' style='width:25px; height: 25px; margin-left: 10px;'>
                                                                <div class='align-self-center'>
                                                                    <p class='mb-0' style='padding-top: 17px; font-size: 11px; color: gray;'>&nbsp; &nbsp; ".$drink['FullName']."</p>
                                                                </div>
                                                                </div></div>";                                                     
                                                    }
                                                    $count = 0;
                                                }
                                                else{
                                                    echo "<div class='col-lg-12 col-md-12 col-sm-12 col-12'>
                                                            <h1 style='text-align: center; margin-top: 40%; margin-bottom: 40%;'>មិនមាន</h1>
                                                            </div>";
                                                }
                                            ?>          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end drink -->

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end card -->

    <!-- Footer -->

    <div class="container-fluid" style="padding:30px; background-color: #043927;">
        <div class="row " style="padding-top: 20px; text-align: center; ">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 ">
                <img src="./images/Icon/foodlogo.png " alt=" ">
                <div class="text-white ">QuickCook</div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 ">
                <h5 class="text-white " style="margin-bottom: 30px; ">ព័ត៌មានបន្ថែម</h5>
                <p class="text-white ">អាស័យដ្ឋាន៖  ផ្ទះលេខ១៣, ផ្លូវ12A, សង្កាត់ដង្កោ, ខណ្ណដង្កោ, រាជធានីភ្នំពេញ, កម្ពុជា</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 ">
                <h5 class="text-white " style="margin-bottom: 30px; ">ភ្ជាប់ទំនាក់ទំនងជាមួយពួកយើង</h5>
                <div class="social ">
                    <a href="# "><i class="fa fa-facebook "></i></a>
                <a href="# "><i class="fa fa-instagram "></i></a>
                <a href="# "><i class="fa fa-youtube "></i></a>
                <a href="# "><i class="fa fa-linkedin "></i></a>
                </div>
                
            </div>
        </div>
    </div>

    <!-- End Footer -->
    
    <!-- Bottom-To-Top -->
    <a id="back-to-top " href="# " class="btn btn-lg back-to-top bg-info " role="button ">
        <i class="fa fa-chevron-up " style="color: whitesmoke; "></i>
    </a>
    <!-- End bottom to top -->   
    <script>
        $(document).ready(function () {
            $("#btnSearch").click(function(){
                var txt = $("#txtSearch").val();
                window.open("php/globalsearch.php?s="+txt, "_blank");
            });
        });
    </script>
</body>
</html>