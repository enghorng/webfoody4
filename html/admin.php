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

    //Select User's Email and Phone
    $sql = $con->query("SELECT Email, Phone FROM `tbluser`");

    while($i = $sql->fetch_assoc()){
        $emailArray[] = $i["Email"];
        if($i["Phone"]=='' || $i["Phone"]== null) continue;
        else $phoneArray[] = $i["Phone"];
    }

    //Insert New User Account
    if (!empty($_POST)) {
      $firstName = $_POST["txtFirstName"]; 
      $lastName = $_POST["txtLastName"]; 
      $gender = $_POST["rdoGender"];
      $email = $_POST["txtEmail"]; 
      $phone = $_POST["txtPhone"]; 
      $pwd = $_POST["txtPwd"];
      $userCode = "U";
      date_default_timezone_set("America/New_York");
      $date = date("y/m/d h:i:s");

      // Translate from English to Khmer
      if($gender=='Female'){
          $gender = 'ស្រី';
          $photo = "Female.png";
      }
      else{
          $gender = 'ប្រុស';
          $photo = "Male.png";
      }

      $con->query('SET character_set_results=utf8');

      //Select the largest id number 
      $idSql=$con->query("SELECT id FROM `tbluser` ORDER BY id DESC LIMIT 1");
      $maxID = $idSql->fetch_assoc();
      $maxID["id"] = $maxID["id"] + 1;
      if($maxID["id"]< 10){
          $userCode = $userCode."00".$maxID["id"];
      }
      elseif($maxID["id"]< 100){
          $userCode = $userCode."0".$maxID["id"];
      }
      else{
          $userCode = $userCode.$maxID["id"];
      }
    
        // //Insert Statement
        $sql = "INSERT INTO `tbluser`(`UserCode`, `FirstName`, `LastName`, `Gender`, `Email`, 
                `Phone`, `Pwd`,`UserImage`,`RegisterDate`, `Status`,`Role`) VALUES ('".$userCode."',N'".$firstName."',
                N'".$lastName."',N'".$gender."','".$email."','".$phone."','".$pwd."','".$photo."','".$date."',1,1)";
        // echo $sql;
        if ($con->query($sql) === TRUE) { 
          header("Refresh:0");
        }
    }

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
        <div class="col-lg-10 col-md-8 col-sm-7 col-7" style="padding-top: 40px; padding-left: 100px;">
            <form action="" method="POST">
                    <div class="form-group row searchme">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12 form-group"> <h4 class="text-success"> បង្កើតគណនីថ្មី <h4> </div>
                    </div>
                    <div class="form-group row searchme">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12 form-group required">
                            <label class="col-form-label control-label">ឈ្មោះ</label>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                            <input type="text" class="form-control" id="txtFirstName" name="txtFirstName" placeholder="នាមខ្លួន" autofocus required>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <input type="text" class="form-control" id="txtLastName" name="txtLastName" placeholder="នាមត្រកូល" required>
                        </div>
                    </div>

                    <div class="form-group row searchme">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12 form-group required">
                            <label class="col-form-label">ភេទ</label>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                            <input type="radio" name="rdoGender" value="Male" checked>ប្រុស
                        </div>
                        <div class="col-lg-7 col-md-6 col-sm-6 col-6">
                            <input type="radio" name="rdoGender" value="Female">ស្រី
                        </div>
                    </div>

                    <div class="form-group row searchme">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12 form-group required">
                            <label class="col-form-label control-label">អ៊ីម៉ែល</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                            <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="example@gmail.com" required>
                            <p id="msgErrEmail"><p>
                        </div>
                    </div>

                    <div class="form-group row searchme">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12 form-group required">
                            <label class="col-form-label control-label">លេខទូរស័ព្ទ</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                            <input type="number" class="form-control" id="txtPhone" name="txtPhone" placeholder="">
                            <p id="msgErrPhone"><p>
                        </div>
                    </div>

                    <div class="form-group row searchme">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12 form-group required">
                            <label class="col-form-label control-label">លេខសម្ងាត់</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                            <input type="password" class="form-control" id="txtPwd" name="txtPwd" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group row searchme">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12 form-group required">
                            <label class="col-form-label control-label">ផ្ទៀងផ្ទាត់លេខសម្ងាត់</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                            <input type="password" class="form-control" id="txtConfirmPwd" name="txtConfirmPwd" placeholder="" required>
                            <p id="error-Msg" class="info"></p>
                        </div>
                    </div>

                    

                    <div class="text-right" style="margin-top: 30px; padding-bottom: 30px;">
                        <button type="submit" id="btnCreate" class="btn btn-primary" disabled>បង្កើត</button>
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
    <script>
        $(document).ready(function () {
            var mail = 0;
            var phone = 0;
            var p = 0;
            $("#txtEmail").keyup(function () {                
                var emailList = <?php echo json_encode($emailArray); ?>;
                for(var i=0; i<emailList.length; i++){
                    if($("#txtEmail").val()==emailList[i]){
                        mail = 1;
                        $('#msgErrEmail').html('<br>អ៊ីមែលនេះបានធ្វើការបង្កើតគណនីរួចហើយ').css('color', 'red');
                        break;
                    }
                    else{
                        mail = 0;
                        $('#msgErrEmail').html('');
                    }
                }
                if (mail == 0 && phone == 0 && p == 0 && $("#txtEmail").val()!='' && $('#txtPwd').val()!='') {
                  $("#btnCreate").prop("disabled",false);
                }    
                else{
                  $("#btnCreate").prop("disabled",true);
                }            
            });
            $("#txtPhone").keyup(function () {                
                var phoneList = <?php echo json_encode($phoneArray); ?>;
                for(var i=0; i<phoneList.length; i++){
                    if($("#txtPhone").val()==phoneList[i]){
                        phone = 1;
                        $('#msgErrPhone').html('<br>លេខទូរសព្ទ័នេះបានធ្វើការបង្កើតគណនីរួចហើយ').css('color', 'red');
                        break;
                    }
                    else{
                        phone = 0;
                        $('#msgErrPhone').html('');
                    }
                } 
                if (mail == 0 && phone == 0 && p == 0 && $("#txtEmail").val()!='' && $('#txtPwd').val()!='') {
                  $("#btnCreate").prop("disabled",false);
                }    
                else{
                  $("#btnCreate").prop("disabled",true);
                }                 
            });            
            
            $("#txtConfirmPwd").focusout(function () {
                if ($('#txtPwd').val() == $('#txtConfirmPwd').val()) {
                    $('#error-Msg').html('');
                    p = 0;
                } else {
                    $('#error-Msg').html('ការផ្ទៀងផ្ទាត់លេខសម្ងាត់មិនត្រឹមត្រូរទេ').css('color', 'red');
                    p = 1;
                }
                if (mail == 0 && phone == 0 && p == 0 && $("#txtEmail").val()!='' && $('#txtPwd').val()!='') {
                  $("#btnCreate").prop("disabled",false);
                }   
                else{
                  $("#btnCreate").prop("disabled",true);
                }   
            });
            $("#txtConfirmPwd").keydown(function () {
                $('#error-Msg').html('');
                p = 0;
            });

            $("#btnCreate").on("click", function () {
                alert("User ឈ្មោះ: "+$("#txtLastName").val()+" "+""+$("#txtFirstName").val()+" ត្រូវបានបង្កើតដោយជោគជ័យ");
            });
        });
    </script>
    
</body>
</html>