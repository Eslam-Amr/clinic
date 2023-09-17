<?php
require 'helperFunction/conAndQueryFunction.php';
dataBaseConnection::connect();
dataBaseConnection::updateData("booking","status","loading",$_GET["booking_id"]);
header("location:./history.php");