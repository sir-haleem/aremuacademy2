<?php  require_once("admin.php"); 
       require_once("session.php");
?>
<?php 
if(empty($spass)){?>

<script>
alert("Un-authorized Access, Please Re-login")
window.parent(location="index.php");
</script>

<?php
}
$query = mysql_query("SELECT * FROM utme_reg WHERE utme_no = '$utme_reg'");


while($myrow = mysql_fetch_array($query))
{
$db_utme_reg = $myrow['utme_no'];
}
 if ($utme_reg == $db_utme_reg){
?>
     <script>
	 alert("Duplicate Entry");
	 javascript:history.go(-1)
	 </script>
     
	 
<?php
	 }else{
	$result = mysql_query("INSERT INTO utme_reg VALUES(NULL,'$utme_reg',NOW())");
?>
     
     <script>
	 alert("Insertion Successful");
	 window.parent(location='pros_insert.php');
	 </script>
     	 
<?php
		 
	 }
?>