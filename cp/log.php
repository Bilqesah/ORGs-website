<?php
session_start();
require_once "../db.php";
// echo md5($_POST['password']);

?> 


<!DOCTYPE html>
<html>

<head>
    <title>Login Page - NGOs</title>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        body {
            background: #f1f1f1;
            font-family: Arial, sans-serif;
        }

        .login-box {
            width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px #ccc;
        }

        h1 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        form label {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="password"] {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            margin-bottom: 20px;
        }

        form input[type="submit"] {
            background-color: #3a6cf4;
            color: white;
            border:none;
            padding: 10px 25px;
            border-radius: 50px;
            transition: all 0.3s;
        }

        form input[type="submit"]:hover {
            background-color: #0a49f6;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h1>Login</h1>
        <form method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter Username" >
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>
            <input type="submit" name="login" value="Login" class="btn">
        </form>
    </div>
</body>

</html>

 <?php

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    echo $username."   ";
    echo $password ."  ";
    $err = '';
    if ($username == '') $err = "Enter username please";
    if ($password == '') $err = "Enter password please";

    if ($err == '') {
        $q = "SELECT `username`, `fullname`,`password` FROM users WHERE `username`=?";
        $d = getData($con, $q,[$username]);
        if (count($d) > 0) {
            $pass = $d[0]['password'];
            echo $pass;
            echo '<br>';
            echo $password;
            if ($pass == $password) {
                // echo 'error';
                $_SESSION['fullname'] = $d[0]['fullname'];
                // $_SESSION['del'] = false;
                header("Location: ./dashboard.php");
                die;
            } else {
                echo "<script>swal(Please try again,'Error in login information','Login', 'error');</script>";
            }
        } else {
            echo "<script>swal(Please try again,'Error in login information','Login', 'error');</script>";
        }
    } else {
        echo "<script>swal(Please try again,'Error in login information','Login', 'error');</script>";
    }
}

?> 