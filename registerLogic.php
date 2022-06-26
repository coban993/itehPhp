<?php

include_once "Database.php";


if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $uname = $_POST['uname'];
    $pass = $_POST['password'];
    $is_admin = 0;

    if (empty($name)) {
        header("Location: register.php?error=NameError");
        exit();
    } else if (empty($surname)) {
        header("Location: register.php?error=SurnameError");
        exit();
    } else if (empty($email)) {
        header("Location: register.php?error=EmailError");
        exit();
    } else if (empty($uname)) {
        header("Location: register.php?error=UserNameError");
        exit();
    } else if (empty($pass)) {
        header("Location: register.php?error=PasswordError");
        exit();
    } else {
        // check with database

        $sql = "INSERT INTO users(username,password,is_admin,name,surname,email) 
        VALUES('$uname','$pass','0','$name','$surname','$email') ";
        
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        header("Location: index.php");
    }
}
