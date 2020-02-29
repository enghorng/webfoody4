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

   //Select Food Information
   $foodSql = $con->query("SELECT * FROM `tblfood` WHERE UserCode = '".$usercode."' ORDER BY FoodDate DESC");    
    
   $foodSql1 = $con->query("SELECT * FROM `tblfood` WHERE UserCode = '".$usercode."' ORDER BY FoodDate DESC");   
   while($i = $foodSql1->fetch_assoc()){
     $total[] = $i["FoodName"];
   }  

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
  <link rel="stylesheet" href="../css/food-detail-style.css">
  <link rel="stylesheet" href="../css/add-food-style.css">
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
<script src="../js/add-food.js"></script>
<style>
  button {
    font-family: "Khmer OS Battambang";
    background-color: #FB8442;
  }

  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  .display-none {
    display: none;
  }

  select {
    background-color: #222;
    color: white;
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
                          $("#navLogout").css("display", "block");
                          $("#navUser").css("display", "block");
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

  <!-- Food-Body -->
  <div class="container">
    <div class="row menu-right">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div style="float: right; padding-right: 10px;"><a href="../html/list-food.php" class="text-success">
            <h6>បញ្ជីម្ហូប</h6>
          </a></div>
        <div style="float: right;"><a href="../html/add-food.html" class="text-primary">
            <h6>បន្ថែមម្ហូប</h6>
          </a></div>
      </div>
    </div>

    <div class="row food-large-title no-gutters">
      <div class="col-lg-3 col-md-3 col-sm-4 col-12">
        <select class="form-control" style="font-family: KhmerOSbattambang;" id="dropdown-category">
          <option value="category">ទាំងអស់</option>
          <option value="food">ម្ហូប</option>
          <option value="sweet">បង្អែម</option>
          <option value="drink">ភេសជ្ជ:</option>
        </select>        
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-12">
        <select class="form-control" style="font-family: KhmerOSbattambang;" id="dropdown-status">
          <option value="status">ទាំងអស់</option>
          <option value="wait">រងចាំការត្រួតពិនិត្យ<span style='color: green;'>&nbsp;&#9679;</span></option>
          <option value="approve">យល់ព្រម<span style='color: green;'>&nbsp;&#9679;</span></option>
          <option value="reject">បដិសេធ<span style='color: red;'>&nbsp;&#9679;</span></option>
        </select>
      </div>
      <script>
          $(document).ready(function () {
            var c, s, ca;
            $("#dropdown-category, #dropdown-status").change(function(){
              var category = $("#dropdown-category").val();
              var status = $("#dropdown-status").val();

                if(category=="food"){
                  c = 1;
                  ca = "ម្ហូប";
                }
                else if(category=="sweet"){
                  c = 2;
                  ca = "បង្អែម";
                }
                else if(category=="drink"){
                  c = 3;
                  ca = "ភេសជ្ជៈ";
                }
                else{
                  c = '';
                  ca = "ទាំងអស់";
                }

                if(status=="wait"){
                  s = 4;
                }
                else if(status=="approve"){
                  s = 5;
                }
                else if(status=="reject"){
                  s = 6;
                }
                else{
                  s = '';
                }               

                var all = c + '' + s;

                $("#listFood-title").text(ca);

                $.ajax({    //create an ajax request to display.php
                    type: "GET",
                    url: "../php/listFoodFilter.php",             
                    dataType: "html",  
                      //expect html to be returned  
                      data: {filter:''+all},         
                    success: function(data){                    
                        $("#viewFood1").html(data); 
                        // alert(data);
                    }
                });

                $.ajax({    //create an ajax request to display.php
                    type: "GET",
                    url: "../php/totalListFoodFilter.php",             
                    dataType: "html",  
                      data: {filter:''+all},         
                    success: function(data){                    
                        $("#totalFood").html(data); 
                    }
                });
            });
          });
        </script>
      <div class="col-lg-6 col-md-6 col-sm-4 col-12">
        <h4 class="text-lg-right text-sm-left" id="listFood-title">ទាំងអស់</h4>
      </div>
    </div>

    <!-- End Menu -->
    <div class="row" id="viewFood1">
      <?php
        if ($foodSql->num_rows > 0) {         
            while($food = $foodSql->fetch_assoc()) {
                if($count == 15) break;
                $count++;
                //Check Status
                if($food["Status"]==0){
                  $color = "red";
                }
                else if($food["Status"]==1){
                  $color = "green";
                }
                else if($food["Status"]==2){
                  $color = "blue";
                }

                echo '<div class="col-lg-4 col-md-6 col-sm-12 col-12 card foodcard">
                        <div class="food-div">
                        <a href="food-detail.php?food-id='.$food['FoodCode'].'">
                        <img class="card-img-top" src="../images/'.$food['Category'].'/'.$food['FoodImage'].'"></a>
                        </div>
                        <a href="food-detail.php?food-id='.$food['FoodCode'].'"><h6>'.$food['FoodName'].'</h6></a>
                        <span style="color: '.$color.';" class="text-right">&nbsp;&#9679;</span>
                      </div>';                                                     
            }
        }
      ?>
    </div>
    <!-- End-Food-All -->


    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12 total-food">
        <p id="totalFood">ចំនួនមុខម្ហូបសរុប៖
          <?php
              echo  $count.'/'.count($total);
          ?>
        </p>
      </div>
    </div>

    <div class="row" style="margin-top: 30px;">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <nav aria-label="Fodd Page navigation">
          <ul class="pagination justify-content-center pagination pagination-lg">
            <!-- <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                          <span class="sr-only">Previous</span>
                        </a>
                      </li> -->
            <?php
                        $page = count($total)/12;
                        $sol = count($total)%12;
                        if($sol>0){
                          $page ++;
                        }
                        if(floor($page)>1){
                          for($p=1; $p<floor($page)+1; $p++){
                            echo '<li class="page-item"><a class="page-link" href="#">'.$p.'</a></li>';
                          }  
                        }           
                      ?>
            <!-- <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                          <span class="sr-only">Next</span>
                        </a>
                      </li> -->
          </ul>
        </nav>
      </div>
    </div>
  </div>


  <!-- End-Food-Body -->

  <!-- Footer -->

  <div class="container-fluid" style="padding:30px; background-color: #043927;"">
        <div class=" row" style="padding-top: 20px; text-align: center;">
    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
      <img src="../images/foodlogo.png" alt="">
      <div class="text-white">QuickCook</div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
      <h5 class="text-white" style="margin-bottom: 30px;">ព័ត៌មានបន្ថែម</h5>
      <p class="text-white">អាស័យដ្ឋាន៖ ផ្ទះលេខ១៣, ផ្លូវ12A, សង្កាត់ដង្កោ, ខណ្ណដង្កោ, រាជធានីភ្នំពេញ, កម្ពុជា</p>
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