<?php
//server
error_reporting(E_ALL ^ E_NOTICE);
$server = "localhost";
$usern = "root";
$passw = "manunited@2016";

//database variables
$mysqli = new mysqli($server,$usern,$passw, "aremuacademy");
$db = @mysqli_select_db("aremuaca",$conn);


//admin login variables
$password  = $_POST['password'];
$des_ses  = $_POST['des_ses'];

//registration variables
$utme_reg  = trim(strtoupper($_POST['utme_reg']));

$password  = $_POST['password'];
$des_ses  = $_POST['des_ses'];

?>