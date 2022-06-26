<?php
session_start();

include_once "Database.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = $_POST['uname'];
    $pass = $_POST['password'];

    if (empty($uname)) {
        header("Location: login.php?error=UserNameError");
        exit();
    } else if (empty($pass)) {
        header("Location: login.php?error=PasswordError");
        exit();
    } else {
        // check with database

        $sql = "SELECT * FROM users WHERE username='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pass) {
                $_SESSION['username']=$row['username'];
                $_SESSION['password']=$row['password'];
                $_SESSION['id']=$row['id'];
                $_SESSION['is_admin']=$row['is_admin'];
                $_SESSION['name']=$row['name'];
                $_SESSION['surname']=$row['surname'];
                $_SESSION['email']=$row['email'];
                header("Location: index.php");
            }else{
                header("Location: login.php?error=UserNamePasswordError");
                exit();
            }
        } else {
            header("Location: login.php?error=UserNamePasswordError");
            exit();
        }
    }
}
