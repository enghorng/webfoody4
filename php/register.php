<?php
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

    //connect to database
    include 'connectToDb.php';
    $obj = new DB();
    $con = $obj->conDb();

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


    //Select User's Email and Phone
    $sql = $con->query("SELECT Email, Phone FROM `tbluser`");

    while($i = $sql->fetch_assoc()){
        $emailArray[] = $i["Email"];
    }    

    $em = 0;

    foreach($emailArray as $e){
        if($e==$email){
            $em = 1;
        }
    }

    if ($em!=1) {
        // //Insert Statement
        $sql = "INSERT INTO `tbluser`(`UserCode`, `FirstName`, `LastName`, `Gender`, `Email`, 
                `Phone`, `Pwd`,`UserImage`,`RegisterDate`, `Status`,`Role`) VALUES ('".$userCode."',N'".$firstName."',
                N'".$lastName."',N'".$gender."','".$email."','".$phone."','".$pwd."','".$photo."','".$date."',1,1)";
        // echo $sql;
        if ($con->query($sql) === TRUE) { }
    }

    $con->close();    
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
        @import url(../css/register.css);
    </style>
    <script src="../js/register.js"></script>
    <style>
        .thanks{
            width: 100%;
            height: auto;
        }
        h6{            
            font-family: Khmer OS Muol;
        }
        .right{
            text-align: right;
        }
    </style>
</head>

<body>    
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 shadow-lg p-3 mb-5 bg-white rounded">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <h2 class="text-center"><img src="../images/Icon/foodlogo.png"> Quick Cook </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h6> សូមអរគុណសម្រាប់ការចុះឈ្មោះ</h6>
                        <h6 class="right"> សូមស្វាគមន៏ចំពោះការមកកាន់ Website របស់យើងខ្ញុំ</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <img src="../images/Login Register/Thanks.jpg" class="thanks">
                    </div>
                </div>
                <div class="form-row info">
                    <div class="form-group col-md-6"></div>
                    <div class="form-group col-md-6">
                        <a href="../html/login.php">
                            <button type="button" class="btn-register">
                                <b>បិទ</b>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>