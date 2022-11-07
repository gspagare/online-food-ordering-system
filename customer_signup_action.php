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
    <div class="modal fade" id="signupDialog" tabindex="-1" role="dialog" onclick="window.location='index.php'">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <h3>
        <div  id="dialogMsg" class="modal-body bg-primary">
        </div>
        </h3>
        <div class="modal-footer">
            <a type="button" href="index.php" class="btn btn-primary">Close</a>
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
            $username = $conn->real_escape_string($_POST['username']);
            $password = $conn->real_escape_string($_POST['password']);
            $name = $conn->real_escape_string($_POST['name']);
            $email = $conn->real_escape_string($_POST['email']);
            $contact_no = $conn->real_escape_string($_POST['contact_no']);
            $address = $conn->real_escape_string($_POST['address']);
            $msg="Customer successfully registered";
            $query="select * from customer where username='$username'";
            $result = $conn->query($query);
            if($result->num_rows > 0){
                $msg="Username already registered";
            }else{
                $query = "insert into customer(username,password,name,email,contact_no) values('$username','$password','$name','$email','$contact_no')";
                $success = $conn->query($query);
                if (!$success){
                    $msg="Error occurred in registering";
                } else {
                    $_SESSION['login_customer']=$username;  
                }
                $address_query = "insert into address(username,address) values('$username','$address')";
                $success = $conn->query($address_query);
                
            }
            echo   '<script>
                    $(document).ready(function() {
                        $("#dialogMsg").text("'. $msg .'");
                        $("#signupDialog").modal();
                    });
                </script>';
            $conn->close();
        }else{
            header('location: index.php');
        }
    ?>
  </body>
</html>




