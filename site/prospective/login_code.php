<?php require_once('admin.php') ?>
<?php require_once('session.php') ?>
<?php 
if(empty($spass)){?>

<script>
alert("Un-authorized Access, Please Re-login")
window.parent(location="index.php");
</script>

<?php
}
$query = mysql_query("SELECT * FROM admin  WHERE  password = '$spass' ");  

while($myrow = mysql_fetch_array($query))
{
$mypass = $myrow['password'];
}

if(($spass == $mypass))
{
header("location:pros_insert.php");

}else{
	?>

<script>
alert("Un-authorized Access, Please Re-login")
window.parent(location="index.php");
</script>

<?php
	
	}
?>