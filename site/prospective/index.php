<?php
require_once("admin.php");
//require_once('session.php');
?>

<?php
if($des_ses != "active"){
	session_start();
	session_destroy();
	}
?>

<?php
//admin1
$query1 = $mysqli->query("SELECT * FROM admin WHERE password != '' limit 0,1");
while($myrow1 = mysql_fetch_array($query1))
{	
$pass1 = $myrow1['password'];
}

//admin2
$query2 = $mysqli->query("SELECT * FROM admin WHERE password != '' limit 0,2");
while($myrow2 = mysql_fetch_array($query2))
{
	
$pass2 = $myrow2['password'];
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
        function checkform() {
			
			 var blank = "";
			 document.getElementById('des_ses').checked = true;
			 
            if (trim(document.prospect.password.value) == "") {
              bootbox.alert("Please fill out this field");
              document.prospect.password.focus();
			   document.getElementById('des_ses').checked = false;
			   
			   
			   
              return false;
			  
			  
            } else if (trim(document.prospect.password.value) == "<?=$pass1?>" || trim(document.prospect.password.value) == "<?=$pass2?>"){
				
						
				<?php 
				
				if($des_ses == "active"){
	
	
				session_start();
				
$_SESSION['password'] = $pass;
}
?>

window.parent("login_code.php");
				
				if (document.prospect.con.value == "not_empty") {
		            document.prospect.password.value = ""
					
					document.getElementById('des_ses').checked = false;
					}
						
				}else{
					
					bootbox.alert("Access Denied");
					
					if (document.prospect.con.value == "not_empty") {
						
		            document.prospect.password.value = ""
					 document.getElementById('des_ses').checked = false;
                  
                    return false;		
				  
		             }
						
				}
				
        }
</script>


</head>
<body onload="">

<div  class="body">
<table  class="bdtable" align="center">
  <tr>
    <td align="center"><img src="images/schl logo.jpg" width="100" height="91" /><br />
      Admin Login</td>
  </tr>
  <tr>
    <td height="133" align="center">
    <form action="login_code.php" id="loginform" onsubmit="return checkform();"  name="prospect" method="post">
    <input name="des_ses"  style="visibility:hidden"  type="radio" id="des_ses"   value="active"/>
    <input name="con" type="hidden"  style="visibility:hidden" value="not_empty"/>
      <input name="password" type="password"  required="required" class="text_field" id="utme_reg" placeholder="Enter Password" size="10" maxlength="20" onblur="this.value=removeSpaces(this.value);" autofocus="autofocus"/><br /><input name="Submit" type="submit" id="submitbtn" class="bt" value="Login"/></form></td>
  </tr>
</table>

<div class="footer">© 2015 - Wintech IT Solutions » All rights reserved.</div>
</div>

</body>
</html>
