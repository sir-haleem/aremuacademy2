<?php
require_once("admin.php");
require_once("session.php");
?>
<?php 
if(empty($spass)){?>

<script>
alert("Un-authorized Access, Please Re-login")
window.parent(location="index.php");
</script>

<?php
exit;
}
$query = mysql_query ("SELECT * FROM admin WHERE password='$spass' ");

while($myrow = mysql_fetch_array($query))
{
$myuser = $myrow['Name'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon"  href="images/icon2.png"/>

<title>ABS Prospective Entry</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/custom.css">


<script src="bootstrap-3.3.5-dist/js/jquery.min.js"></script>
<script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<script src="bootstrap-3.3.5-dist/js/bootbox.min.js"></script>

<script language="javascript" type="text/javascript">
function removeSpaces(string) {
 return string.split(" ").join("");
}
</script>

<script>
        function trim(s) {
            return s.replace( /^\s*/, "" ).replace( /\s*$/, "" );
        }
        function validate() {
            if (trim(document.prospect.utme_reg.value) == "") {
              bootbox.alert("please enter the UTME REG NO");
              document.prospect.utme_reg.focus();
              return false;
            } 
        }
</script>
</head>
<body>

<div  class="body">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <table  class="bdtable" align="center">
    <tr style="font-family:Verdana, Geneva, sans-serif; font-size:13px;">
    <td width="44%" align="left">Welcome
      <?=$myuser  ?>
      &nbsp;</td>
    <td width="18%" align="center">&nbsp;</td>
    <td width="38%" align="right"><span style="text-align:right">| <a href="logout.php">Log out</a></span></td>
  </tr>
    <tr>
      <td colspan="3" align="center"><hr></td>
    </tr>
    <tr>
    <td colspan="3" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><img src="images/schl logo.jpg" width="100" height="91" /><br />Prospective Entry</td>
  </tr>
  <tr>
    <td height="133" colspan="3" align="center">
    <form action="insert_code.php" onSubmit="return validate();" name="prospect" method="post">
      <input name="utme_reg" type="text" autofocus="autofocus"  required="required" class="text_field" id="utme_reg" placeholder="Enter the UTME Reg. No." onBlur="this.value=removeSpaces(this.value);" size="20" maxlength="20"/><br /><input name="Submit" type="submit"  class="bt" value="Insert"/></form></td>
  </tr>
</table>

<div class="footer">© 2015 - Wintech IT Solutions » All rights reserved.</div>
</div>








</body>
</html>