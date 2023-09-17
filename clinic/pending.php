<?php
require 'helperFunction/conAndQueryFunction.php';
dataBaseConnection::connect();
dataBaseConnection::updateData("booking","status","pending",$_GET["booking_id"]);
header("location:./history.php");