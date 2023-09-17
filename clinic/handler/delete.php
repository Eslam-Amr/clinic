<?php
require('../helperFunction/conAndQueryFunction.php');
dataBaseConnection::connect();
dataBaseConnection::deleteData("doctors",$_GET["table_id"]);
header('location:../table.php');
 