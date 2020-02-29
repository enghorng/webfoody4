<?php
    //connect to database
    include '../php/connectToDb.php';
    $obj = new DB();
    $con = $obj->conDb();
    //$con->query('SET character_set_results=utf8');

     //Disply User Name
     $sql = $con->query("SELECT * FROM `tblcheckrole` WHERE id = 1");    
     $roleSql = $sql->fetch_assoc();
     $role = $roleSql["Role"];
     $name = $roleSql["FirstName"];
     $usercode = $roleSql["UserCode"];

    //Insert Food
    $name = isset($_POST['txtFoodName']) ? $_POST['txtFoodName'] : '';
    $category = isset($_POST['dropdown-category']) ? $_POST['dropdown-category'] : '';
    $type = isset($_POST['dropdown-type']) ? $_POST['dropdown-type'] : '';
    $country = isset($_POST['dropdown-country']) ? $_POST['dropdown-country'] : '';
    $province = isset($_POST['dropdown-province']) ? $_POST['dropdown-province'] : '';
    $link = isset($_POST['txtLink']) ? $_POST['txtLink'] : '';
    $photo = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : '';
    date_default_timezone_set("America/New_York");
    $date = date("y/m/d h:i:s");

    $foodcode = "F032";

    echo $name;

    //$con->query('SET character_set_results=utf8');
    $insert = "INSERT INTO tblfood(`FoodCode`,`FoodName`, `Category`, `FoodType`, `Country`, `Province`, `VideoLink`, `FoodImage`, `FoodDate`, 
                                    `UserCode`, `Status`) VALUES('".$foodcode."',N'".$name."','".$category."','".$type."','".$country."',N'".$province."',
                                                                  '".$link."','".$photo."','".$date."','".$usercode."',2)";
    
    if ($con->query($insert) === TRUE) {
        
        echo "New record created successfully";
        // header("Refresh:0");

    } else {
        echo "Error: " . $insert . "<br>" . $con->error;
    } 
?>

