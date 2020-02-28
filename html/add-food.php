<?php

    $name = isset($_POST['txtFoodName']) ? $_POST['txtFoodName'] : '';
    $category = isset($_POST['txtFoodName']) ? $_POST['txtFoodName'] : '';
    $name = isset($_POST['txtFoodName']) ? $_POST['txtFoodName'] : '';
    $name = isset($_POST['txtFoodName']) ? $_POST['txtFoodName'] : '';
    $name = isset($_POST['txtFoodName']) ? $_POST['txtFoodName'] : '';
    $name = isset($_POST['txtFoodName']) ? $_POST['txtFoodName'] : '';


    //connect to database
    include '../php/connectToDb.php';
    $obj = new DB();
    $con = $obj->conDb();
    
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
</style>

<body>
  <!-- Menu-bar -->
  <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #043927;">
    <a class="navbar-brand" href="#">
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
            <a class="dropdown-item" href="../index.html">ទំព័រដើម</a>
            <a class="dropdown-item" href="about.html">អំពីពួកយើង</a>
            <a class="dropdown-item" href="#">ទំនាក់ទំនង</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="food.html">ម្ហូប</a>
            <a class="dropdown-item" href="sweet.html">បង្អែម</a>
            <a class="dropdown-item" href="drink.html">ភេសជ្ជ:</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">បន្ថែមមុខម្ហូប</a>
            <a class="dropdown-item" href="#">រដ្ឋបាល</a>
          </div>
        </li>
        <li class="nav-item ab">
          <a class="nav-link text-white" href="#">ចូលប្រើ</a>
        </li>

        <li class="nav-item ab">
          <a class="nav-link text-white" href="#">ចុះឈ្មោះ</a>
        </li>

      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2 searchme" type="search" placeholder="ឈ្មោះម្ហូបស្វែងរក" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0 text-white" type="submit">ស្វែងរក</button>
      </form>
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

  <form action="../php/add-food.php" method="post" enctype='multipart/form-data'>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12 col-12">
        <!-- <a href=""><img src="../images/addfood.png" alt="" class="img-fluid img-thumbnail addfoodphoto"></a> -->
        <div class="form-group">
          <!-- <label>ផុសរូបភាព</label> -->
          <div class="input-group">
            <span class="input-group-btn">
              <span class="btn btn-primary btn-file">
                ដាក់រូបភាព..<input type="file" id="imgInp" name="photo1">
              </span>
            </span>
            <input type="text" class="form-control" readonly style="font-family: KhmerOSbattambang;">
          </div>
          <div class="img-fluid img-thumbnail box-photo-upload">
            <!-- <img src="../images/addfood.png" alt="" class="img-fluid img-thumbnail addfoodphoto img-hide"> -->
            <img src="../images/Icon/addfood.png" id='img-upload' />
            <!-- <h1 class="text-hide" style="background-image: url('/docs/4.0/assets/brand/bootstrap-solid.svg');">Bootstrap</h1> -->
          </div>

        </div>

      </div>
      
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
          <div class="form-group">
            <label for="name">ឈ្មោះ <b>*</b></label>
            <input type="text" class="form-control searchme" id="txtFoodName" name="txtFoodName"
              placeholder="ឈ្មោះម្ហូប" autofocus required>
          </div>
          <div class="form-group searchme">
            <label for="type">ប្រភេទ <b>*</b></label> <br>
            <select name="dropdown-type" id="dropdown-type" class="form-control" disabled>
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
            <label for="catalog">ផ្នែក <b>*</b></label> <br>
            <select name="dropdown-catalog" id="dropdown-catalog" class="form-control">
              <option value="">-- សូមជ្រើសរើស --</option>
              <option value="Food">ម្ហូប</option>
              <option value="Sweet">បង្អែម</option>
              <option value="Drink">ភេសជ្ជៈ</option>
            </select>
          </div>
          <div class="form-group searchme">
            <label for="country">ប្រទេស <b>*</b></label> <br>
            <select name="dropdown-country" id="dropdown-country" class="form-control">
              <option value="">-- សូមជ្រើសរើស --</option>
              <option value="Khmer">ខ្មែរ</option>
              <option value="Foreign">បរទេស</option>
            </select>
          </div>
          <div class="form-group">
            <label for="country">តំណភ្ជាប់ទៅកាន់យូធូប</label>
            <input type="text" class="form-control searchme" id="txtLink" name="txtLink" placeholder="">
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
            <tr>​
              <td>
                <input type="text" class="form-control" value="1" name="zzzzzzzz"/>
              </td>
              <td>
                <input type="text" class="form-control" id="ingredient1" name="ingredient1" />
              </td>
              <td>
                <input type="text" class="form-control" name="qty1" />
              </td>
              <td style="text-align: center;">
                <button type="button" class="btn btn-danger form-control"><i class="fa fa-minus-circle"></i></button>
              </td>
              <td style="text-align: center;">
                <button type="button" class="btn btn-success form-control"><i class="fa fa-plus-circle"></i></button>
              </td>
            </tr>
            <tr>
              <td>
                <input type="text" class="form-control" value="2" name="numberIn"/>
              </td>
              <td>
                <input type="text" class="form-control" id="ingredient" name="ingredient2"
                  onClick="addNewIngredient()" />
              </td>
              <td>
                <input type="text" class="form-control" name="qty2" />
              </td>
              <td style="text-align: center;">
                <button type="button" class="btn btn-danger form-control"><i class="fa fa-minus-circle"></i></button>
              </td>
              <td style="text-align: center;">
                <button type="button" class="btn btn-success form-control" onClick="addNewIngredient()"><i
                    class="fa fa-plus-circle"></i></button>
              </td>
            </tr>
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
        <table class="table">
          <thead>
            <tr class="thead-light">
              <th scope="col" style="width: 5.5%;">#</th>
              <th scope="col" style="width: 70.5%">ពណ៌នា</th>
              <th scope="col" style="width: 10%;">លុបចោល</th>
              <th scope="col" style="width: 10%;">ធ្វើឡើងវិញ</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <input type="text" class="form-control" value="1" />
              </td>
              <td>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                  style="resize: none;"></textarea>
              </td>
              <td style="text-align: center;">
                <button type="button" class="btn btn-danger form-control"><i class="fa fa-minus-circle"></i></button>
              </td>
              <td style="text-align: center;">
                <button type="button" class="btn btn-success form-control"><i class="fa fa-undo"></i></button>
              </td>
            </tr>
            <tr>
              <td>
                <input type="text" class="form-control" value="2" />
              </td>
              <td>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                  style="resize: none;"></textarea>
              </td>
              <td style="text-align: center;">
                <button type="button" class="btn btn-danger form-control"><i class="fa fa-minus-circle"></i></button>
              </td>
              <td style="text-align: center;">
                <button type="button" class="btn btn-success form-control"><i class="fa fa-undo"></i></button>
              </td>
            </tr>
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
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"
          style="resize: none; font-family: KhmerOSbattambang;"></textarea>
      </div>
    </div>

    <div class="text-right" style="margin-top: 30px; margin-bottom: 50px;">
      <button type="submit" class="btn btn-primary">ដាក់ស្នើ</button>
    </div>

  </div>
  </form>
  <!-- End-Add-Food-Body -->

  <!-- Footer -->

  <div class="container-fluid" style="padding:30px; background-color: #043927;"">
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