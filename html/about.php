<?php 
    //connect to database
    include '../php/connectToDb.php';
    $obj = new DB();
    $con = $obj->conDb();

    $sql = $con->query("SELECT * FROM `tblcheckrole` WHERE id = 1");    
    $roleSql = $sql->fetch_assoc();
    $role = $roleSql["Role"];
    $name = $roleSql["FirstName"];
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
  <style>
      .display-none{
        display: none;
    }
 </style>
</head>
<script src="../js/backToTop.js"></script>
<style>
    button{
          font-family: "Khmer OS Battambang";
          background-color: #FB8442;
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
                    <a class="dropdown-item" href="#">អំពីពួកយើង</a>
                    <a class="dropdown-item" href="#">ទំនាក់ទំនង</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="food.php">ម្ហូប</a>
                  <a class="dropdown-item" href="sweet.php">បង្អែម</a>
                  <a class="dropdown-item" href="drink.php">ភេសជ្ជ:</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item display-none" href="add-food.php" id="dropdownAdd">បន្ថែមមុខម្ហូប</a>
                        <a class="dropdown-item display-none" href="admin.php" id="dropdownAdmin">រដ្ឋបាល</a>
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
                    <a class="nav-link text-white display-none" href="#" id="navUser">អ្នកប្រើប្រាស់</a>
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
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2 searchme" type="search" placeholder="ឈ្មោះម្ហូបស្វែងរក" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0 text-white" type="submit">ស្វែងរក</button>
          </form>
        </div>
      </nav>
      <!-- End Menu -->


      <!-- about body -->

      <div class="container big">
          <div class="row foodbk">
              <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                  <img src="../images/About/aboutBackground.jpg" alt="Teacher web image">
              </div>
              <div class="col-lg-5 col-md-5 col-sm-12 col-12" style="padding-top: 120px;">
                <h2 class="text-center">ចង់ដឹងពីរបៀបចម្អិនម្ហូបមែនទេ?​</h2>
                <p style="padding:30px; line-height: 28px; font-size: 14px; color: blue;">
                    វេបសាយ QuickCook អាចជួយលោកអ្នកបាន។
                    ម្ហូបឆ្ងាញ់ មិនមែនមានន័យថាត្រូវពិបាកចម្អិននោះទេ 
                    សំខាន់គឹដឹងពីគឿងផ្សំ និងរបៀបធ្វើទៅតាមម្ហូបនីមួយៗ។
                    QuickCook នឹងជួយអោយការចម្អិនអាហាររបស់អ្នកកាន់តែងាយស្រួល រហ័ស
                    ព្រមទាំងបង្កើនរសជាតិអាហារឱ្យកាន់តែឆ្ងាញ់ និងផ្តល់សុខភាពល្អជូនគ្រួសារលោកអ្នក។ 
                </p>
              </div>
          </div>

        <div class="row" style="margin-top: 100px;">
            <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                <h2 class="text-center">សេចក្តីថ្លែងអំណរគុណ</h2>
                <p style="padding:30px; line-height: 28px; font-size: 14px;">ក្រុមយើងខ្ញុំសូមធ្វើសេចក្តីថ្លែងអំណរគុណយ៉ាងខ្លាំងចំពោះលោកសាស្ត្រាចារ្យ ជីម ប៊ុនធឿន ដែលបានចំណាយ
                    ពេលវេលាដ៏មានតម្លៃក្នុងការបង្រៀនពួកយើង និងជាអ្នកផ្តួចផ្តើមគំនិតបង្កើតគេហទំព័រមួយនេះអោយលេចចេញជា
                    រូបរាងឡើង។
                </p>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center">
                <img src="../images/About/teacher.png" alt="Teacher web image">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-12 text-center">
                <!-- <div class="view overlay zoom"> -->
                    <img src="../images/About/rupp.png">
                <!-- </div> -->
            </div>
        </div>

       

        <div class="row"​​ style="margin-top: 100px;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <h2 class="text-center">ពួកយើងជានរណា?</h2>
                <p class="text-center" style="line-height: 28px; font-size: 14px;">ពួកយើងជាក្រុមនិស្សិតអាហារូបករណ៌មកពីសាកលវិទ្យាល័យភូមិន្ទភ្នំពេញ ឆ្នាំទី៤​ ដែលមានសមានជិកទាំងអស់៤នាក់
                និងកំពុងសិក្សាជំនាញព័ត៌មានវិទ្យា។</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 profileabout">
                <img src="../images/User/Enghorng.png" alt="" class="image rounded">
                    <div class="overlay">
                        <div class="text"><b>លាន​ អេងហ៊ង​<br>Team Leader<br>Backend Developer</b> </div>
                    </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 profileabout">
                <img src="../images/User/Pheary.png" alt="" class="image rounded">
                    <div class="overlay">
                        <div class="text"><b>​​រិន​ សុភារី<br>Graphic Designer<br>Frontend Developer</b> </div>
                    </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 profileabout">
                <img src="../images/User/sreyleap.png" alt="" class="image rounded">
                    <div class="overlay">
                        <div class="text"><b>​​រួន ស្រីលាភ<br>Member<br>Content Writer</b> </div>
                    </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 profileabout">
                <img src="../images/User/senghak.png" alt="" class="image rounded">
                    <div class="overlay">
                        <div class="text"><b>​​ឃួន សេងហាក់<br>Member<br>Presenter</b> </div>
                    </div>
            </div>
        </div>

    </div>

<!-- end about  -->




    <!-- Footer -->

    <div class="container-fluid" style="padding:30px; background-color: #043927;"">
        <div class="row" style="padding-top: 20px; text-align: center;">
            <div class="col-lg-4 col-lg-4 col-md-6 col-sm-6 col-12 col-sm-4 col-4">
                <img src="../images/Icon/foodlogo.png" alt="">
                <div class="text-white">QuickCook</div>
            </div>
            <div class="col-lg-4 col-lg-4 col-md-6 col-sm-6 col-12 col-sm-4 col-4">
                <h5 class="text-white" style="margin-bottom: 30px;">ព័ត៌មានបន្ថែម</h5>
                <p class="text-white">អាស័យដ្ឋាន៖  ផ្ទះលេខ១៣, ផ្លូវ12A, សង្កាត់ដង្កោ, ខណ្ណដង្កោ, រាជធានីភ្នំពេញ, កម្ពុជា</p>
            </div>
            <div class="col-lg-4 col-lg-4 col-md-6 col-sm-6 col-12 col-sm-4 col-4">
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

    
</body>
</html>