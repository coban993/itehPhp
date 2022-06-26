<?php

include_once "registerLogic.php";

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="registerStyle.css">
    <!-- copied links from index.php  -->

    <!-- copied links from index.php  -->
</head>

<body>
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">

            <div class="form-group title">
                       <h1>Registration</h1>
                    </div>
               
                <form class="col-12" method="POST" action="registerLogic.php">

                    <?php if (isset($_GET['error'])) { ?>
                        <?php if ($_GET['error'] == "PasswordError") {
                            echo '<p class="error">Please enter password</p>';
                        } else if ($_GET['error'] == "UserNameError") {
                            echo '<p class="error">Please enter User name</p>';
                        }else if ($_GET['error'] == "NameError") {
                            echo '<p class="error">Please enter name</p>';
                        }else if ($_GET['error'] == "SurnameError") {
                            echo '<p class="error">Please enter surname</p>';
                        }else if ($_GET['error'] == "EmailError") {
                            echo '<p class="error">Please enter email</p>';
                        }
                        ?>
                    <?php } ?>

                    

                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Enter name">
                    </div>
                    
                    <div class="form-group">
                        <input type="text" name="surname" class="form-control" placeholder="Enter surname">
                    </div>

                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <input type="text" name="uname" class="form-control" placeholder="Enter username">
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Enter password">
                    </div>

                    <button type="submit" class="btn" name="create"><i class="fas fa-user-plus"></i>Register</button>

                </form>

                <div class="col-12 forgot">
                    <a href="index.php">Back to main page</a>
                </div>

            </div> <!-- End of modal content -->
        </div>
    </div>

</body>

</html>