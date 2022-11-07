<?php
    session_start(); // Starting Session

    if(isset($_SESSION['login_customer'])){ //if customer logged in
        header('location: index.php');
    }
    
    if(isset($_SESSION['login_manager'])){ //if manager logged in
        header('location: manager.php');
    }

    if(!isset($_SESSION['login_admin'])){ //if manager logged in
        header('location: index.php');
    }

    require 'connection.php';
        
    $conn = Connect();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>OFOS &#9824;</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">



    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

    <style>
        .modal-dialog {
            top: calc(30%);
        }
    </style>
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="200">
  
  <!-- <div class="site-wrap"> -->

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar py-3 js-site-navbar site-navbar-target" role="banner" id="site-navbar">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-11 col-xl-4 site-logo">
            <a href="admin.php" class="text-white h6 mb-0" style="color: #000000 !important">
                <?php
                    $username=$_SESSION['login_admin'];
                    echo "Welcome ".$username;
                ?>
            </a>
          </div>
          <div class="col-12 col-md-8 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li><a href="#section-add" class="nav-link" style="color: #212529 !important">Add Restaurant</a></li>
                <li><a href="logout.php" class="nav-link" style="color: #212529 !important">Logout</a></li>
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>
 

    <div  class="site-section"  style="padding-top: 10rem">
        <h1 class="text-center text-primary">
            Restaurants
        </h1>
        <table class="table table-striped table-hover container">
                        <tr>
                            <th>R_ID</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Phone_number</th>
                            <th>Action</th>
                        </tr>
            <?php
                $query="select * from restaurant order by restaurant.R_ID";
                $result = $conn->query($query);
                while($row=($result->fetch_assoc())){
                    echo    
                    '
                            <tr>
                                <td>'.$row['R_ID'].'</td>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['location'].'</td>
                                <td>'.$row['phone_number'].'</td>
                                <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#restaurant'.$row['R_ID'].'">
                                    EXPAND
                                </button>
                                </td>
                            </tr>
                    ';
                }
            ?>
        </table>
    </div>

    <?php
                $query="select * from restaurant";
                $result = $conn->query($query);
                while($row=($result->fetch_assoc())){
                    echo '
                        <div class="modal fade" id="restaurant'.$row['R_ID'].'" tabindex="-1" role="dialog" aria-labelledby="restaurantLabel'.$row['R_ID'].'">
                                    <div class="modal-dialog mw-100 w-75" role="document"  >
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title text-primary" id="restaurantLabel'.$row['R_ID'].'">MANAGERS OF RESTAURANT: '.$row['name'].'</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-striped table-hover container">
                                                <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Contact_no</th>
                                                <th>Action</th>
                                                </tr>
                            ';
                    $query = "select * from manager where R_ID='".$row['R_ID']."'";
                    $result_item = $conn->query($query);
                    while($row_item=($result_item->fetch_assoc())){
                        echo          
                                    '
                                                <tr>
                                                <td>'.$row_item['name'].'</td>
                                                <td>'.$row_item['email'].'</td>
                                                <td>'.$row_item['address'].'</td>
                                                <td>'.$row_item['contact_no'].'</td>
                                                <td>
                                                <a href="delete_manager_action.php?id='.$row_item['username'].'" type="button" class="btn btn-primary btn-sm text-white">Delete</a>
                                                </td>
                                                </tr>
                                    ';
                    }
                                     
                    echo 
                    '
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="delete_restaurant_action.php?id='.$row['R_ID'].'" type="button" class="btn btn-primary text-white">Delete Restaurant</a>
                                            <a href="add_manager.php?id='.$row['R_ID'].'" type="button" class="btn btn-primary text-white">Add Manager</a>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                    ' ;
                }
        ?>
    




    <div class="site-section" id="section-add">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 order-md-1" data-aos="fade-up">
                    <div class="text-left pb-1 border-primary mb-4">
                    <h2 class="text-primary">ADD RESTAURANT</h2>
                </div>
                <div id="customersignup">
                    <div class="row">
                        <div class="col-md-7">

                            <form action="add_restaurant_action.php" method="POST" enctype="multipart/form-data" class="p-5 bg-white">

                            <div class="row form-group">
                                <div class="col-md-12 mb-6 mb-md-0">
                                <label class="text-black" for="name">Name</label>
                                <input type="text" name="name"  id="name" class="form-control" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12 mb-6 mb-md-0">
                                <label class="text-black" for="location">Location</label>
                                <input type="text" name="location"  id="location" class="form-control" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12 mb-6 mb-md-0">
                                <label class="text-black" for="phone_number">Phone_number</label>
                                <input type="text" name="phone_number"  id="phone_number" class="form-control" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12 mb-6 mb-md-0">
                                <label class="text-black" for="phone_number">Image</label>
                                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                <input type="submit"  name="submit" value="ADD" class="btn btn-primary py-2 px-4 text-white">
                                </div>
                            </div>

                
                            </form>
                        </div>
                        <div class="col-md-5">
                            
                            <div class="p-4 mb-3 bg-white">
                            <p class="mb-0 font-weight-bold">Instructions</p>
                            <p class="mb-4">All Field are Compulsory</p>

                            <p class="mb-0 font-weight-bold">For Queries</p>
                            <p class="mb-4"><a href="#section-contact">Contact Us</a></p>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
    
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-5 mr-auto">
                <h2 class="footer-heading mb-4">About Us</h2>
                <p>This is an Online Food Ordering System, developed as a part of project of the Database Management System.</p>
              </div>
              
              
              <div class="col-md-6">
                <h2 class="footer-heading mb-4">Follow Us</h2>
                <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
            <form action="#" method="post">
              <div class="input-group mb-3">
                <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary text-white" type="button" id="button-addon2">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>
  <!-- </div> -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>