<?php
require("../helperFunction/function.php");
require("../helperFunction/conAndQueryFunction.php");
session_start();
dataBaseConnection::connect();
dataBaseConnection::updateData("doctors", "name", $_GET['name'], $_GET['id']);
dataBaseConnection::updateData("doctors", "email", $_GET['email'], $_GET['id']);
dataBaseConnection::updateData("doctors", "bio", $_GET['bio'], $_GET['id']);
$_SESSION['success']="Updated successfully!";
header('location:../table.php');