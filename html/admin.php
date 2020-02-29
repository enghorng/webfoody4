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
</style>
<body>
    <!-- Menu-bar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #043927;">
        <a class="navbar-brand" href="#">
            <img src="../images/foodlogo.png" alt="">
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
                    <a class="dropdown-item" href="../index.html">ទំព័រដើម</a>
                    <a class="dropdown-item" href="about.html">អំពីពួកយើង</a>
                    <a class="dropdown-item" href="#">ទំនាក់ទំនង</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="food.html">ម្ហូប</a>
                  <a class="dropdown-item" href="sweet.html">បង្អែម</a>
                  <a class="dropdown-item" href="drink.html">ភេសជ្ជ:</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="add-food.html">បន្ថែមមុខម្ហូប</a>
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
                                    <a class="nav-link" href="#" ><span>បង្កើតគណនីយថ្មី</span></a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li class="nav-item">
                                    <a class="nav-link" href="../html/user-info.html" ><span>ព័ត៌មានអ្នកប្រើប្រាស់</span></a>
                                </li>
                            </ul>
                        </div>
                </li>
                <div class="dropdown-divider"></div>
                <li class="nav-item"><a class="nav-link text-truncate" href="../html/admin-food.html">ម្ហូប</a></li>
                <div class="dropdown-divider"></div>
                <li class="nav-item"><a class="nav-link text-truncate" href="../html/admin-request.html">ការស្នើសុំ</a></li>
                <div class="dropdown-divider"></div>
            </ul>
        </div>
        <!-- End-Col-1 -->
        
        <!-- col2 -->
        <div class="col-lg-10 col-md-8 col-sm-7 col-7" style="padding-top: 40px; padding-left: 100px;">
            <form action="">
                    <div class="form-group row searchme">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12 form-group required">
                            <label class="col-form-label control-label">ឈ្មោះ</label>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                            <input type="text" class="form-control" placeholder="នាមខ្លួន"/>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <input type="text" class="form-control"​ placeholder="នាមត្រកូល"/>
                        </div>
                    </div>

                    <div class="form-group row searchme">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12 form-group required">
                            <label class="col-form-label">ភេទ</label>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                            <input type="radio" name="gender" value="Male"/>
                            <label class="col-form-label">ប្រុស</label>
                        </div>
                        <div class="col-lg-7 col-md-6 col-sm-6 col-6">
                            <input type="radio" name="gender" value="Female"/>
                            <label class="col-form-label">ស្រី</label>
                        </div>
                    </div>

                    <div class="form-group row searchme">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12 form-group required">
                            <label class="col-form-label control-label">អ៊ីម៉ែល</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                            <input type="email" class="form-control" placeholder="example@gmail.com"/>
                        </div>
                    </div>

                    <div class="form-group row searchme">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12 form-group required">
                            <label class="col-form-label control-label">លេខសម្ងាត់</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                            <input type="password" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group row searchme">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12 form-group required">
                            <label class="col-form-label control-label">ផ្ទៀងផ្ទាត់លេខសម្ងាត់</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                            <input type="password" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group row searchme">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12 form-group required">
                            <label class="col-form-label control-label">លេខទូរស័ព្ទ</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                            <input type="number" class="form-control"/>
                        </div>
                    </div>

                    <div class="text-right" style="margin-top: 30px; padding-bottom: 30px;">
                        <button type="submit" class="btn btn-primary">បង្កើត</button>
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
                <img src="../images/foodlogo.png" alt="">
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

    
</body>
</html>