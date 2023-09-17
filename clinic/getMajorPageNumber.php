<?php
session_start();
$_SESSION['major_page']=$_GET['major_page'];
header("location:./majors.php");