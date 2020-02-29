<?php
    //Get Food Code From Food Page
    $foodCode = $_GET['food-id']; 

    //connect to database
    include '../php/connectToDb.php';
    $obj = new DB();
    $con = $obj->conDb();

    //Check User Role
    $sql = $con->query("SELECT * FROM `tblcheckrole` WHERE id = 1");    
    $roleSql = $sql->fetch_assoc();
    $role = $roleSql["Role"];
    $name = $roleSql["FirstName"];

    //Select Food Information
    $foodSql = $con->query("SELECT * FROM `tblfood` WHERE `FoodCode`='".$foodCode."'");    
    $food = $foodSql->fetch_assoc();
    $category = $food["Category"];
    $type = $food["FoodType"];
    $country = $food["Country"];

    if($type=='Sweet'){
      $type = "បង្អែម";
    }
    else if($type=='Cake'){
      $type = "នំ";
    }
    else if($type=='Water'){
      $type = "ទឹក";
    }
    else if($type=='NoWater'){
      $type = "គោក";
    }
    else if($type=='Shake'){
      $type = "ក្រឡុក";
    }
    else if($type=='Juice'){
      $type = "ច្របាច់";
    }
    else if($type=='Simple'){
      $type = "ធម្មតា";
    }
    else if($type=='Ice'){
      $type = "ត្រជាក់";
    }
    else if($type=='Hot'){
      $type = "ក្តៅ";
    }


    if($country=='Khmer'){
      $country = "ខ្មែរ";
    }
    else{
      $country = "បរទេស";
    }
    //Select Ingredient Info
    $igdSql = $con->query("SELECT * FROM `tblingredient` WHERE `FoodCode`='".$foodCode."'");
    
    //Select Recipe Info
    $recipeSql = $con->query("SELECT * FROM `tblrecipe` WHERE `FoodCode`='".$foodCode."'");

    //Select Note Info
    $noteSql = $con->query("SELECT * FROM `tblfoodnote` WHERE `FoodCode`='".$foodCode."'");
    $note = $noteSql->fetch_assoc();
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
    <link rel="stylesheet" href="../css/food-detail-style.css">
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
    li{
          font-family: "Khmer OS Battambang";
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
                    <a class="nav-link text-white display-none" href="login.php" id="navUser">អ្នកប្រើប្រាស់</a>
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

    <!-- Food-Detail-Body -->
      <div class="container fd">

        <div class="row">
              <div class="col-lg-7 col-md-8 col-sm-6 col-sm-12">
                  <div class="food-detail-photo">
                    <img src="../images/<?php echo $category."/".$food["FoodImage"] ?>" alt="" class="img-fluid img-thumbnail">
                  </div>
                  <div class="food-type" style="padding-top: 20px; padding-bottom: 20px;">
                      <p>ប្រភេទ:&nbsp;&nbsp;<?php echo $type ?></p>                      
                      <?php
                        if($food["Province"]!='' || $food["Province"]!=null){
                          echo '<p>ម្ហូប'. $country.':&nbsp;&nbsp;'.$food["Province"].'</p>';
                        }
                        else{
                          echo '<p>ម្ហូប'. $country.'</p>';
                        }
                        
                        if($food["VideoLink"]!='' || $food["VideoLink"]!= null){
                          echo '<p><a target="_blank" href="'.$food["VideoLink"].'">មើលរបៀបធ្វើតាមវីដេអូ</a></p>';
                        }
                      ?>                      
                  </div>
              </div>
              <div class="col-lg-5 col-md-4 col-sm-6 col-sm-12" style="padding-left: 50px;">
                <h2><?php echo $food["FoodName"] ?></h2>
                <br><br>
                  <h5>គ្រឿងផ្សំ</h5>
                  <ul class="cooking-gradient">
                    <?php
                        while($igd = $igdSql->fetch_assoc()) {
                            echo '<li> '.$igd["Ingredient"].' '.$igd["Qty"].' </li>';
                        }
                    ?>
                  </ul>
              </div>
          </div>

          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 cooking-method">
              <h5>របៀបធ្វើ</h5>
              <ol>
                  <?php
                      while($recipe = $recipeSql->fetch_assoc()) {
                        echo '<li> '.$recipe["Recipe"].'</li>';
                    }
                  ?>
              </ol>
              <h5>កំណត់សំគាល់ផ្សេងៗ</h5>
              <p><?php echo $note["Note"] ?></p>
            </div>
          </div>
      </div>  
      <!-- End-Food-Detail-Body -->

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

    
</body>
</html>
