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
    <div class="modal fade" id="signupDialog" tabindex="-1" role="dialog" onclick="func()">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <h3>
        <div  id="dialogMsg" class="modal-body bg-primary">
        </div>
        </h3>
        <div class="modal-footer">
            <a type="button" href="customer.php" class="btn btn-primary">Close</a>
        </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

<?php
    $username = $_SESSION["login_customer"];
    $address = $_POST["address"];
    $msg="Address Added Successfully";
    
    $query="select * from address where username='$username' and address='$address'";
    $result = $conn->query($query);
    if($result->num_rows > 0) {
        $msg = "Address already exists";
    } else {
        $insert_query = "insert into address(username,address) values('".$username."','".$address."')";
        $success = $conn->query($insert_query);
        if (!$success){
            $msg="Error occurred in adding";
        }
    }

    
    echo   '<script>
                    $(document).ready(function() {
                        $("#dialogMsg").text("'. $msg .'");
                        $("#signupDialog").modal();
                    });
                </script>';

    
?>

    <script>
        function func() {
            window.location="customer.php";
        }
    </script>

</body>
</html>