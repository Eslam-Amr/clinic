<?php
session_start();
require_once "../helperFunction/function.php";
require_once "../helperFunction/conAndQueryFunction.php";
dataBaseConnection::connect();
if (checkMethod("POST")) {
    $errors = [];
    foreach($_POST as $key => $val){
        $$key=$val;
    } 
    if (!userValidation::notNull($name)) {
        $errors['name'] = "name is required";
    } elseif (!userValidation::minLength($name, 2)) {
        $errors['name'] = "name must be at least 3 characters";
    } elseif (!userValidation::maxLength($name, 31)) {
        $errors['name'] = "name must be smaller than 30 characters";
    }
    if (!userValidation::notNull($email)) {
        $errors['email'] = "Email is required";
    } elseif (!userValidation::emailValid($email)) {
        $errors['email'] = "Email is invalid";
    }
    if (!userValidation::notNull($phone)) {
        $errors['phone'] = "phone is required";
    } else if (!is_numeric($phone)) {
        $errors['phone'] = "phone must be number";
    } else if (strlen($phone)!=11) {
        $errors['phone'] = "phone must be 11 numbers";
    } 
    if (!userValidation::notNull($subject)) {
        $errors['subject'] = "subject is required";
    } elseif (!userValidation::minLength($subject, 2)) {
        $errors['subject'] = "subject must be at least 3 characters";
    } elseif (!userValidation::maxLength($subject, 201)) {
        $errors['subject'] = "subject must be smaller than 200 characters";
    }
    if (!userValidation::notNull($message)) {
        $errors['message'] = "message is required";
    } elseif (!userValidation::minLength($message, 2)) {
        $errors['message'] = "message must be at least 3 characters";
    } elseif (!userValidation::maxLength($message, 201)) {
        $errors['message'] = "message must be smaller than 200 characters";
    }    
    if (empty($errors)) {
        print_r(dataBaseConnection::insertData("contacts", [ 'name','email','subject','message','phone'], [$name,$email,$subject,$message,$phone], "message", "../contact.php"));
    } else {
        $_SESSION['error'] = $errors;
        header("location:../contact.php");
    }
} else {
    $_SESSION['request_error'] = "Invalid Method";
    header("location:../contact.php");
}