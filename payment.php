<?php
session_start();
require 'connection.php';
$conn = Connect();
if(!isset($_SESSION['login_customer'])){
header("location: index.php"); //Redirecting to myrestaurant Page
}
if(isset($_SESSION['login_manager'])){
  header("location: index.php"); //Redirecting to myrestaurant Page
}
if(isset($_SESSION['login_admin'])){
  header("location: index.php"); //Redirecting to myrestaurant Page
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
              <li><a href="customer.php" class="nav-link">Welcome, <?php echo $_SESSION["login_customer"]?></a></li>
                <li><a href="restaurant_choose.php"><span class="glyphicon glyphicon-shopping-cart"></span>Restaurants</a></li>
                <li><a href="logout.php" class="nav-link">Logout</a></li>
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>

    <div class="jumbotron" style="color: #FFFFFF; margin-bottom: 0rem; background: #333333; border-radius:0rem">
        <div class="container text-center">
            <h1>Choose your payment option</h1>     
        </div>
    </div>
    <br>

    <?php
        $g_total = 0;
        foreach($_SESSION["cart"] as $keys => $values) {
            $total = ($values["quantity"] * $values["price"]);
            $g_total = $g_total + $total;
        }
    ?>
    
    <div class="site-section" id="section-home" style="background-image: url(images/food_bg.jpg); background-size: cover; margin-top: -2rem">
        <div class="container">
            <div class="jumbotron" style="height: 10rem">
                <h1 class="text-center">Delivery Address: <?php if(isset($_POST["address"])) { echo $_POST["address"];} else {echo $_GET["address"];} ?></h1><br>
            </div>
            <div class="table-responsive" style="padding-left: 100px; padding-right: 100px;" >
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th width="40%">Food Name</th>
                        <th width="10%">Quantity</th>
                        <th width="20%">Price Details</th>
                        <th width="15%">Order Total</th>
                    </tr>
                </thead>
                <?php
                foreach($_SESSION["cart"] as $keys => $values) {
                ?>
                <tr style="background-color: #e9ecef">
                    <td><?php echo $values["name"]; ?></td>
                    <td><?php echo $values["quantity"] ?></td>
                    <td>&#8377; <?php echo $values["price"]; ?></td>
                    <td>&#8377; <?php echo number_format($values["quantity"] * $values["price"], 2); ?></td>
                </tr>
                <?php } ?>
            </table>
            </div>
            <h1 class="text-center" style="color: #e9ecef">Grand Total: &#8377;<?php echo "$g_total"; ?>/-</h1>
                <h5 class="text-center" style="color: #e9ecef">including all service charges. (no delivery charges applied)</h5>
                <br>
                <h1 class="text-center">
                <a href="cart.php?rid=<?php echo $_SESSION["cart"][0]["R_ID"]; ?>"><button class="btn btn-warning"><span class="glyphicon glyphicon-circle-arrow-left"></span> Go back to cart</button></a>
                <button class="btn btn-success" data-toggle="modal" data-target="#onlineod"><span class="glyphicon glyphicon-"></span> Pay Online</button>
                <a href="cashpay.php?address=<?php if(isset($_POST["address"])) { echo $_POST["address"];} else {echo $_GET["address"];} ?>"><button class="btn btn-success"><span class="glyphicon glyphicon-"></span> Cash On Delivery</button></a>
            </h1>
        </div>
    </div>

    <div class="modal" id="onlineod" tabindex="-1" role="dialog" style="margin-top: 10rem">
        <div class="modal-dialog mw-100 w-75" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-primary">Online Payment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="credit-card-div">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">

                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <h5 class="text-muted"> Credit Card Number</h5>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <input type="text" class="form-control" placeholder="0000" maxlength = "4" required >
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <input type="text" class="form-control" placeholder="0000" maxlength = "4" required >
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <input type="text" class="form-control" placeholder="0000" maxlength = "4" required >
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <input type="text" class="form-control" placeholder="0000" maxlength = "4" required >
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row ">
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <span class="help-block text-muted small-font"> Expiry Month</span>
                                                    <input type="text" class="form-control" placeholder="MM" maxlength = "2" required >
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <span class="help-block text-muted small-font">  Expiry Year</span>
                                                    <input type="text" class="form-control" placeholder="YY" maxlength = "2" required >
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <span class="help-block text-muted small-font">  CVV</span>
                                                    <input type="text" class="form-control" placeholder="CVV" maxlength = "3" required >
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-3"><br>
                                                    <img src="images/creditcard.png" class="img-rounded" style="height: 40px">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row ">
                                                <div class="col-md-12 pad-adjust">

                                                    <input type="text" class="form-control" placeholder="Name On The Card" required >
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row ">
                                                <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                                                <a href="payment.php?address=<?php if(isset($_POST["address"])) { echo $_POST["address"];} else {echo $_GET["address"];} ?>"><input type="submit" class="btn btn-danger btn-block" value="CANCEL" required="" /></a>   
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                                                <a href="onlinepay.php?address=<?php if(isset($_POST["address"])) { echo $_POST["address"];} else {echo $_GET["address"];} ?>"><input type="submit" class="btn btn-success btn-block" value="PAY NOW" required="" /></a>  
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
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