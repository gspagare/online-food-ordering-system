<?php
    session_start();
    if(isset($_SESSION['login_customer'])){ //if customer logged in
      header('location: restaurant_choose.php');
    }

    if(isset($_SESSION['login_manager'])){ //if manager logged in
      header('location: manager.php');
    }
    if(isset($_SESSION['login_admin'])){ //if manager logged in
      header('location: admin.php');
    }
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
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="200">


    <script type="text/javascript">
        window.onload = function()
        {
            myfunction()
        };

        function myfunction() {
            document.getElementById("customersignup").style.display = "block";
            document.getElementById("customerlogin").style.display = "none";
        }

        function myfunction1() {
            document.getElementById("customerlogin").style.display = "block";
            document.getElementById("customersignup").style.display = "none";
        }
    </script>
  
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
          
          <div class="col-11 col-xl-2 site-logo">
            <h1 class="mb-0"><a href="index.php" class="text-white h2 mb-0">OFOS</a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li><a href="#section-home" class="nav-link">Home</a></li>
                <li class="has-children">
                  <a href="#section-about" class="nav-link">About Us</a>
                  <ul class="dropdown">
                    <li><a href="#section-how-it-works" class="nav-link">How It Works</a></li>
                    <li><a href="#section-our-team" class="nav-link">Our Team</a></li>
                  </ul>
                </li>
                <li><a href="#section-login" class="nav-link" onclick="myfunction()">SignUp</a></li>
                <li class="has-children">
                  <a href="#" class="nav-link">Login</a>
                  <ul class="dropdown">
                    <li><a href="#section-login" class="nav-link" onclick="myfunction1()">Customer</a></li>
                    <li><a href="manager_login.php" class="nav-link">Manager</a></li>
                    <li><a href="admin_login.php" class="nav-link">Admin</a></li>
                  </ul>
                </li>
                
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>

  

    <div class="site-blocks-cover overlay" style="background-image: url(images/food_bg.jpg);" data-aos="fade" data-stellar-background-ratio="0.5" id="section-home">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
            

            <h1 class="text-white font-weight-light text-uppercase font-weight-bold" data-aos="fade-up">Online Food Ordering System</h1>
            <p data-aos="fade-up" data-aos-delay="200"><a href="#section-login" class="btn btn-primary py-3 px-5 text-white">Order Now</a></p>

          </div>
        </div>
      </div>
    </div>  

    <div class="site-section" id="section-login">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 order-md-1" data-aos="fade-up">
                    <div class="text-left pb-1 border-primary mb-4">
                    <h2 class="text-primary">Login / SignUp</h2>
                </div>
                <div id="customersignup">
                    <div class="row">
                        <div class="col-md-7">

                            <form action="customer_signup_action.php" method="POST" class="p-5 bg-white">
                        
                            <div class="row form-group">
                                <div class="col-md-12 mb-6 mb-md-0">
                                <label class="text-black" for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12 mb-6 mb-md-0">
                                <label class="text-black" for="password">Password</label>
                                <input type="password" name="password"  id="password" class="form-control" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12 mb-6 mb-md-0">
                                <label class="text-black" for="name">Name</label>
                                <input type="text" name="name"  id="name" class="form-control" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                
                                <div class="col-md-12">
                                <label class="text-black" for="email">Email</label> 
                                <input type="email" name="email"  id="email" class="form-control" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                
                                <div class="col-md-12">
                                <label class="text-black" for="contact_no">Contact No</label> 
                                <input type="text" name="contact_no"  id="contact_no" class="form-control" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                
                                <div class="col-md-12">
                                <label class="text-black" for="address">Address</label> 
                                <input type="text" name="address"  id="address" class="form-control" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                <input type="submit"  name="submit" value="SIGNUP" class="btn btn-primary py-2 px-4 text-white">
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
                            
                            <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3">Already a User?</h3>
                            <p><a href="#section-login" class="btn btn-primary px-4 py-2 text-white" onclick="myfunction1()">LOGIN</a></p>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="customerlogin">
                    <div class="row">
                        <div class="col-md-7 mb-5">

                            

                            <form role="form" action="customer_login_action.php" method="POST" class="p-5 bg-white">
                        
                            <div class="row form-group">
                                <div class="col-md-12 mb-6 mb-md-0">
                                <label class="text-black" for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12 mb-6 mb-md-0">
                                <label class="text-black" for="password">Password</label>
                                <input type="password"  name="password" id="password" class="form-control" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                <input type="submit" name="submit" value="LOGIN" class="btn btn-primary py-2 px-4 text-white">
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
                            
                            <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3">New User?</h3>
                            <p><a href="#section-login" class="btn btn-primary px-4 py-2 text-white" onclick="myfunction()">SIGNUP</a></p>
                            </div>

                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <div class="site-section bg-image overlay" style="background-image: url('images/food_bg.jpg');" id="section-how-it-works">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary" data-aos="fade">How It Works</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
            <div class="how-it-work-item">
              <span class="number">1</span>
              <div class="how-it-work-body">
                <h2>Login Or SignUp</h2>
                <p class="mb-5">Login into the system using your username and password or signup if this if your first time. </p>
                <!-- <ul class="ul-check list-unstyled success">
                  <li class="text-white">Error minus sint nobis dolor</li>
                  <li class="text-white">Voluptatum porro expedita labore esse</li>
                  <li class="text-white">Voluptas unde sit pariatur earum</li>
                </ul> -->
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
            <div class="how-it-work-item">
              <span class="number">2</span>
              <div class="how-it-work-body">
                <h2>Choose Restaurant And Make An Order</h2>
                <p class="mb-5">Select the Restaurant from which you want to order.</p>
                <p class="mb-5">Choose you favourite dishes from the Restaurant and place the order</p>
                <!-- <ul class="ul-check list-unstyled success">
                  <li class="text-white">Error minus sint nobis dolor</li>
                  <li class="text-white">Voluptatum porro expedita labore esse</li>
                  <li class="text-white">Voluptas unde sit pariatur earum</li>
                </ul> -->
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="300">
            <div class="how-it-work-item">
              <span class="number">3</span>
              <div class="how-it-work-body">
                <h2>Make Payment And Track Order</h2>
                <p class="mb-5">Pay for your order and then track your order to see its current status and hold tight until it reaches you. </p>
                <!-- <ul class="ul-check list-unstyled success">
                  <li class="text-white">Error minus sint nobis dolor</li>
                  <li class="text-white">Voluptatum porro expedita labore esse</li>
                  <li class="text-white">Voluptas unde sit pariatur earum</li>
                </ul> -->
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="site-section border-bottom" id="section-our-team">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary" data-aos="fade">Our Team</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
            <div class="person">
              <img src="images/kumar_abhishek.jpg" alt="Image" class="img-fluid rounded mb-5 w-75 rounded-circle">
              <h3>Kumar Abhishek</h3>
              <p class="position text-muted">Roll No: 17CS10022</p>
              <ul class="ul-social-circle">
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-linkedin"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
            <div class="person">
              <img src="images/gurjot_singh_suri.jpg" alt="Image" class="img-fluid rounded mb-5 w-75 rounded-circle">
              <h3>Gurjot Singh Suri</h3>
              <p class="position text-muted">Roll No: 17CS10058</p>
              <ul class="ul-social-circle">
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-linkedin"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="300">
            <div class="person">
              <img src="images/aditya_sawant.jpg" alt="Image" class="img-fluid rounded mb-5 w-75 rounded-circle">
              <h3>Aditya Sawant</h3>
              <p class="position text-muted">Roll No: 17CS10060</p>
              <ul class="ul-social-circle">
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-linkedin"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="300">
            <div class="person">
              <img src="images/faraaz_mallick.png" alt="Image" class="img-fluid rounded mb-5 w-75 rounded-circle">
              <h3>Faraaz Rehman Mallick</h3>
              <p class="position text-muted">Roll No: 17CS30043</p>
              <ul class="ul-social-circle">
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-linkedin"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
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
              
              <div class="col-md-3">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#section-login">Login / SignUp</a></li>
                  <li><a href="#section-how-it-works">How It Works</a></li>
                  <li><a href="#section-our-team">Our Team</a></li>
                </ul>
              </div>
              <div class="col-md-3">
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