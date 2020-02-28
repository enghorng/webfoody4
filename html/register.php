<?php
    //connect to database
    include '../php/connectToDb.php';
    $obj = new DB();
    $con = $obj->conDb();

    $email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '';
    $phone = isset($_POST['txtPhone']) ? $_POST['txtPhone'] : '';


    //Select User's Email and Phone
    $sql = $con->query("SELECT Email, Phone FROM `tbluser`");

    while($i = $sql->fetch_assoc()){
        $emailArray[] = $i["Email"];
        if($i["Phone"]=='' || $i["Phone"]== null) continue;
        else $phoneArray[] = $i["Phone"];
    }    
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
        .test{
            /* display: none; */
        }
    </style>
</head>

<body>    
    <div class="container">
        <div class="row formRegister">
            <div class="col-md-6 offset-md-3 shadow-lg p-3 mb-5 bg-white rounded">
                <form action="../php/register.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <h2 class="title text-center"> បង្កើតគណនីថ្មី </h2>
                        </div>
                    </div>
                    <div class="form-row info">
                        <div class="form-group col-md-3">
                            <label>ឈ្មោះ <b>*</b></label>
                        </div>
                        <div class="form-group col-md-9">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="txtFirstName" name="txtFirstName" placeholder="នាមខ្លួន" autofocus required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="txtLastName" name="txtLastName" placeholder="នាមត្រកូល" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row info">
                        <div class="form-group col-md-3">
                            <label>ភេទ</label>
                        </div>
                        <div class="form-group col-md-9">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="radio" name="rdoGender" value="Male" checked>ប្រុស
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="radio" name="rdoGender" value="Female">ស្រី
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row info">
                        <div class="form-group col-md-3">
                            <label>អ៊ីមែល <b>*</b></label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="អ៊ីមែល" required>
                            <p id="msgErrEmail"><p>
                        </div>
                    </div>
                    <div class="form-row info">
                        <div class="form-group col-md-3">
                            <label>លេខទូរសព្ទ័</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="number" class="form-control" id="txtPhone" name="txtPhone" placeholder="លេខទូរសព្ទ័">
                            <p id="msgErrPhone"><p>
                        </div>
                    </div>
                    <div class="form-row info">
                        <div class="form-group col-md-3">
                            <label>លេខសម្ងាត់ <b>*</b></label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="password" class="form-control" id="txtPwd" name="txtPwd" placeholder="លេខសម្ងាត់" required>
                        </div>
                    </div>
                    <div class="form-row info">
                        <div class="form-group col-md-3">
                            <label>ផ្ទៀងផ្ទាត់លេខសម្ងាត់ <b>*</b></label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="password" class="form-control" id="txtConfirmPwd" name="txtConfirmPwd" placeholder="ផ្ទៀងផ្ទាត់លេខសម្ងាត់" required>
                            <p id="error-Msg" class="info"></p>
                        </div>
                    </div>
                    <div class="form-row info">
                        <div class="form-group col-md-6"></div>
                        <div class="form-group col-md-6">
                            <button type="submit" id="register" class="btn-register">
                                <b>បង្កើត</b>
                            </button>
                            <a href="login.php">
                                <button type="button" class="btn-register">
                                    <b>ថយក្រោយ</b>
                                </button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script>
        $(document).ready(function () {
            var mail = 0;
            var phone = 0;
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
            });
            $("#register").on("click", function () {
                if (mail == 1 || phone == 1) {
                    return false;
                }
            });
        });
    </script>
</body>

</html>