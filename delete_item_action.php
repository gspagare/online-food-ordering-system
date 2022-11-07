<?php
    session_start(); // Starting Session
    if(isset($_SESSION['login_customer'])){ //if customer logged in
        header('location: index.php');
    }

    if(isset($_SESSION['login_admin'])){ //if manager logged in
        header('location: index.php');
    }

    if(!isset($_SESSION['login_manager'])){ //if manager not logged in
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OFOS &#9824;</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        #dialogMsg {
            text-align: center;
            color: white;
        }
    </style>
  </head>
  <body>
    <div class="modal fade" id="signupDialog" tabindex="-1" role="dialog" onclick="window.location='manager.php'">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <h3>
        <div  id="dialogMsg" class="modal-body bg-primary">
        </div>
        </h3>
        <div class="modal-footer">
            <a type="button" href="manager.php" class="btn btn-primary">Close</a>
        </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <?php
        require 'connection.php';
        
        $conn = Connect();

        if(isset($_GET['id'])){
            $item_ID=$_GET['id'];
            $query="delete from order_items where item_ID='$item_ID'";
            $success=$conn->query($query);
            $query="delete from menu_item where item_ID='$item_ID'";
            $success=$conn->query($query);
            if (!$success){
                $msg="Failed to delete menu item";
                echo   '<script>
                    $(document).ready(function() {
                        $("#dialogMsg").text("'. $msg .'");
                        $("#signupDialog").modal();
                    });
                </script>';
            }
            
            $conn->close();

            unlink("images/menu_items/item_".$item_ID.".jpg");
        }
        header('location: manager.php');
    ?>
  </body>
</html>