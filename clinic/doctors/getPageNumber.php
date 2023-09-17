<?php
session_start();
$_SESSION['page']=$_GET['page'];
header("location:./index.php");