<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/custom.css">

<script src="bootstrap-3.3.5-dist/js/jquery.min.js"></script>
<script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<script src="bootstrap-3.3.5-dist/js/bootbox.min.js"></script>  

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>L.O.A Court - Confirm Admission</title>
</head>

<body>
<?php require_once('admin.php') ?>
<?php require_once('session.php') ?>
<?php 
if(empty($s_utme_reg)){?>

<script>
bootbox.alert("Un-authorized Access, try again")
window.parent(location="confirm_adm.php");
</script>

<?php
}

//select
$query = mysql_query("SELECT * FROM prospective WHERE utme_no = '$s_utme_reg'");
 
while($myrow = mysql_fetch_array($query))
{
$db_utme = $myrow['utme_no'];
}

if(($s_utme_reg == $db_utme))
{
?>
<script>
bootbox.alert("Admission Already Confirmed, Proceed to Print your Admission Letter")
window.parent(location="adm_letter.php");
</script>

<?php	
}
else{


//Insert
$query = mysql_query("INSERT INTO prospective VALUES('','$surname','$othernames','$s_utme_reg','','$course','$address','$telephone','$gender','$dateofbirth','$email','','$p_name','$p_address','$p_phone','$inst_det','$course_obj','$sub_intre','','$marr_status','$nation','$state','$religion','','$adm_ses','$comp','OK','$date')");

//upload pics
if(move_uploaded_file($_FILES['file']['tmp_name'],$stud_pic))
   {
$query2 = mysql_query("INSERT INTO stud_pics VALUES('','$s_utme_reg','$stud_pic','$date')");
   }

?>
<script>
bootbox.alert("Registration was successful, Proceed to Print your Admission Letter")
window.parent(location="adm_letter.php");
</script>

<?php
}
?>
</body>
</html>