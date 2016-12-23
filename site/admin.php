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


$surname = trim(strtoupper($_POST['surname']));
$othernames = trim(strtoupper($_POST['othernames']));

$address = trim(strtoupper($_POST['address']));

$dateofbirth = $_POST['mon']." ".$_POST['day'].",".$_POST['yea'];

$email = trim($_POST['email']);

$gender = $_POST['gender'];

$marr_status = $_POST['marr_status'];

$state = trim(strtoupper($_POST['state']));

$religion = $_POST['religion'];

$nation = $_POST['nation'];

$telephone = $_POST['telephone'];

$p_address = trim(strtoupper($_POST['p_address']));

$p_phone = $_POST['p_phone'];

$p_name = trim(strtoupper($_POST['p_name']));

$comp = $_POST['comp'];

$course_obj = $_POST['course_obj'];

$course = trim(strtoupper($_POST['course']));

$inst_det = trim(strtoupper($_POST['inst_det']));

$sub_intre = trim(strtoupper($_POST['sub_intre']));

$stud_pic =  "upload/".$_FILES['file']['name'];

$adm_ses = "2015/2016";

//$date = date("l, d F Y");

$date = date("jS M Y");

?>