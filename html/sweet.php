<?php
    //connect to database
    include '../php/connectToDb.php';
    $obj = new DB();
    $con = $obj->conDb();

    $sql = $con->query("SELECT * FROM `tblcheckrole` WHERE id = 1");    
    $roleSql = $sql->fetch_assoc();
    $role = $roleSql["Role"];
    $name = $roleSql["FirstName"];

    //Select sweet Information
    $sweetSql = $con->query("SELECT * FROM `vuserfood` WHERE Category = 'Sweet' ORDER BY FoodDate DESC");    
    
    $sweetSql1 = $con->query("SELECT * FROM `vuserfood` WHERE Category = 'Sweet' ORDER BY FoodDate DESC");    
    while($i = $sweetSql1->fetch_assoc()){
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
                  <a class="dropdown-item display-none" href="#" id="dropdownAdd">បន្ថែមមុខម្ហូប</a>
                  <a class="dropdown-item display-none" href="#" id="dropdownAdmin">រដ្ឋបាល</a>
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

    <!-- sweet-Body -->
      <div class="container ok">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <div class="container" style="margin-top: 70px; margin-left: 30px;">
                      <p class="text-white">ជ្រើសរើសប្រភេទបង្អែម</p>
                      <form action="" id="filterSweet">
                          <div class="checkbox">
                              <label><input type="checkbox" value="" checked  id="chAll">&nbsp;&nbsp;ទាំងអស់</label>
                          </div>
                          <div class="checkbox">
                              <label><input type="checkbox" value="" id="chKhmer">&nbsp;&nbsp;ខ្មែរ</label>
                          </div>
                          <div class="checkbox">
                              <label><input type="checkbox" value="" id="chNotKhmer">&nbsp;&nbsp;បរទេស</label>
                          </div>
                          <div class="checkbox">
                              <label><input type="checkbox" value="" id="chNoWater">&nbsp;&nbsp;បង្អែម</label>
                          </div>
                          <div class="checkbox">
                              <label><input type="checkbox" value="" id="chWater">&nbsp;&nbsp;នំ</label>
                          </div>
                          <div class="button">
                              <button type="button" class="btn btn-success btn-sm" id="btnApply" onClick="filter()">&nbsp;&nbsp;ដាក់ស្នើ</button>
                          </div> 
                          
                      </form>
                      <script>
                        var country, type;
                        $(document).ready(function () {
                          $("#btnApply").click(function(){false
                            if($("#chKhmer").prop("checked")==false && $("#chNotKhmer").prop("checked")==false &&
                              $("#chWater").prop("checked")==false && $("#chNoWater").prop("checked")==false){                                  
                                  $("#chAll").prop("checked",true);
                            }
                            
                            if($("#chKhmer").prop("checked")==true){
                              country = 1;
                            }
                            else if($("#chNotKhmer").prop("checked")==true){
                              country = 2;
                            }
                            else{
                              country = '';
                            }

                            if($("#chWater").prop("checked")==true){
                              type = 3;
                            }
                            else if($("#chNoWater").prop("checked")==true){
                              type = 4;
                            }
                            else{
                              type = '';
                            }
                            
                            var all = country +''+ type;


                            $.ajax({    //create an ajax request to display.php
                                type: "GET",
                                url: "../php/sweetFilter.php",             
                                dataType: "html",  
                                 //expect html to be returned  
                                 data: {filter:''+all},         
                                success: function(data){                    
                                    $("#viewSweet").html(data); 
                                    // alert(data);
                                }

                            });

                            $.ajax({    //create an ajax request to display.php
                                type: "GET",
                                url: "../php/totalSweetFilter.php",             
                                dataType: "html",  
                                 //expect html to be returned  
                                 data: {filter:''+all},         
                                success: function(data){                    
                                    $("#totalSweet").html(data); 
                                    // alert(data);
                                }

                            });

                          });

                          $("#chAll").click(function(){
                            $("#chKhmer").prop("checked",false);
                            $("#chNotKhmer").prop("checked",false);
                            $("#chWater").prop("checked",false);
                            $("#chNoWater").prop("checked",false);
                          });

                          $("#chKhmer").click(function(){
                            $("#chAll").prop("checked",false);
                            $("#chNotKhmer").prop("checked",false);
                          });
                          
                          $("#chNotKhmer").click(function(){
                            $("#chAll").prop("checked",false);
                            $("#chKhmer").prop("checked",false);
                          });

                          $("#chWater").click(function(){
                            $("#chAll").prop("checked",false);
                            $("#chNoWater").prop("checked",false);
                          });

                          $("#chNoWater").click(function(){
                            $("#chAll").prop("checked",false);
                            $("#chWater").prop("checked",false);
                          });

                        });
                      </script>
                  </div> 
                  </div>
                  <span style="font-size:30px;cursor:pointer; font-size: 30;" onclick="openNav()">&#9776;</span>
            </div>
        </div>
        <!-- side-nave -->
        <div class="row food-large-title">
           <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="text-align: center;">
               <h2>បង្អែម</h2>
           </div>
       </div> 
        <!-- end-side-nav -->

        <!-- sweet-all-here -->        
        <div class="row" id="viewSweet">   
                
            <?php
              if ($sweetSql->num_rows > 0) {         
                  while($sweet = $sweetSql->fetch_assoc()) {
                      if($count == 12) break;
                      $count++;
                      echo '<div class="col-lg-4 col-md-6 col-sm-12 col-12 card foodcard">
                              <div class="food-div">
                                  <a href="food-detail.php?food-id='.$sweet['FoodCode'].'">
                                  <img class="card-img-top" src="../images/Sweet/'.$sweet['FoodImage'].'"></a>
                              </div>
                              <a href="food-detail.php?food-id='.$sweet['FoodCode'].'"><h6>'.$sweet['FoodName'].'</h6></a>
                              <div class="media align-self-left">
                                  <img src="../images/User/'.$sweet['UserImage'].'" alt="John Doe" class="ml-3 mt-3 rounded-circle photouser" style="width:25px; height: 25px; margin-left: 10px;">
                                  <div class="align-self-center">
                                    <p class="mb-0" style="padding-top: 17px; font-size: 11px; color: gray;">&nbsp; &nbsp; '.$sweet['FullName'].'</p>
                                  </div>
                              </div>
                          </div>';                                                     
                  }
              }
              ?>
          </div>
        <!-- End-Sweet-All -->


        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 total-food">
                <p id="totalSweet">ចំនួនមុខម្ហូបសរុប៖
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

       
      <!-- End-Sweet-Body -->

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