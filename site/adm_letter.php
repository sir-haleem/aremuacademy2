<?php
require_once("admin.php");
require_once("session.php");
?>

<?php
//Primary info
$query = $mysqli->query("SELECT * FROM prospective WHERE utme_no = '$s_utme_reg'");
 
while($myrow = $query->fetch_assoc())
{
$db_utme = $myrow['utme_no'];
$db_surname = $myrow['surname'];
$db_othernames = $myrow['othernames'];

$db_address = $myrow['address'];

$db_course = $myrow['programme'];
}

//selct pics
$query2 = $mysqli->query("SELECT * FROM stud_pics WHERE utme_no = '$s_utme_reg'");
 
while($myrow2 = $query2->fetch_assoc())
{
$db_pic = $myrow2['file_name'];

}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.1.0.60046 -->
    <meta charset="utf-8">
    <title>L.O.A. COURT</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>

<link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/custom.css">

<script src="bootstrap-3.3.5-dist/js/jquery.min.js"></script>
<script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<script src="bootstrap-3.3.5-dist/js/bootbox.min.js"></script>  



<script>
        function trim(s) {
            return s.replace( /^\s*/, "" ).replace( /\s*$/, "" );
        }
        function letter_load() {
            
             bootbox.alert('<table width="100%"><tr width="100%"><td height="" style="border:1px solid #E4E4E4; border-top:none; border-right:none;" width="100%"><img src="images/schl logo_msg.jpg" width="40" height="41" /> CONGRATULATIONS !!! </td></tr></table><br><br>Please print Admission letter and submit copies to respective Department<br><br>Thanks');
             
              
           
		}
</script>

</head>



<body onLoad="return letter_load();">

<div id="art-main">
 
 
 <?php 

$rs_utme_reg = $s_utme_reg;

if(empty($rs_utme_reg)){?>

<script>
bootbox.alert("Un-authorized Access, try again");
window.parent(location="confirm_adm.php");
</script>
<?php
}
?>

<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="14%" valign="top"><img src="images/ABS logo final.jpg" width="127" height="131" alt="ABS"></td>
                                    <td colspan="2" valign="top"><span style="font-size: 30px; font-weight:bold;font-family: Georgia, 'Times New Roman', Times, Serif;">HON. JUSTICE L.O AREMU'S</span> <BR/>
                                    <span style="font-size: 30px;
font-family: Impact, Tahoma, Sans-Serif;
font-weight: bold;
font-style: normal;
letter-spacing: 2px; color: #E2341D;">Academy For Executive Diploma Studies</span></td>
                                  </tr>
                                  <tr>
                                    <td colspan="3">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2"><span class="art-postheader"><span class="art-postheadericon">Admission Letter</span></span></td>
                                    <td width="8%"><a href="javascript:window.print()">[Print]</a></td>
                                  </tr>
                                </table>
                                
                          <form action="" onSubmit="return check();"  method="post" name="apply" id="apply">                           
                <div class="art-postcontent art-postcontent-0 clearfix">
                  <p class="MsoNormal" align="center" style="margin-bottom: 7.5pt; text-align: center;"><span style="font-size: 10pt; font-family: Georgia, serif; color: black;"><span style="font-weight: bold;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></span></p>
<table width="100%" height="30%" align="left" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td><strong> <?=$db_surname?> <?=$db_othernames?></strong></td>
      <td width="99" rowspan="3"><img src="<?=$db_pic?>" width="130" height="136" alt="<?=$db_pic?>" style="border-radius:10px 0px 10px 0px;" /></td>
    </tr>
    <tr>
      <td height="78"><strong><?=$db_address?></strong></td>
      </tr>
    <tr>
      <td height="52" valign="top"><p><strong>UTME Reg. No.: </strong><?=$db_utme?></p></td>
      </tr>
  </tbody>
</table>
<p class="MsoNormal" align="center" style="margin-bottom: 7.5pt; text-align: center;"><span style="font-family: Georgia, serif; color: rgb(0, 0, 0);"><span style="font-weight: bold;">&nbsp;&nbsp;</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p>

<p class="MsoNormal" align="right" style="margin-top: 7.5pt; margin-right: 0in; margin-bottom: 7.5pt; margin-left: 0in; text-align: right;"><!--[if gte vml 1]><p>
 <p>
 <p>
  <p>
  <p>
  <p>
  <p>
  <p>
  <p>
  <p>
  <p>
  <p>
  <p>
  <p>

  <p>
 </p>
 <p>
 <p>
</p><p>
 <p>
</p><![endif]--></p>

<p align="left"><strong><?=$db_surname?> <?=$db_othernames?>, </strong></p>
<p align="center"><strong><u>RE: PROVISIONAL ADMISSION FOR 2015/2016 ACADEMICS SESSION</u></strong></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;Please refer to your  2015/2016 UTME examination.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;This is to confirm your admission into HON. JUSTICE L.O AREMU'S ACADEMY, Ibadan to study   <strong><?=$db_course?></strong>.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You are to report to the school (<strong>L. O. A. COURT 102, BASHORUN ASHI/BODIJA JUNCTION, IBADAN, OYO STATE, NIGERIA..)</strong> with the copy of your JAMB result, Four(4) Passport Photographs and your 0'level result. </p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pay the sum of N7,500 :00 for <u>Registration</u>&nbsp;, and N150,000 per session with N75,000 per semester for <u>Tuition fee</u>&nbsp;to <strong>[ UBA Bank, Acc. No: 1017536939, Acc Name: AREMU ACADEMY ]</strong> and bring Payment teller to complete your other  registrations. 
  The above payments are deducted automatically from your payment advice.
<p>You are required to print three copies of the admission letter</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Submit one copy of this  Adimssion letter to the Account Department on resumption.<br/>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Submit the 2nd copy to the H.O.D of your Department.<br/>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Keep the 3rd copy for your own record.</p>
           

            <table width="572" align="left">
              <tr>
                <td width="148"><strong>Student Signature:</strong></td>
                <td width="189"><strong>Account Department:</strong></td>
                <td width="219"><strong> Head Of Department:</strong></td>
              </tr>
              <tr>
                <td><p>_________________<br />
                  Signature &amp; Date</p></td>
                <td><p>______________________<br />
                  Signature &amp; Date</p></td>
                <td><p>______________________<br />
                  Signature &amp; Date</p></td>
              </tr>
            </table>
            <BR/>
            <table width="241" align="right">
              <tbody>
                <tr>
                  <td width="233" height="25">Yours faithfully,</td>
                </tr>
                <tr>
                  <td>HON. JUSTICE AREMU'S ACADEMY.</td>
                </tr>
                <tr>
                  <td height="27">Aremu Y.N.</td>
                </tr>
                <tr>
                  <td height="22"><em>Registrar.</em></td>
                </tr>
              </tbody>
  </table>
            <p class="MsoNormal" style="margin-top: 7.5pt; margin-right: 0in; margin-bottom: 7.5pt; margin-left: 0in;">&nbsp;</p><p><br></p></div></form>


</article></div>
                    </div>
                </div>
            </div>
            
           <footer class="art-footer">
<div style="padding-left:10px;padding-right:10px">Copyright © 2015.&nbsp;<br/><span style="font-weight: bold;">HON. JUSTICE L.O AREMU'S ACADEMY </span><br/>
All Rights Reserved</div>
</footer>

    </div>
    
</div>


</body></html>
<?php
?>