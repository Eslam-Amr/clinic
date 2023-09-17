<?php
require 'helperFunction/conAndQueryFunction.php';
dataBaseConnection::connect();
dataBaseConnection::updateData("booking","status","completed",$_GET["booking_id"]);
header("location:./history.php");