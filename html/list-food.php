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
</style>
<body>
    <!-- Menu-bar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #043927;">
        <a class="navbar-brand" href="#">
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
                    <a class="dropdown-item" href="../index.html">ទំព័រដើម</a>
                    <a class="dropdown-item" href="about.html">អំពីពួកយើង</a>
                    <a class="dropdown-item" href="#">ទំនាក់ទំនង</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="food.html">ម្ហូប</a>
                  <a class="dropdown-item" href="sweet.html">បង្អែម</a>
                  <a class="dropdown-item" href="drink.html">ភេសជ្ជ:</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="add-food.php">បន្ថែមមុខម្ហូប</a>
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
        <div class="row menu-right">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
              <div style="float: right; padding-right: 10px;"><a href="../html/list-food.php" class="text-success"><h6>បញ្ជីម្ហូប</h6></a></div>
              <div style="float: right;"><a href="../html/add-food.php" class="text-primary"><h6>បន្ថែមម្ហូប</h6></a></div>
            </div> 
          </div>   
    
       <div class="row food-large-title">
           <div class="col-lg-1 col-md-2 col-sm-4 col-12" style="padding-left: 0;">
            <div class="dropdown">
                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:2px solid white;">
                  ទាំងអស់
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">ទាំងអស់</a>
                  <a class="dropdown-item" href="#">ម្ហូប</a>
                  <a class="dropdown-item" href="#">បង្អែម</a>
                  <a class="dropdown-item" href="#">ភេសជ្ជ:</a>
                </div>
              </div>
           </div>
    
           
             <div class="col-lg-1 col-md-2 col-sm-4 col-12">
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:2px solid white;">
                        ទាំងអស់
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">ទាំងអស់</a>
                      <a class="dropdown-item" href="#">រងចាំការត្រួតពិនិត្យ<span style='color: blue;'>&nbsp;&#9679;</span></a>
                      <a class="dropdown-item" href="#">យល់ព្រម<span style='color: green;'>&nbsp;&#9679;</span></a>
                      <a class="dropdown-item" href="#">បដិសេធ<span style='color: red;'>&nbsp;&#9679;</span></a>
                    </div>
                  </div>
             </div>


           <div class="col-lg-10 col-md-8 col-sm-4 col-12">
               <h4 class="text-right">ទាំងអស់</h4>
           </div>
           
       </div> 
        <!-- end-side-nav -->

        <!-- Food-all-here -->
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 card foodcard">
                        <div class="food-div">
                            <a href="../html/food-detail.html"><img class="card-img-top" src="../images/chicken.jpg"></a>
                        </div>
                        <a href="../html/food-detail.html"><h6 class="text-center">ស្លាបមាន់បំពងល្ងស</h6></a>
                        <span style='color: blue;' class="text-right">&nbsp;&#9679;</span>
                        
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 card foodcard">
                        <div class="food-div">
                            <a target="_blank"><img class="card-img-top" src="../images/soup.jpg"></a>
                        </div>
                        <a href="../html/food-detail.html"><h6 class="text-center">ស្លាបមាន់បំពងល្ងស</h6></a>
                        <span style='color: blue;' class="text-right">&nbsp;&#9679;</span>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 card foodcard">
                        <div class="food-div">
                            <a target="_blank"><img class="card-img-top" src="../images/papaya.jpg"></a>
                        </div>
                        <a href="../html/food-detail.html"><h6 class="text-center">ស្លាបមាន់បំពងល្ងស</h6></a>
                        <span style='color: blue;' class="text-right">&nbsp;&#9679;</span>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 card foodcard">
                        <div class="food-div">
                            <a target="_blank"><img class="card-img-top" src="../images/papaya.jpg"></a>
                        </div>
                        <a href="../html/food-detail.html"><h6 class="text-center">ស្លាបមាន់បំពងល្ងស</h6></a>
                        <span style='color: blue;' class="text-right">&nbsp;&#9679;</span>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 card foodcard">
                        <div class="food-div">
                            <a target="_blank"><img class="card-img-top" src="../images/papaya.jpg"></a>
                        </div>
                        <a href="../html/food-detail.html"><h6 class="text-center">ស្លាបមាន់បំពងល្ងស</h6></a>
                        <span style='color: blue;' class="text-right">&nbsp;&#9679;</span>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 card foodcard">
                        <div class="food-div">
                            <a target="_blank"><img class="card-img-top" src="../images/papaya.jpg"></a>
                        </div>
                        <a href="../html/food-detail.html"><h6 class="text-center">ស្លាបមាន់បំពងល្ងស</h6></a>
                        <span style='color: blue;' class="text-right">&nbsp;&#9679;</span>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 card foodcard">
                      <div class="food-div">
                          <a target="_blank"><img class="card-img-top" src="../images/papaya.jpg"></a>
                      </div>
                      <a href="../html/food-detail.html"><h6 class="text-center">ស្លាបមាន់បំពងល្ងស</h6></a>
                      <span style='color: blue;' class="text-right">&nbsp;&#9679;</span>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 col-12 card foodcard">
                      <div class="food-div">
                          <a target="_blank"><img class="card-img-top" src="../images/soup.jpg"></a>
                      </div>
                      <a href="../html/food-detail.html"><h6 class="text-center">ស្លាបមាន់បំពងល្ងស</h6></a>
                      <span style='color: blue;' class="text-right">&nbsp;&#9679;</span>
                  </div>

                  <div class="col-lg-4 col-md-6 col-sm-12 col-12 card foodcard">
                    <div class="food-div">
                        <a target="_blank"><img class="card-img-top" src="../images/papaya.jpg"></a>
                    </div>
                    <a href="../html/food-detail.html"><h6 class="text-center">ស្លាបមាន់បំពងល្ងស</h6></a>
                    <span style='color: blue;' class="text-right">&nbsp;&#9679;</span>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12 card foodcard">
                    <div class="food-div">
                        <a target="_blank"><img class="card-img-top" src="../images/soup.jpg"></a>
                    </div>
                    <a href="../html/food-detail.html"><h6 class="text-center">ស្លាបមាន់បំពងល្ងស</h6></a>
                    <span style='color: blue;' class="text-right">&nbsp;&#9679;</span>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 col-12 card foodcard">
                  <div class="food-div">
                      <a target="_blank"><img class="card-img-top" src="../images/papaya.jpg"></a>
                  </div>
                  <a href="../html/food-detail.html"><h6 class="text-center">ស្លាបមាន់បំពងល្ងស</h6></a>
                  <span style='color: blue;' class="text-right">&nbsp;&#9679;</span>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12 col-12 card foodcard">
                  <div class="food-div">
                      <a target="_blank"><img class="card-img-top" src="../images/soup.jpg"></a>
                  </div>
                  <a href="../html/food-detail.html"><h6 class="text-center">ស្លាបមាន់បំពងល្ងស</h6></a>
                  <span style='color: blue;' class="text-right">&nbsp;&#9679;</span>  
              </div>
                </div>
        <!-- End-Food-All -->


          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 total-food">
                <p>ចំនួនមុខម្ហូបសរុប៖ 15/300</p>
            </div>
        </div>

          <div class="row" style="margin-top: 30px;">
              <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <nav aria-label="Fodd Page navigation">
                    <ul class="pagination justify-content-center pagination pagination-lg">
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                          <span class="sr-only">Previous</span>
                        </a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                          <span class="sr-only">Next</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
              </div>
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

    
</body>
</html>