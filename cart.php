<?php
session_start();
require 'connection.php';
$conn = Connect();
if(!isset($_SESSION['login_customer'])){
    header("location: index.php"); //Redirecting to myrestaurant Page
}
if(isset($_SESSION['login_manager'])){
    header("location: manager.php"); //Redirecting to myrestaurant Page
}
if(isset($_SESSION['login_admin'])){
    header("location: admin.php"); //Redirecting to myrestaurant Page
}
?>

<?php
    if(isset($_GET["action"])) {
        if($_GET["action"] == "delete") {
            $cnt = 0;
            $pos = 0;
            $RID = "hello";
            foreach($_SESSION["cart"] as $keys => $values) {
                $RID = $values["R_ID"];
                if($values["item_ID"] == $_GET["id"]) {
                    $pos = $cnt;
                }
                $cnt = $cnt + 1;
            }
            $count = count($_SESSION["cart"]);
            while($pos < ($count - 1)) {
                $_SESSION["cart"][$pos] = $_SESSION["cart"][$pos+1];
                $pos = $pos + 1;
            }
            unset($_SESSION["cart"][$pos]);
            echo '<script>window.location="cart.php?rid='.$_GET["rid"].'"</script>';
        }
    }

    if(isset($_GET["action"])) {
        if($_GET["action"] == "empty") {
            foreach($_SESSION["cart"] as $keys => $values) {
                $RID = $values["R_ID"];
                unset($_SESSION["cart"]);
                echo '<script>window.location="cart.php?rid='.$_GET["rid"].'"</script>';

            }
        }
    }

    if(!isset($_GET["rid"])) {
        unset($_SESSION["cart"]);
        header("location: restaurant_choose.php");
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
                <li><a href="restaurant.php?rid=<?php echo $_GET["rid"]; ?>"><span class="glyphicon glyphicon-shopping-cart"></span> Cart  (<?php
                if(isset($_SESSION["cart"])){
                    $count = count($_SESSION["cart"]); 
                    echo "$count"; 
                } else
                    echo "0";
                ?>) </a></li>
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
            <h1>Cart</h1>      
        </div>
    </div>

    <div class="site-section" style="background-image: url(images/food_bg.jpg); background-size: cover;" id="section-home">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center" data-aos="fade-up" data-aos-delay="400">

            <div class="col-md-12">
            <?php
                if(!empty($_SESSION["cart"])) {
            ?>
                <div class="container">
                    <div class="jumbotron" style="margin-top: 4rem">
                        <h1 style="color: rgb(77,77,77) !important">Your Shopping Cart</h1>
                        <p style="color: rgb(77,77,77) !important">Looks tasty...!!!</p>
                    </div>
                </div>
                <div class="table-responsive" style="padding-left: 100px; padding-right: 100px;" >
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th width="40%">Food Name</th>
                                <th width="10%">Quantity</th>
                                <th width="20%">Price Details</th>
                                <th width="15%">Order Total</th>
                                <th width="5%">Action</th>
                            </tr>
                        </thead>

            <?php  

                $total = 0;
                foreach($_SESSION["cart"] as $keys => $values) {
            ?>
                <tr style="background-color: #e9ecef">
                    <td><?php echo $values["name"]; ?></td>
                    <td><?php echo $values["quantity"] ?></td>
                    <td>&#8377; <?php echo $values["price"]; ?></td>
                    <td>&#8377; <?php echo number_format($values["quantity"] * $values["price"], 2); ?></td>
                    <td><a href="cart.php?action=delete&id=<?php echo $values["item_ID"]; ?>&rid=<?php echo $_GET["rid"]; ?>"><span class="text-danger">Remove</span></a></td>
                </tr>
            <?php 
                $total = $total + ($values["quantity"] * $values["price"]);
                }
            ?>
                <tr style="color: #FFFFFF; background-color: #212529">
                    <td colspan="3" align="right">Total</td>
                    <td align="right">&#8377; <?php echo number_format($total, 2); ?></td>
                    <td></td>
                </tr>
            </table>
            <?php
                echo '<a href="cart.php?action=empty&rid='.$_GET["rid"].'"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Empty Cart</button></a>&nbsp;<a href="restaurant.php?rid='.$_GET["rid"].'"><button class="btn btn-warning">Continue Shopping</button></a>&nbsp;<button class="btn btn-success pull-right" data-toggle="modal" data-target="#placeorder"><span class="glyphicon glyphicon-share-alt"></span> Check Out</button>';
            ?>

        </div>
        <br><br><br><br><br><br><br>
        <?php
            }
            if(empty($_SESSION["cart"])) {
        ?>
                <div class="container">
                    <div class="jumbotron" style="margin-top: 4rem">
                        <h1 style="color: rgb(77,77,77) !important">Your Shopping Cart</h1>
                        <p style="color: rgb(77,77,77) !important">Oops! We can't smell any food here. Go back and <a href="restaurant.php?rid=<?php echo $_GET["rid"]; ?>">order now.</a></p>
                        
                    </div>
                    
                </div>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <?php
        }
        ?>

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
    
            <div class="modal" id="placeorder" tabindex="-1" role="dialog" style="margin-top: 10rem">
                <div class="modal-dialog mw-100 w-75" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-primary">Delivery Address</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="payment.php" method="POST" class="p-5 bg-white">
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <h4 class="text-primary">Type or Choose Address</h4>
                                        <input type="text" name="address" id="address" list="chooseaddress" style="height: 5rem" class="form-control" required>
                                        <datalist id="chooseaddress">
                                            <?php
                                                $username = $_SESSION['login_customer'];
                                                $address_query = "select * from address where username='".$username."'";
                                                $result = mysqli_query($conn, $address_query);
                                                while($add_row = mysqli_fetch_assoc($result)) {
                                                    echo '<option value="'.$add_row["address"].'">'.$add_row["address"].'</option>';
                                                }
                                            ?>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" value="Place Order" class="btn btn-success">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

  </body>
</html>