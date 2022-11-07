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

unset($_SESSION["cart"]);
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
        .overlay {
          position: fixed;
          display: none;
          width: 100%;
          height: 100%;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: rgba(0,0,0,0.5);
          z-index: 2;
          cursor: pointer;
        }

        .myclass{
          position: absolute;
          top: 50%;
          left: 50%;
          font-size: 50px;
          color: white;
          transform: translate(-50%,-50%);
          -ms-transform: translate(-50%,-50%);
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
          
          <div class="col-11 col-xl-2 site-logo">
            <h1 class="mb-0"><a href="index.php" class="text-white h2 mb-0">OFOS</a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li><a href="customer.php" class="nav-link">Welcome, <?php echo $_SESSION["login_customer"]?></a></li>
                <li><a href="#" class="nav-link" data-toggle="modal" data-target="#add_address">+ Address</a></li>
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

    <?php
        if(isset($_SESSION["login_customer"])) {
            $username = $_SESSION["login_customer"];
            $query = "select * from customer where username='".$username."'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $name = $row["name"];
        }

    ?>

    <div class="jumbotron" style="color: #FFFFFF; margin-bottom: 0rem; background: #333333; border-radius:0rem">
        <div class="container text-center">
            <h1>Hi! <?php echo $name ?></h1>      
        </div>
    </div>

    <div class="site-section" id="section-home" style="background-image: url(images/food_bg.jpg); background-size: cover;">
      <div class="container">
      <div class="row align-items-center justify-content-center text-center">

        <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">
            <div class="container">
                <div class="jumbotron">
                    <h1>Pending Orders</h1>
                </div>
            </div>
            <div class="table-responsive" style="padding-left: 100px; padding-right: 100px;" >
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th width="10%">Order ID</th>
                            <th width="40%">Restaurant</th>
                            <th width="20%">Date Of Order</th>
                            <th width="15%">Order Total</th>
                        </tr>
                    </thead>

        <?php  
            $username = $_SESSION["login_customer"];
            $query = "select * from orders where username='".$username."' and order_status='PLACED' order by order_date desc";
            $result = mysqli_query($conn,$query);
            if($result) {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
                  <tr style="background-color: #e9ecef">
                      <td><?php echo $row["order_ID"]; ?></td>
                      <?php $query1 = "select name from restaurant where R_ID=".$row["R_ID"].""; $res = mysqli_query($conn,$query1); $res_name = mysqli_fetch_assoc($res); ?>
                      <td><?php echo $res_name["name"] ?></td>
                      <td><?php echo $row["order_date"] ?></td>
                      <td>&#8377; <?php echo $row["total_price"]; ?></td>
                  </tr>
        <?php
                }
            }
        ?>
        </table>

        </div>
        <br><br><br><br>
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">
                <div class="container">
                    <div class="jumbotron">
                        <h1>Previous Orders</h1>
                    </div>
                </div>
                <div class="table-responsive" style="padding-left: 100px; padding-right: 100px;" >
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th width="10%">Order ID</th>
                                <th width="40%">Restaurant</th>
                                <th width="20%">Date Of Order</th>
                                <th width="15%">Order Total</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>

            <?php  
                $username = $_SESSION["login_customer"];
                $query = "select * from orders where username='".$username."' and order_status='DELIVERED' order by order_date desc";
                $result = mysqli_query($conn,$query);
                if($result) {
                    while($row = mysqli_fetch_assoc($result)) {
            ?>
                      <tr style="background-color: #e9ecef">
                          <td><?php echo $row["order_ID"]; ?></td>
                          <?php $query1 = "select name from restaurant where R_ID=".$row["R_ID"].""; $res = mysqli_query($conn,$query1); $res_name = mysqli_fetch_assoc($res); ?>
                          <td><?php echo $res_name["name"] ?></td>
                          <td><?php echo $row["order_date"] ?></td>
                          <td>&#8377; <?php echo $row["total_price"]; ?></td>
                          <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#order<?php echo $row['order_ID'] ?>">
                                    Expand
                          </button></td>
                      </tr>
            <?php
                    }
                }
            ?>
            </table>

        </div>
        <br><br>
              </div>
              </div>
            </div>
        </div>
      </div>
    </div>  

    <?php
        $username = $_SESSION["login_customer"];
        $order_query = "select order_ID from orders where username='".$username."' and order_status='DELIVERED'";
        $order_result = mysqli_query($conn,$order_query);
        while($order_row = mysqli_fetch_assoc($order_result)) {
            echo '
                <div class="modal fade" id="order'.$order_row['order_ID'].'" tabindex="-1" role="dialog" aria-labelledby="orderLabel'.$order_row['order_ID'].'" style="margin-top: 10rem">
                    <div class="modal-dialog mw-100 w-75" role="document"  >
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-primary" id="orderLabel'.$order_row['order_ID'].'">DETAILS OF ORDER '.$order_row['order_ID'].'</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped table-hover container">
                                    <thead>
                                        <tr>
                                            <th>Item_name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
            ';
            $item_order_query = "select menu_item.name as name, order_item.quantity as quantity, menu_item.price as price from order_item, menu_item where order_item.order_ID=".$order_row["order_ID"]." and order_item.item_ID = menu_item.item_ID";
            $item_order_result = mysqli_query($conn,$item_order_query);
            while($item_order_row = mysqli_fetch_assoc($item_order_result)) {
                echo '
                                    <tr>
                                        <td>'.$item_order_row['name'].'</td>
                                        <td>'.$item_order_row['quantity'].'</td>
                                        <td>'.$item_order_row['price'].'</td>
                                    </tr>
                ';
            }
            echo '
                                </table>
                            </div>
                            <div class="modal-footer">
                                    <a href="add_review.php?orderid='.$order_row['order_ID'].'" type="button" class="btn btn-primary btn-sm">
                                        Add Review
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
    ?>


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
    
  <div class="modal" id="add_address" tabindex="-1" role="dialog" style="margin-top: 10rem">
      <div class="modal-dialog mw-100 w-75" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title text-primary">Add Address</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                  <form action="add_address.php" method="POST" class="p-5 bg-white">
                      <div class="row form-group">
                          <div class="col-md-12">
                              <h4 class="text-primary">New Address</h4>
                              <input type="text" name="address" id="address" style="height: 5rem" class="form-control" required>
                          </div>
                      </div>
                      <div class="row form-group">
                          <div class="col-md-12">
                              <input type="submit" value="Add" class="btn btn-success">
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

  </body>
</html>