<?php
require_once("admin.php");
require_once("session.php");
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.1.0.60046 -->
    <meta charset="utf-8">
    <title>L.O.A. COURT - CONFIRM ADMISSION</title>
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

    
<script language="javascript" type="text/javascript">
function removeSpaces(string) {
 return string.split(" ").join("");
}
</script>    
    
<script>
        function trim(s) {
            return s.replace( /^\s*/, "" ).replace( /\s*$/, "" );
        }
        function con_adm() {
            if (trim(document.apply.utme_reg.value) == "") {
             bootbox.alert('<table width="100%"><tr width="100%"><td height="" style="border:1px solid #E4E4E4; border-top:none; border-right:none;" width="100%"><img src="images/schl logo_msg.jpg" width="40" height="41" /> ATTENTION !!! </td></tr></table><br><br>Enter the UTME REG NO to confirm Admission');
              document.apply.utme_reg.focus();
              return false;
            } 
		}
</script>

</head>
<body onLoad="return con_adm();">

<?php
require_once("header.php");
?> 




<div class="art-slidenavigator art-slidenavigatorheader" data-left="90.2">
<a href="#" class="art-slidenavigatoritem"></a><a href="#" class="art-slidenavigatoritem"></a><a href="#" class="art-slidenavigatoritem"></a><a href="#" class="art-slidenavigatoritem"></a><a href="#" class="art-slidenavigatoritem"></a>
</div>


<h1 class="art-headline" data-left="10.28%">
    <a href="#">Hon. Justice L.O Aremu's</a>
</h1>
<h2 class="art-slogan" data-left="3.2%">Academy For Executive Diploma Studies</h2>
              
                    
</header>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                <h2 class="art-postheader"><span class="art-postheadericon">Confirm Admission</span></h2>
                     <form action="confirm_adm_code.php" onSubmit="return con_adm();" method="post" name="apply" id="apply">                           
                <div class="art-postcontent art-postcontent-0 clearfix">
                  <p class="MsoNormal" align="center" style="margin-bottom: 7.5pt; text-align: center;"><u><span style="font-size: 10pt; font-family: Georgia, serif; color: black;">ENTER UTME REG NO TO CONFIRM ADMISSION</span></u><br></p>

                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="37%" height="40">&nbsp;</td>
                      <td width="24%">&nbsp;</td>
                      <td width="39%"></td>
                    </tr>
                    <tr>
                      <td>
                      </td>
                      <td align="center">
                      <input type="text" required="required" class="text_field2" name="utme_reg" id="utme_reg" placeholder="Enter the UTME Reg. No." onBlur="this.value=removeSpaces(this.value);" size="20" maxlength="20"></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                      <tr>
                      <td>&nbsp;</td>
                      <td align="center"><input type="submit" name="button" id="button" value="CONFIRM"></td>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                  <p class="MsoNormal" align="center" style="margin-bottom: 7.5pt; text-align: center;">&nbsp;</p>

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
</p><![endif]--><!--[if !vml]--><!--[endif]--></p>

<p><br>
</p>
                </div></form>


</article></div>
                    </div>
                </div>
            </div>
            
            <?php
             require_once("footer.php");
           ?>
    
    </div>
    
</div>


</body></html>
<?php
session_destroy();
?>