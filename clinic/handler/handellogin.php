<?php
session_start();
require("../helperFunction/function.php");
require("../helperFunction/conAndQueryFunction.php");
if (checkMethod("POST")) {
    $errors = [];
    foreach ($_POST as $key => $value) {
        $$key = sanitize($value);
    }
    if (!userValidation::notNull($email)) {
        $errors['email'] = "Email is required";
    } elseif (!userValidation::emailValid($email)) {
        $errors['email'] = "Email is invalid";
    }
    if (!userValidation::notNull($password)) {
        $errors['password'] = "Password is required";
    } elseif (!userValidation::minLength($password, 6)) {
        $errors['password'] = "Password must be at least 7 characters";
    } elseif (!userValidation::maxLength($password, 15)) {
        $errors['password'] = "password must be smaller than 15 characters";
    }
    if (empty($errors)) {
        dataBaseConnection::connect();
        $rows = (dataBaseConnection::getData("users", "name,email,password,id,phone,role"));
        foreach ($rows as $row) {
            if ($row['email'] == $email) {
                if ($row['password'] == $password) {
                    $_SESSION['auth'] = $row;
                    unset($_SESSION['error_login']);
                    header("location:../index.php");
                    die;
                }
            } else {
                $_SESSION['error_login'] = "Invalid email or password";
                header("location:../login.php");
            }
        }
    } else {
        $_SESSION['error'] = $errors;
        header("location:../login.php");
        die();
    }
} else {
    $_SESSION['error_method'] = "Invalid";
    header("location:../login.php");
    die();
}