<?php
    $fcode = $_GET["food-id"];
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

    //Get Food Information
    // $foodcode = "F".$id;
    $foodname = isset($_POST['txtFoodName']) ? $_POST['txtFoodName'] : '';
    $category = isset($_POST['dropdown-category']) ? $_POST['dropdown-category'] : '';
    $type = isset($_POST['dropdown-type']) ? $_POST['dropdown-type'] : '';
    $country = isset($_POST['dropdown-country']) ? $_POST['dropdown-country'] : '';
    $province = isset($_POST['dropdown-province']) ? $_POST['dropdown-province'] : '';
    $link = isset($_POST['txtLink']) ? $_POST['txtLink'] : '';
    $photo = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : '';
    date_default_timezone_set("America/New_York");
    $date = date("y/m/d h:i:s");    

    //Select Food Information
    $foodSql = $con->query("SELECT * FROM `tblfood` WHERE FoodCode = '".$fcode."'");  
    $food = $foodSql->fetch_assoc();
    $ingredientSql = $con->query("SELECT * FROM `tblingredient` WHERE FoodCode = '".$fcode."'"); 
    $ing = 0;   
    $recipeSql = $con->query("SELECT * FROM `tblrecipe` WHERE FoodCode = '".$fcode."'");
    $rec = 0;    
    $noteSql = $con->query("SELECT * FROM `tblfoodnote` WHERE FoodCode = '".$fcode."'"); 
    $note = $noteSql->fetch_assoc();


    $fimage = $food["FoodImage"];
    if($photo==''){
      $photo = $fimage;
    }

    if (!empty($_POST)) {
      //Insert Ingregient
      $ingredient[] = array();
      $qty[] = array();
      for($j=1; $j<=20; $j++){
        $ingredient[$j] = "ingredient".$j;
        $qty[$j] = "qty".$j;
        $in = isset($_POST[$ingredient[$j]]) ? $_POST[$ingredient[$j]] : '';
        $q = isset($_POST[$qty[$j]]) ? $_POST[$qty[$j]] : '';
        if($in!=''){
          $con->query("UPDATE tblingredient SET Ingredient=N'".$in."',Qty=N'".$q."' WHERE FoodCode='".$fcode."'");
        }
      }

      //Insert Recipe
      $recipe[] = array();
      for($i=1; $i<=20; $i++){
        $recipe[$i] = "recipe".$i;
        $r = isset($_POST[$recipe[$i]]) ? $_POST[$recipe[$i]] : '';
        if($r!=''){
          $con->query("UPDATE tblrecipe SET Recipe=N'".$r."' WHERE FoodCode='".$fcode."'");
        }
      }

      //Insert Food Note
      $foodNote = isset($_POST['txtFoodName']) ? $_POST['txtFoodName'] : '';
      $con->query("INSERT INTO tblfoodnote SET Note=N'".$foodNote."' WHERE FoodCode='".$fcode."'");

      //Insert Food information
      $update = "UPDATE tblfood SET `FoodName`=N'".$foodname."', `Category`='".$category."', `FoodType`='".$type."', `Country`='".$country."',
                                    `Province`=N'".$province."', `VideoLink`='".$link."', `FoodImage`=N'".$photo."' WHERE `FoodCode`='".$fcode."'";
      
      if($photo==''){
        $file = $fimage;
        move_uploaded_file($file,"../images/".$category."/".$file);
      }else{
        move_uploaded_file($_FILES['photo']['tmp_name'],"../images/".$category."/".$_FILES['photo']['name']);
      }
      $con->query($update);
      header("location: checkFood.php?food-id=".$fcode);
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
  .display-none{
    display: none;
  }
</style>

<body onload="foodInfo()">
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
                              $("#navLogout").css("display","block");
                              $("#navUser").css("display","block");
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

  <!-- Add-Fodd-Body -->
  <div class="container">
    <div class="row menu-right" style="padding-right: 0;">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div style="float: right;"><a href="../html/list-food.php" class="text-success">
            <h6>បញ្ជីម្ហូប</h6>
          </a></div>
        <div style="float: right;"><a href="../html/add-food.php" class="text-primary">
            <h6>បន្ថែមម្ហូប</h6>
          </a></div>
      </div>
    </div>

    <div class="row food-large-title" style="padding-top: 30px;">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <h2>បន្ថែមម្ហូប</h2>
      </div>
    </div>

  <form action="" method="post" enctype='multipart/form-data'>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <span class="btn btn-primary btn-file">
                ដាក់រូបភាព..<input type="file" id="imgInp" name="photo">
              </span>
            </span>
            <input type="text" class="form-control" readonly style="font-family: KhmerOSbattambang;" id="txtPhoto">
          </div>
          <div class="img-fluid img-thumbnail box-photo-upload">
            <!-- <img src="../images/addfood.png" alt="" class="img-fluid img-thumbnail addfoodphoto img-hide"> -->
            <img src="../images/<?php echo $food["Category"]?>/<?php echo $food["FoodImage"] ?>" id='img-upload' />
            <!-- <h1 class="text-hide" style="background-image: url('/docs/4.0/assets/brand/bootstrap-solid.svg');">Bootstrap</h1> -->
          </div>

        </div>

      </div>
      
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
          <div class="form-group">
            <label for="name">ឈ្មោះ <b>*</b></label>
            <input type="text" class="form-control searchme" id="txtFoodName" name="txtFoodName"
              placeholder="ឈ្មោះម្ហូប" value="<?php echo $food["FoodName"] ?>" autofocus required>
          </div>
          <div class="form-group searchme">
            <label for="type">ប្រភេទ <b>*</b></label> <br>
            <select name="dropdown-type" id="dropdown-type" class="form-control" disabled required>
              <option value="">-- សូមជ្រើសរើស --</option>
            </select>
          </div>
          <div class="form-group searchme">
            <label for="type">ប្រចាំខេត្ត</label> <br>
            <select name="dropdown-province" id="dropdown-province" class="form-control" disabled>
              <option value="">-- សូមជ្រើសរើស --</option>
              <?php
                    $provinces= array('កណ្ដាល','កំពង់ចាម','កំពង់ឆ្នាំង','កំពង់ធំ','កំពង់សោម','កំពង់ស្ពឺ','កំពត','កែប','កោះកុង','ក្រចេះ',
                                   'តាកែវ','ត្បូងឃ្មុំ','បន្ទាយមានជ័យ','បាត់ដំបង','ប៉ៃលិន','ពោធិ៍សាត់','ព្រះវិហារ','ព្រៃវែង',
                                   'ភ្នំពេញ','មណ្ឌលគីរី','រតនគីរី','សៀមរាប','ស្ទឹងត្រែង','ស្វាយរៀង','ឧត្តរមានជ័យ');

                    foreach($provinces as $p){
                      echo '<option value="'.$p.'">'.$p.'</option>';
                    }
                  ?>

            </select>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
          <div class="form-group searchme">
            <label for="category">ផ្នែក <b>*</b></label> <br>
            <select name="dropdown-category" id="dropdown-category" class="form-control" required>
              <option value="">-- សូមជ្រើសរើស --</option>
              <option value="Food">ម្ហូប</option>
              <option value="Sweet">បង្អែម</option>
              <option value="Drink">ភេសជ្ជៈ</option>
            </select>
          </div>
          <div class="form-group searchme">
            <label for="country">ប្រទេស</label> <br>
            <select name="dropdown-country" id="dropdown-country" class="form-control">
              <option value="">-- សូមជ្រើសរើស --</option>
              <option value="Khmer">ខ្មែរ</option>
              <option value="Foreign">បរទេស</option>
            </select>
          </div>
          <div class="form-group">
            <label for="country">តំណភ្ជាប់ទៅកាន់យូធូប</label>
            <input type="text" class="form-control searchme" value="<?php echo $food["VideoLink"] ?>" id="txtLink" name="txtLink" placeholder="">
          </div>
        </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <h6>គ្រឿងទេស</h6>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <table class="table" id="ingredient-table" name="ingredient-table">
          <thead class="thead-light">
            <tr>
              <th scope="col" style="width: 5.5%;">#</th>
              <th scope="col" style="width: 40.5%;">គ្រឿងទេស</th>
              <th scope="col" style="width: 30%;">បរិមាណ</th>
              <th scope="col" style="width: 10%;">លុបចោល</th>
              <th scope="col" style="width: 10%;">បន្ថែម</th>
            </tr>
          </thead>
          <tbody id="ingredient-tbody" name="ingredient-tbody">
          <?php
            if ($ingredientSql->num_rows > 0) {         
                while($ingredient = $ingredientSql->fetch_assoc()) {
                    $ing++;
                    echo '<tr>​
                            <td>
                            <input type="number" class="form-control" value="'.$ing.'" name="num'.$ing.'"/>
                            </td>
                            <td>
                            <input type="text" class="form-control" id="ingredient'.$ing.'" name="ingredient'.$ing.'" value="'.$ingredient["Ingredient"].'" />
                            </td>
                            <td>
                            <input type="text" class="form-control" name="qty'.$ing.'" value="'.$ingredient["Qty"].'"/>
                            </td>
                            <td style="text-align: center;">
                            <button type="button" class="btn btn-danger form-control" value="Delete" onClick="deleteIngredient(this)"><i class="fa fa-minus-circle"></i></button>
                            </td>
                            <td style="text-align: center;">
                            <button type="button" class="btn btn-success form-control" onClick="addNewIngredient()"><i class="fa fa-plus-circle"></i></button>
                            </td>
                        </tr>';
                }
            }else{
                echo '<tr>​
                <td>
                  <input type="number" class="form-control" value="1" name="num1"/>
                </td>
                <td>
                  <input type="text" class="form-control" id="ingredient1" name="ingredient1" />
                </td>
                <td>
                  <input type="text" class="form-control" name="qty1" />
                </td>
                <td style="text-align: center;">
                  <button type="button" class="btn btn-danger form-control" value="Delete" onClick="deleteIngredient(this)"><i class="fa fa-minus-circle"></i></button>
                </td>
                <td style="text-align: center;">
                  <button type="button" class="btn btn-success form-control" onClick="addNewIngredient()"><i class="fa fa-plus-circle"></i></button>
                </td>
              </tr>';
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <h6>របៀបធ្វើ</h6>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <table class="table" id="recipe-table">
          <thead>
            <tr class="thead-light">
              <th scope="col" style="width: 5.5%;">#</th>
              <th scope="col" style="width: 70.5%">ពណ៌នា</th>
              <th scope="col" style="width: 10%;">លុបចោល</th>
              <th scope="col" style="width: 10%;">បន្ថែម</th>
            </tr>
          </thead>
          <tbody>
          <?php
            if ($recipeSql->num_rows > 0) {         
                while($recipe = $recipeSql->fetch_assoc()) {
                    $rec++;
                    echo '<tr>
                            <td>
                            <input type="number" id="num'.$rec.'" class="form-control" value="'.$rec.'" name="no'.$rec.'"/>
                            </td>
                            <td>
                            <textarea class="form-control" id="exampleFormControlTextarea'.$rec.'" rows="3" name="recipe'.$rec.'"
                                style="resize: none;" >'.$recipe["Recipe"].'</textarea>
                            </td>
                            <td style="text-align: center;">
                            <button type="button" class="btn btn-danger form-control" value="Delete" onClick="deleteRecipe(this)"><i class="fa fa-minus-circle"></i></button>
                            </td>
                            <td style="text-align: center;">
                            <button type="button" class="btn btn-success form-control" onClick="addNewRecipe()"><i class="fa fa-plus-circle"></i></button>
                            </td>
                        </tr>';
                }
            }
            else{
                echo '<tr>
                    <td>
                    <input type="number" id="num1" class="form-control" value="1" name="no1"/>
                    </td>
                    <td>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="recipe1"
                        style="resize: none;"></textarea>
                    </td>
                    <td style="text-align: center;">
                    <button type="button" class="btn btn-danger form-control" value="Delete" onClick="deleteRecipe(this)"><i class="fa fa-minus-circle"></i></button>
                    </td>
                    <td style="text-align: center;">
                    <button type="button" class="btn btn-success form-control" onClick="addNewRecipe()"><i class="fa fa-plus-circle"></i></button>
                    </td>
                </tr>';
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <h6>កំណត់សម្គាល់ផ្សេងៗ</h6>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <textarea class="form-control" id="txtFoodNote" rows="5"
          style="resize: none; font-family: KhmerOSbattambang;"><?php echo $note["Note"]; ?></textarea>
      </div>
    </div>

    <div class="text-right" style="margin-top: 30px; margin-bottom: 50px;">
      <button type="submit" class="btn btn-primary" onClick="updateFood()">កែប្រែ</button>
    </div>

  </div>
  </form>
  <!-- End-Add-Food-Body -->

  <!-- Footer -->

  <div class="container-fluid" style="padding:30px; background-color: #043927;">
        <div class=" row" style="padding-top: 20px; text-align: center;">
    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
      <img src="../images/Icon/foodlogo.png" alt="">
      <div class="text-white">QuickCook</div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
      <h5 class="text-white" style="margin-bottom: 30px;">ព័ត៌មានបន្ថែម</h5>
      <p class="text-white">អាស័យដ្ឋាន៖ ផ្ទះលេខ១៣, ផ្លូវ12A, សង្កាត់ដង្កោ, ខណ្ណដង្កោ, រាជធានីភ្នំពេញ, កម្ពុជា</p>
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
      function foodInfo(){
          //Category
          var c = "<?php echo $food["Category"] ?>";
          if(c=="Food"){
            document.getElementById("dropdown-category").selectedIndex = "1";
            $('#dropdown-type').prop('disabled', false);
            $('#dropdown-type').html('');
            $('#dropdown-type').append(`<option value=""> -- សូមជ្រើសរើស -- </option>`); 
            $('#dropdown-type').append(`<option value="Water">ទឹក  </option>`); 
            $('#dropdown-type').append(`<option value="NoWater"> គោក </option>`);
          }
          else if(c=="Sweet"){
            document.getElementById("dropdown-category").selectedIndex = "2";
            $('#dropdown-type').prop('disabled', false);
            $('#dropdown-type').html('');
            $('#dropdown-type').append(`<option value=""> -- សូមជ្រើសរើស -- </option>`); 
            $('#dropdown-type').append(`<option value="Sweet"> បង្អែម  </option>`); 
            $('#dropdown-type').append(`<option value="Cake"> នំ </option>`); 
          }
          else if(c=="Drink"){
            document.getElementById("dropdown-category").selectedIndex = "3";
            $('#dropdown-type').prop('disabled', false);
            $('#dropdown-type').html('');
            $('#dropdown-type').append(`<option value=""> -- សូមជ្រើសរើស -- </option>`); 
            $('#dropdown-type').append(`<option value="Hot"> ក្ដៅ  </option>`); 
            $('#dropdown-type').append(`<option value="Ice"> ទឹកកក </option>`); 
            $('#dropdown-type').append(`<option value="Shake"> ក្រឡុក  </option>`); 
            $('#dropdown-type').append(`<option value="Juice"> ច្របាច់ </option>`); 
            $('#dropdown-type').append(`<option value="Simple"> ធម្មតា  </option>`);
          }
          //Type
          var t = "<?php echo $food["FoodType"] ?>";
          if(t=="Water" || t=="Sweet" || t=="Hot"){            
            document.getElementById("dropdown-type").selectedIndex = "1";
          }
          else if(t=="NoWater" || t=="Cake" || t=="Ice"){
            document.getElementById("dropdown-type").selectedIndex = "2";
          }
          else if(t=="Shake"){
            document.getElementById("dropdown-type").selectedIndex = "3";
          }
          else if(t=="Juice"){
            document.getElementById("dropdown-type").selectedIndex = "4";
          }
          else if(t=="Simple"){             
            document.getElementById("dropdown-type").selectedIndex = "5";
          }
          //Country
          var co = "<?php echo $food["Country"] ?>";
          if(co == "Khmer"){
            $('#dropdown-province').prop('disabled', false);
            document.getElementById("dropdown-country").selectedIndex = "1";
          }
          else if(co == "Foreign"){
            document.getElementById("dropdown-country").selectedIndex = "2";
          }
          else{
            document.getElementById("dropdown-country").selectedIndex = "0";
          }
          //Province
          var p = "<?php echo $food["Province"] ?>";   
          if(co == "Khmer"){ 
            document.getElementById("dropdown-province").value = p;
          }
          //Photo
          document.getElementById("txtPhoto").value = "<?php echo $fimage;?>";
          
      }

    $(document).ready(function () {
      $(document).on('change', '.btn-file :file', function () {
        var input = $(this),
          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
      });

      $('.btn-file :file').on('fileselect', function (event, label) {

        var input = $(this).parents('.input-group').find(':text'),
          log = label;

        if (input.length) {
          input.val(log);
        } else {
          if (log) alert(log);
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

      $("#imgInp").change(function () {
        readURL(this);
      });
    });


  </script>
</body>

</html>