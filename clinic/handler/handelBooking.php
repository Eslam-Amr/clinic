<?php
require("../helperFunction/function.php");
require("../helperFunction/conAndQueryFunction.php");
session_start();
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
    if (!userValidation::notNull($name)) {
        $errors['name'] = "Name is required";
    } elseif (!userValidation::minLength($name, 2)) {
        $errors['name'] = "Name must be at least 3 characters";
    } elseif (!userValidation::maxLength($name, 15)) {
        $errors['name'] = "Name must be smaller than 15 characters";
    }
    if (!userValidation::notNull($phone)) {
        $errors['phone'] = "phone is required";
    } else if (!is_numeric($phone)) {
        $errors['phone'] = "phone must be number";
    } else if (strlen($phone) != 11) {
        $errors['phone'] = "phone must be 11 numbers";
    }
    if (empty($errors)) {
        dataBaseConnection::connect();
        $date = date("F j, Y, g:i a");
        print_r(dataBaseConnection::insertData("booking", ['email', 'name', 'date', 'doctor_id', 'phone', 'status'], [$email, $name, $date, $doctor_id, $phone, "pending"], "booking", "../doctors/doctor.php?id=$doctor_id"));
    } else {
        $_SESSION['error'] = $errors;
        header("location:../doctors/doctor.php?id=$doctor_id");
        die();
    }
} else {
    $_SESSION['error_method'] = "Invalid";
    header("location:../doctors/doctor.php?id=$doctor_id");
    die();
}