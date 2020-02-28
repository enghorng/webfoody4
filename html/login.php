<?php
    //connect to database
    include '../php/connectToDb.php';
    $obj = new DB();
    $con = $obj->conDb();

    $con->query("UPDATE `tblcheckrole` SET `Role`= 0, `FirstName`=N'អ្នកប្រើប្រាស់' WHERE id = 1");


    //Select User's Email and Phone
    $sql = $con->query("SELECT Email,  Pwd FROM `tbluser`");

    while($i = $sql->fetch_assoc()){
        $pwdArray[] = $i["Pwd"];
        $emailArray[] = $i["Email"];
    }    
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
        @import url(../css/login.css);
    </style>
    <script src="../js/login.js"></script>
    <style>
        .msgErrUser{
            display: none;
        }
    </style>
</head>

<body>
    <section class="login-block">
        <div class="container">
        <div class="alert alert-danger text alert-dismissible msgErrUser" id="msgErrUser">
            <!-- <button type="button" class="close" data-dismiss="alert">x</button> -->
            <strong>សូមព្យាយាមម្ដងទៀត!</strong> អ៊ីមែល/លេខទូរសព្ទ័ ឬ លេខសម្ងាត់របស់អ្នកមិនត្រឹមត្រូវទេ។
        </div>
            <form action="../php/login.php" method="POST">
                <div class="row text">
                    <div class="col-md-4 login-sec">
                        <h2 class="text-center title">Login ចូលគណនី</h2>
                        <form class="login-form text" action="../php/login.php" method="POST">
                            <div class="form-group">
                                <label class="text-uppercase">អ៊ីមែល</label>
                                <input type="text" class="form-control" id="txtLoginUserName" name="txtLoginUserName" placeholder="" autofocus>
                            </div>
                            <div class="form-group">
                                <label class="text-uppercase">លេខសម្ងាត់</label>
                                <input type="password" class="form-control" id="txtLoginPwd" name="txtLoginPwd" placeholder="">
                            </div>
                            <div class="form-group">
                                <a href="#">ភ្លេចលេខសម្ងាត់</a>
                                <button type="submit" id="btnLogin" class="btn btn-login float-right info">ចូល</button>
                            </div>
                            <div class="btnRegister">
                                <a href="register.php">
                                    <button type="button" class="btn">
                                        <b>បង្កើតគណនីថ្មី</b>
                                    </button>
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8 banner-sec">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img class="d-block img-fluid" src="../images/Login Register/slideshow1.jpg" alt="Responsive image">
                                    <div class="carousel-caption d-none d-md-block">
                                        <div class="banner-text">
                                            <h4 class="text-slideshow">ម្ហូបប្រចាំថ្ងៃ</h4>
                                            <p class="detail-slideshow">ការបរិភោគម្ហូបអាហារដែលមានរូបរាងស្អាត រសជាតិឆ្ងាញ់គឺធ្វើឱ្យយើងមានសុខភាពល្អ មានភាពស្វាហាប់និងស្មារតីដើម្បីបំពេញកិច្ចការនានាពេញមួយថ្ងៃ។</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid" src="../images/Login Register/slideshow1.jpg" alt="Responsive image">
                                    <div class="carousel-caption d-none d-md-block">
                                        <div class="banner-text">
                                            <h4 class="text-slideshow">ម្ហូបប្រចាំថ្ងៃ</h4>
                                            <p class="detail-slideshow">ការបរិភោគម្ហូបអាហារដែលមានរូបរាងស្អាត រសជាតិឆ្ងាញ់គឺធ្វើឱ្យយើងមានសុខភាពល្អ មានភាពស្វាហាប់និងស្មារតីដើម្បីបំពេញកិច្ចការនានាពេញមួយថ្ងៃ។</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid" src="../images/Login Register/slideshow1.jpg" alt="Responsive image">
                                    <div class="carousel-caption d-none d-md-block">
                                        <div class="banner-text">
                                            <h4 class="text-slideshow">ម្ហូបប្រចាំថ្ងៃ</h4>
                                            <p class="detail-slideshow">ការបរិភោគម្ហូបអាហារដែលមានរូបរាងស្អាត រសជាតិឆ្ងាញ់គឺធ្វើឱ្យយើងមានសុខភាពល្អ មានភាពស្វាហាប់និងស្មារតីដើម្បីបំពេញកិច្ចការនានាពេញមួយថ្ងៃ។</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
            </form>
            </div>
    </section>
    <script>
        $(document).ready(function () {  
                     
            $("#btnLogin").on("click", function () { 
                var username = $('#txtLoginUserName').val();
                var pwd = $('#txtLoginPwd').val();
                var e=0;
                var pw=0;       
                var emailList = <?php echo json_encode($emailArray); ?>;
                var pwdList = <?php echo json_encode($pwdArray); ?>;
                for(var k=0; k<emailList.length; k++){
                    if(username==emailList[k]){
                        e = 1;
                    }
                }     
                for(var j=0;  j<pwdList.length; j++){
                    if(pwd==pwdList[j]){
                        pw = 1;
                    }
                }
                if(e == 0 || pw == 0 ){
                    $("#msgErrUser").fadeTo(2000, 500).slideUp(500, function() {
                            $("#msgErrUser").slideUp(500);
                    });
                    return false;
                }
                e = 0; pw = 0;
            });
        });
    </script>
</body>

</html>