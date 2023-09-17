<?php
session_start();
require_once "../helperFunction/function.php";
require_once "../helperFunction/conAndQueryFunction.php";
$major=$_POST['name'];
var_dump($major);
if (checkMethod("POST")) {
        $photo = $_FILES['major-image'];
        $file_ext = explode('/', $photo['type'])[1];
        $filename = time() . '.' . $file_ext;
        $x='../majorImage/' . $filename;
        move_uploaded_file($photo['tmp_name'], '../majorImage/' . $filename);
    $errors = [];
    
    if (!userValidation::notNull($major)) {
        $errors['major'] = "major is required";
    } elseif (!userValidation::minLength($major, 2)) {
        $errors['major'] = "major must be at least 3 characters";
    } elseif (!userValidation::maxLength($major, 31)) {
        $errors['major'] = "major must be smaller than 30 characters";
    }
    
    if (empty($errors)) {
        dataBaseConnection::connect();
        print_r(dataBaseConnection::insertData("majors", [ 'title', 'image'], [$major,$filename], "major", "../addMajor.php"));
    } else {
        $_SESSION['error'] = $errors;
        header("location:../addMajor.php");
    }
} else {
    $_SESSION['request_error'] = "Invalid Method";
    header("location:../addMajor.php");
}