<?php
    $usercode = $_GET['code']; 

    //connect to database
    include 'connectToDb.php';
    $obj = new DB();
    $con = $obj->conDb();

    $role = (($con->query("SELECT * FROM tbluser WHERE UserCode = '".$usercode."'"))->fetch_assoc())["Role"];
    
    if($role == 1){
        $role = 2;
    }
    else{
        $role = 1;
    }
    
    //Update User Role
    $con->query("UPDATE tbluser SET Role=".$role." WHERE UserCode = '".$usercode."'");
    $con->query("UPDATE tblcheckrole SET Role=".$role." WHERE UserCode = '".$ucode."'");

    //Select All User
    $userSql = $con->query("SELECT * FROM `tbluser` WHERE Status != 0"); 
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
        echo '<tr style="text-align: center;">
                <th scope="row">
                    <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">'.$num.'
                    </label>
                    </div>
                </th>
                <td><a href="#m" type="submit" data-toggle="modal" data-target="#userModal" id="'.$user["UserCode"].'" onClick="rolet(this.id)">'.$user["LastName"].''." ".''.$user["FirstName"].'</a></td>
                <td>'.$user["Gender"].'</td>
                <td>'.$user["Email"].'</td>
                <td>'.$user["Phone"].'</td>
                <td> '.$role.' </td>
                <td class="display-none" id="img'.$user["UserCode"].'">'.$user["UserImage"].'</td>
                <td class="display-none" id="role'.$user["UserCode"].'">'.$user["Role"].'</td>
                <td>
                    <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>
                </td>
                </tr>';
        }
    }
    $con->close();
?>