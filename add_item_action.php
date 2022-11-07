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

        if(isset($_POST['submit'])){
            $name = $conn->real_escape_string($_POST['name']);
            $price = $_POST['price'];
            $description = $conn->real_escape_string($_POST['description']);
            $username=$_SESSION['login_manager'];
            $msg="Failed to add menu item";
            $query="select * from manager where username='$username'";
            $result = $conn->query($query);
            if($result->num_rows>0){
                $row=$result->fetch_assoc();
                $R_ID=$row['R_ID'];
                $query="insert into menu_item(name,price,description,R_ID) values('$name','$price','$description','$R_ID')";
                $success = $conn->query($query);

                if ($success){
                    $msg="Menu item added successfully";
                }

                $item_ID = $conn->insert_id;

                $target_dir = "images/menu_items/";
                $image_name = "item_".$item_ID.".jpg";
                $target_file = $target_dir.$image_name;
                
                // Check if image file is a actual image or fake image
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            }
            echo   '<script>
                    $(document).ready(function() {
                        $("#dialogMsg").text("'. $msg .'");
                        $("#signupDialog").modal();
                    });
                </script>';
            $conn->close();
        }else{
            header('location: manager.php');
        }
    ?>
  </body>
</html>





