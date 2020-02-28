<?php
    $userName = $_POST["txtLoginUserName"];
    $pwd = $_POST["txtLoginPwd"];

    //connect to database
    include 'connectToDb.php';
    $obj = new DB();
    $con = $obj->conDb();

    //Select Sql Statemt
    $sql = $con->query("SELECT * FROM `tbluser` WHERE Pwd = '".$pwd."' and Email='".$userName."'");    
    $roleSql = $sql->fetch_assoc();
    $role = $roleSql["Role"];
    $name = $roleSql["FirstName"];
      
    $con->query("UPDATE `tblcheckrole` SET `Role`= ".$role.", `FirstName`=N'".$name."' WHERE id = 1");
    echo "<script> location.href='../index.php'</script>"; 

    $con->close();    
?>
