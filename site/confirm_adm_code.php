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
//select1
$query1 = $mysqli->query("SELECT * FROM prospective WHERE utme_no = '$s_utme_reg'");
 
var_dump($query1);

while($myrow1 = $query1->fetch_assoc() )
{
$db_utme1 = $myrow1['utme_no'];
}


//select2
$query2 = $mysqli->query("SELECT * FROM utme_reg WHERE utme_no = '$s_utme_reg'");
 

while($myrow2 = $query2->fetch_assoc() )
{
$db_utme2 = $myrow2['utme_no'];
}

if(($s_utme_reg == $db_utme1))
{
?>
<script>
bootbox.alert("Admission Already Confirmed, Proceed to Print yout Admission Letter")
window.parent(location="adm_letter.php");
</script>

<?php	

}
elseif(($s_utme_reg == $db_utme2))
{
?>
<script>
bootbox.alert("Admission Confirmed Successfully, Please Proceed to Register")
window.parent(location="reg-form.php");
</script>

<?php	

}else{
	?>

<script>
bootbox.alert("Invalid UTME REG No, try again");
window.parent(location="confirm_adm.php");
</script>

<?php
	
	}
?>
</body>
</html>