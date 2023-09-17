<?php
session_start();
var_dump($_SESSION["error"]);
require_once "../helperFunction/function.php";
require_once "../helperFunction/conAndQueryFunction.php";
dataBaseConnection::connect();
if (checkMethod("POST")) {
        $photo = $_FILES['doctor-image'];
        $file_ext = explode('/', $photo['type'])[1];
        $filename = time() . '.' . $file_ext;
        $x='../doctorImage/' . $filename;
        move_uploaded_file($photo['tmp_name'], '../doctorImage/' . $filename);
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
    if (!userValidation::notNull($bio)) {
        $errors['bio'] = "bio is required";
    } elseif (!userValidation::minLength($bio, 2)) {
        $errors['bio'] = "bio must be at least 3 characters";
    } elseif (!userValidation::maxLength($bio, 201)) {
        $errors['bio'] = "bio must be smaller than 200 characters";
    }
    try {
        $maj=strtolower($_POST['major']);
        $major_id=(dataBaseConnection::getData("majors",'id',"title='$maj'")[0]["id"]);
    } catch (\Throwable $th) {
        $errors['major'] ="invalid major";
    }
    if (!userValidation::notNull($major)) {
        $errors['major'] = "major is required";
    } elseif (!userValidation::minLength($major, 2)) {
        $errors['major'] = "major must be at least 3 characters";
    } elseif (!userValidation::maxLength($major, 31)) {
        $errors['major'] = "major must be smaller than 30 characters";
    }
    var_dump($major_id);   
    if (empty($errors)) {
        print_r(dataBaseConnection::insertData("doctors", [ 'name', 'image','email','bio','major_id'], [$name,$filename,$email,$bio,$major_id], "major", "../add.php"));
    } else {
        $_SESSION['error'] = $errors;
        header("location:../add.php");
    }
} else {
    $_SESSION['request_error'] = "Invalid Method";
    header("location:../add.php");
}