<?php
    $id = $_GET["id"];
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
    $photo = isset($_FILES['userphoto']['name']) ? $_FILES['userphoto']['name'] : '';

    //Select All User
    $user = ($con->query("SELECT * FROM `tbluser` WHERE UserCode='".$id."'"))->fetch_assoc();; 
    
    if (!empty($_POST)) {
      $firstName = $_POST["txtFirstName"]; 
      $lastName = $_POST["txtLastName"]; 
      $gender = $_POST["rdoGender"];
      $email = $_POST["txtEmail"];
      $phone = $_POST["txtPhone"]; 
      if($photo==''){
        $photo = $user["UserImage"];
      }

      // //Insert Statement
      $sql = "UPDATE `tbluser` SET `FirstName`=N'".$firstName."', `LastName`=N'".$lastName."', `Gender`=N'".$gender."',
             `Email`='".$email."',`Phone`='".$phone."', UserImage='".$photo."' WHERE UserCode='".$_GET["id"]."'";
      if($photo==''){
        $file = $user["UserImage"];
        move_uploaded_file($file,"../images/User/".$file);
      }else{
        move_uploaded_file($_FILES['userphoto']['tmp_name'],"../images/User/".$_FILES['userphoto']['name']);
      }

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
    <link rel="stylesheet" href="../css/create-account-style.css">
    <link rel="stylesheet" href="../css/index_style.css">
    <link rel="stylesheet" href="../css/backToTop.css">
    <link rel="stylesheet" href="../css/foodstyle.css">
    <link rel="stylesheet" href="../css/sidenav.css">
    <link rel="stylesheet" href="../css/add-food-style.css">
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
<body onload="loadPage()">
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
              <li class="nav-item"><a class="nav-link text-truncate​ text-dark" href="#">
                <h3 style="padding-top: 30px; padding-bottom: 20px;"><?php echo $user["LastName"].' '.$user["FirstName"] ?></h3></a></li>
              <li class="nav-item"><a class="nav-link text-truncate" href="" id="btnChangeInfo">ព័ត៌មានផ្ទាល់ខ្លួន</a></li>
                <div class="dropdown-divider"></div>
                <li class="nav-item"><a class="nav-link text-truncate" href="edit-password.php?id=<?php echo $id ?>" id="btnChangePass">លេខសម្ងាត់</a></li>
                <div class="dropdown-divider"></div>
            </ul>
        </div>
        <!-- End-Col-1 -->
        
        <!-- col2 -->
        <div class="col-lg-10 col-md-8 col-sm-7 col-7" style="padding-top: 40px;" id="edit-info">
            <div class="row" style="margin-bottom: 20px; margin-top: 10px;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <h4>ព័ត៌មានផ្ទាល់ខ្លួន</h4>
                </div>
            </div>
            <form action="" method="POST" enctype='multipart/form-data'>

            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-primary btn-file">
                              ដាក់រូបភាព..<input type="file" id="imgInp" name="userphoto">
                            </span>
                        </span>
                        <input type="text" class="form-control" readonly style="font-family: KhmerOSbattambang;" id="txtPhoto">
                    </div>
                      <div class="img-fluid box-photo-upload">
                        <img src="../images/User/<?php echo $user["UserImage"] ?>"  id='img-upload' />
                      </div>                     
                  </div>
                  
                  </div>
                <div class="col-lg-8 coj-md-4 col-sm-12 col-12">
                    <div class="form-group row searchme">
                    </div>
                    <div class="form-group row searchme">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12 form-group required">
                            <label class="col-form-label control-label">ឈ្មោះ</label>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                            <input type="text" class="form-control" id="txtFirstName" name="txtFirstName" placeholder="នាមខ្លួន" 
                                    value="<?php echo $user["FirstName"] ?>" autofocus required>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <input type="text" class="form-control" id="txtLastName" name="txtLastName" placeholder="នាមត្រកូល"
                                    value="<?php echo $user["LastName"] ?>" required>
                        </div>
                    </div>

                    <div class="form-group row searchme">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12 form-group required">
                            <label class="col-form-label">ភេទ</label>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                            <input type="radio" id="rdoMale" name="rdoGender" value="ប្រុស">ប្រុស
                        </div>
                        <div class="col-lg-7 col-md-6 col-sm-6 col-6">
                            <input type="radio" id="rdoFemale" name="rdoGender" value="ស្រី">ស្រី
                        </div>
                    </div>

                    <div class="form-group row searchme">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12 form-group required">
                            <label class="col-form-label control-label">អ៊ីម៉ែល</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                            <input type="email" class="form-control" id="txtEmail" name="txtEmail" 
                                  value="<?php echo $user["Email"] ?>" placeholder="example@gmail.com" required>
                            <p id="msgErrEmail"><p>
                        </div>
                    </div>

                    <div class="form-group row searchme">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12 form-group required">
                            <label class="col-form-label control-label">លេខទូរស័ព្ទ</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                            <input type="number" class="form-control" id="txtPhone" name="txtPhone" 
                                    value="<?php echo $user["Phone"] ?>" placeholder="">
                            <p id="msgErrPhone"><p>
                        </div>
                    </div>

    
                        <div class="text-right" style="margin-top: 30px; padding-bottom: 30px;">
                            <button type="submit" class="btn btn-primary">កែប្រែ</button>
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

        $(document).ready( function() {
              $(document).on('change', '.btn-file :file', function() {
            var input = $(this),
              label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
            });
        
            $('.btn-file :file').on('fileselect', function(event, label) {
                
                var input = $(this).parents('.input-group').find(':text'),
                    log = label;
                
                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }
              
            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result);
                    }
                    
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#updatePwd").click(function(){
              if($("#msgOldPwd").val()!='' || $("#msgConPwd").val()!='')
                return false;
            });

            $("#btnChangePass").click(function(){
              $("#edit-info").css("display", "none");
              $("#edit-password").css("display", "block");
            });

            $("#btnChangeInfo").click(function(){
              $("#edit-info").css("display", "block");
              $("#edit-password").css("display", "none");
            });

            $("#txtOldPwd").focusout(function(){
              if($("#txtOldPwd").val() != <?php echo $user["Pwd"] ?>){
                $("#msgOldPwd").html('<br>លេខសម្ងាត់មិនត្រឹមត្រូវទេ').css('color', 'red');
              }
              else{
                $("#msgOldPwd").html('');
              }
            });

            $("#txtConPwd").focusout(function(){
              if($("#txtConPwd").val() != $("#txtNewPwd").val()){
                $("#msgConPwd").html('<br>ការផ្ទៀងផ្ទាត់លេខសម្ងាត់មិនត្រឹមត្រូវទេ').css('color', 'red');
              }
              else{
                $("#msgConPwd").html('');
              }
            });
        
            $("#imgInp").change(function(){
                readURL(this);
            }); 	
          });
          function loadPage(){
            $g = "<?php echo $user["Gender"] ?>";
            if($g=="ស្រី"){
              document.getElementById("rdoFemale").checked = true;
            }
            else{
              document.getElementById("rdoMale").checked = true;
            }
            //Photo Name
            document.getElementById("txtPhoto").value = "<?php echo $user["UserImage"];?>";
          }
        </script>
    
</body>
</html>