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

    //Select All User
    $userSql = $con->query("SELECT * FROM `tbluser` WHERE Status != 0");    
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
                                    <a class="nav-link" href="../html/admin.php"><span>បង្កើតគណនីយថ្មី</span></a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" ><span>ព័ត៌មានអ្នកប្រើប្រាស់</span></a>
                                </li>
                            </ul>
                        </div>
                </li>
                <div class="dropdown-divider"></div>
                <li class="nav-item"><a class="nav-link text-truncate" href="../html/admin-food.php">ម្ហូប</a></li>
                <div class="dropdown-divider"></div>
                <li class="nav-item"><a class="nav-link text-truncate" href="../html/admin-request.php">ការស្នើសុំ</a></li>
                <div class="dropdown-divider"></div>
            </ul>
        </div>
        <!-- End-Col-1 -->
        
        <!-- col2 -->
        
        <div class="col-lg-10 col-md-8 col-sm-7 col-7" style="padding-top: 40px;">
          <form action="" method="POST">
          
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-left" style="margin-bottom: 10px;">
                <h4 class="text-success"> ព័ត៌មានអ្នកប្រើប្រាស់ <h4>
              </div>
              <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-right" style="margin-bottom: 10px;">
                <button type="submit" class="btn btn-danger btn-md" id="btnDelete" style="width: 100px;" disabled>លុប</button>
              </div> -->
            </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                  <table class="table table-bordered" id="deleteUser">
                    <thead style="text-align: center;">
                      <tr class="thead-light">
                        <th scope="col" style="width: 10%;">#</th>
                        <th scope="col" style="width: 20.5%;">ឈ្មោះ</th>
                        <th scope="col" style="width: 8%;">ភេទ</th>
                        <th scope="col" style="width: 25%;">អ៊ីម៉ែល</th>
                        <th scope="col" style="width: 13%;">លេខទូរស័ព្ទ</th>
                        <th scope="col" style="width: 11%;">តួនាទី</th>
                        <th scope="col"style="width: 11%">កែប្រែ</th>
                      </tr>
                    </thead>
                    <tbody id="rolechanged">
                      <?php
                        $num = 0;
                        if ($userSql->num_rows > 0) {         
                          while($user = $userSql->fetch_assoc()){
                            $num++;
                            if($user["Role"]==1){
                              $role = "Member";
                            }
                            else{
                              $role = "Admin";
                            }

                            if($usercode==$user["UserCode"]){
                              $colName = $user["LastName"].' '.$user["FirstName"];
                            }
                            else{
                              $colName = '<a href="#m" type="submit" data-toggle="modal" data-target="#userModal" id="'.$user["UserCode"].'" onClick="rolet(this.id)">'.$user["LastName"].''." ".''.$user["FirstName"].'</a>';
                            }
                            echo '<tr style="text-align: center;">   
                                    <td>'.$num.'</td>                         
                                    <td>'.$colName.'</td>
                                    <td>'.$user["Gender"].'</td>
                                    <td>'.$user["Email"].'</td>
                                    <td>'.$user["Phone"].'</td>
                                    <td> '.$role.' </td>
                                    <td class="display-none" id="img'.$user["UserCode"].'">'.$user["UserImage"].'</td>
                                    <td class="display-none" id="role'.$user["UserCode"].'">'.$user["Role"].'</td>
                                    <td>
                                        <a href="admin-edit-user.php?id='.$user["UserCode"].'"><button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                    </td>
                                  </tr>';
                          }
                        }

                      ?>  
                      <script>                        
                        var id;
                        function rolet(d){
                          id = d;
                          document.getElementById("popup-name").innerHTML = document.getElementById(d).textContent; 
                          document.getElementById("popup-image").src = "../images/User/"+document.getElementById('img'+d).textContent;
                          var r = document.getElementById('role'+d).textContent;
                          if(r == 1){
                            var ro = "1";
                          }
                          else{
                            var ro = "0";
                          }
                          document.getElementById("popup-role").selectedIndex = ro;
                        }
          
                        $(document).ready(function () {
                          $("#updateRole").click(function(){
                            $.ajax({ 
                              type: "GET",
                              url: "changeUserRole.php",             
                              dataType: "html",   
                                data: {code:''+id},         
                              success: function(data){                    
                                  $("#rolechanged").html(data); 
                              }
                            });
                          });
                        });
                      </script>
                    <!-- userModel -->
                    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">ព័ត៌មានអ្នកប្រើប្រាស់</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body" style="text-align: center; padding-top: 30px;">
                              <img id="popup-image" src="../images/User/Enghorng.png" alt="" class="rounded-circle img-fluid mx-auto d-block" style="width: 200px; height: 200px;">
                              <h4 style="padding-top: 20px;" id="popup-name"></h4>
                                <div>
                                  <select class="form-control mx-auto d-block" style="width: 50%;" id="popup-role">
                                    <option value="Admin">Admin</option>
                                    <option value="User">Member</option>
                                  </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">បិទ</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal" id="updateRole">កែប្រែ</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    <!-- End-user-Model -->
                      
                  </table>
                </div>
              </div>
            </form>
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

    
</body>
</html>