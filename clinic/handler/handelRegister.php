<?php
session_start();
require("../helperFunction/function.php");
require('../helperFunction/conAndQueryFunction.php');
if (checkMethod("POST")) {
    $errors = [];
    foreach ($_POST as $key => $value) {
        $$key = sanitize($value);
    }
    if (!userValidation::notNull($name)) {
        $errors['name'] = "Name is required";
    } elseif (!userValidation::minLength($name, 2)) {
        $errors['name'] = "Name must be at least 3 characters";
    } elseif (!userValidation::maxLength($name, 15)) {
        $errors['name'] = "Name must be smaller than 15 characters";
    }
    if (!userValidation::notNull($email)) {
        $errors['email'] = "Email is required";
    } elseif (!userValidation::emailValid($email)) {
        $errors['email'] = "Email is invalid";
    }
    dataBaseConnection::connect();
    $result = dataBaseConnection::getData("users", "email");
    for ($i = 0; $i < count($result); $i++) {
        var_dump($result[$i]['email']);
        if ($result[$i]['email'] == $email) {
            $errors['email'] = "Email Already Exists";
        }
    }
    if (!userValidation::notNull($password)) {
        $errors['password'] = "Password is required";
    } elseif (!userValidation::minLength($password, 6)) {
        $errors['password'] = "Password must be at least 7 characters";
    } elseif (!userValidation::maxLength($password, 15)) {
        $errors['password'] = "password must be smaller than 15 characters";
    }
    if (!userValidation::notNull($phone)) {
        $errors['phone'] = "phone is required";
    } else if (!is_numeric($phone)) {
        $errors['phone'] = "phone must be number";
    } else if (strlen($phone)!=11) {
        $errors['phone'] = "phone must be 11 numbers";
    } 
    if (empty($errors)) {
        dataBaseConnection::connect();
        print_r(dataBaseConnection::insertData("users", ['email', 'name', 'password', 'role', 'phone'], [$email, $name, $password, 'user', $phone], "user", "../register.php"));
    } else {
        $_SESSION['error'] = $errors;
        header("location:../register.php");
    }
} else {
    $_SESSION['request_error'] = "Invalid Method";
    header("location:../register.php");
}