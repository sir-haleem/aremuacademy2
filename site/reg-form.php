<?php
require_once("admin.php");
require_once("session.php");
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

       
<script language="javascript" type="text/javascript">
function removeSpaces(string) {
 return string.split(" ").join("");
}
</script> 


<script>
		function trim(s) {
            return s.replace( /^\s*/, "" ).replace( /\s*$/, "" );
        }
        function check() {
			
             if (trim(document.apply.surname.value) == "") {
              bootbox.alert("Enter Your Surname/Family name");
              document.apply.surname.focus();
              return false;
            } else if(trim(document.apply.othernames.value)=="") {
              bootbox.alert("Enter Your Other Name(s)");
              document.apply.othernames.focus();
              return false;
            } else if(trim(document.apply.address.value)=="") {
              bootbox.alert("Provide an Address");
              document.apply.address.focus();
              return false;
            } else if(trim(document.apply.day.value)=="Dy" || trim(document.apply.mon.value)=="Month" || trim(document.apply.yea.value)=="Year") {
              bootbox.alert("Provide Date of Birth");
              document.apply.day.focus();
              return false;
			} else if(trim(document.apply.marr_status.value)=="Select") {
              bootbox.alert("Select your Marital Status");
              document.apply.marr_status.focus();
              return false;
			} else if(trim(document.apply.state.value)=="Select") {
              bootbox.alert("Select your State of Origin");
              document.apply.state.focus();
              return false;
			} else if(trim(document.apply.religion.value)=="Select") {
              bootbox.alert("Select Religion");
              document.apply.religion.focus();
              return false;      
            } else if(trim(document.apply.p_address.value)=="") {
              bootbox.alert("Provide Parent/Guardian Address");
              document.apply.p_address.focus();
              return false;
			} else if(trim(document.apply.telephone.value)=="") {
              bootbox.alert("Provide a valid Telephone/Mobile No");
              document.apply.telephone.focus();
              return false;
            }  else if(trim(document.apply.p_name.value)=="") {
              bootbox.alert("Provide Parent/Guardian Name");
              document.apply.p_name.focus();
              return false;
			}  else if(trim(document.apply.p_phone.value)=="") {
              bootbox.alert("Provide Parent/Guardian valid Telephone/Mobile No");
              document.apply.p_phone.focus();
              return false;  
            } else if(trim(document.apply.course.value)=="Select") {
              bootbox.alert("Select Course of Study");
              document.apply.course.focus();
              return false;      
			} else if(document.apply.file.value!=""){
			//dgjg
var extensions = new Array();
	
extensions[0] = "jpg";
extensions[1] = "jpeg";
extensions[2] = "gif";
extensions[3] = "png";
extensions[4] = "bmp";

var file = document.apply.file.value;

var image_length = document.apply.file.value.length;

var pos = file.lastIndexOf('.') + 1;

var ext = file.substring(pos, image_length);

var final_ext = ext.toLowerCase();

for (i = 0; i < extensions.length; i++)
  {
       if(extensions[0] == final_ext ||
	      extensions[1] == final_ext ||
		  extensions[2] == final_ext ||
		  extensions[3] == final_ext ||
		  extensions[4] == final_ext 
	      )
        {
		///
		
		(bootbox.confirm("Submit Information?", function(result) {
					
				if(result===true){
					
					document.forms["apply"].submit();
					
					}
					
				} ));
						
			return false;
			
	   ////
        }
       else{
bootbox.alert("You must upload an image file with one of the following extensions: [ "+ extensions.join(', .') + " ]", function(result){
	});
document.apply.file.focus();	
return false

          }
      }
					
   }
}
</script>

</head>
<body>

<?php 

$rs_utme_reg = $s_utme_reg;

if(empty($rs_utme_reg)){?>

<script>
bootbox.alert("Un-authorized Access, try again")
window.parent(location="confirm_adm.php");
</script>
<?php
}
?>

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
                                <h2 class="art-postheader"><span class="art-postheadericon">Registration Form</span></h2>
                     <form action="reg-form-code.php"  method="post" enctype="multipart/form-data" name="apply" id="apply" onSubmit="return check();">                           
                <div class="art-postcontent art-postcontent-0 clearfix">
                  <p class="MsoNormal" align="center" style="margin-bottom: 7.5pt; text-align: center;"><u><span style="font-size: 10pt; font-family: Georgia, serif; color: black;">FIIL IN THE FORM TO APPLY FOR ADMISSION</span></u><br></p>

<p class="MsoNormal" align="center" style="margin-bottom: 7.5pt; text-align: center;"><span style="font-size: 10pt; font-family: Georgia, serif; color: black;"><span style="font-weight: bold;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></span><span style="font-family: Georgia, serif; color: rgb(0, 0, 0);"><span style="font-weight: bold;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="font-weight: bold;"> &nbsp; &nbsp;&nbsp;</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="font-weight: bold;"> &nbsp; &nbsp;&nbsp;</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="font-weight: bold;"> &nbsp; &nbsp;&nbsp;</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="font-weight: bold;"> &nbsp; &nbsp;&nbsp;</span>&nbsp; &nbsp; &nbsp; &nbsp;</span></p>

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

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><b> Surname: </b></td>
    <td><b>
      <input name="surname" required="required" type="text" class="text_field2" id="surname">
    </b></td>
    <td width="8%"><b>Othernames:</b></td>
    <td colspan="2"><b>
      <input name="othernames" required="required" type="text" class="text_field2" id="othernames">
    </b></td>
    <td width="2%">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="6">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" align="right"><b>Residential Address:</b></td>
    <td colspan="2" valign="top"><label for="address"></label>
      <textarea name="address" required="required" class="text_field2" id="address"></textarea></td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td width="13%"><b>Date of Birth:</b></td>
    <td colspan="5">Dy
      <select name="day" required="required" id="day">
        <option>Dy</option>
<option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
        </select>
      &nbsp;&nbsp;Mn&nbsp;
      <select name="mon" required="required" id="mon">
        <option value="Month" selected="selected">Month</option>
        <option value="january">January</option>
        <option value="february">February</option>
        <option value="march">March</option>
        <option value="april">April</option>
        <option value="may">May</option>
        <option value="june">June</option>
        <option value="july">July</option>
        <option value="august">August</option>
        <option value="september">September</option>
        <option value="october">October</option>
        <option value="november">November</option>
        <option value="december">December</option>
        </select>
      &nbsp;Yr
      <select name="yea" required="required" id="yea">
        <option value="Year" selected="selected">Year</option>
        <option value="2000">2000</option>
        <option value="1999">1999</option>
        <option value="1998">1998</option>
        <option value="1997">1997</option>
        <option value="1996">1996</option>
        <option value="1995">1995</option>
        <option value="1994">1994</option>
        <option value="1993">1993</option>
        <option value="1992">1992</option>
        <option value="1991">1991</option>
        <option value="1990">1990</option>
        <option value="1989">1989</option>
        <option value="1988">1988</option>
        <option value="1987">1987</option>
        <option value="1986">1986</option>
        <option value="1985">1985</option>
        <option value="1984">1984</option>
        <option value="1983">1983</option>
        <option value="1982">1982</option>
        <option value="1981">1981</option>
        <option value="1980">1980</option>
        <option value="1979">1979</option>
        <option value="1978">1978</option>
        <option value="1977">1977</option>
        <option value="1976">1976</option>
        <option value="1975">1975</option>
        <option value="1974">1974</option>
        <option value="1973">1973</option>
        <option value="1972">1972</option>
        <option value="1971">1971</option>
        <option value="1970">1970</option>
        <option value="1969">1969</option>
        <option value="1968">1968</option>
        <option value="1967">1967</option>
        <option value="1966">1966</option>
        <option value="1965">1965</option>
        <option value="1964">1964</option>
        <option value="1963">1963</option>
        <option value="1962">1962</option>
        <option value="1961">1961</option>
        <option value="1960">1960</option>
        <option value="1959">1959</option>
        <option value="1958">1958</option>
        <option value="1957">1957</option>
        <option value="1956">1956</option>
        <option value="1955">1955</option>
        <option value="1954">1954</option>
        <option value="1953">1953</option>
        <option value="1952">1952</option>
        <option value="1951">1951</option>
        <option value="1950">1950</option>
      </select></td>
    </tr>
    <tr>
    <td colspan="6">&nbsp;</td>
    </tr><tr>
    <td width="13%"><b>E-mail Address:</b></td>
    <td colspan="3"><b>
      <input name="email" type="text" id="email">
    </b></td>
    <td width="19%">&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
     <tr>
    <td colspan="6">&nbsp;</td>
    </tr>
  <tr>
    <td>Gender:</td>
    <td width="20%">Male [
      <input type="radio" required="required" name="gender" id="radio" value="MALE">
      ] Female
      [
      <label for="gender">
        <input type="radio" required="required" name="gender" id="radio2" value="FEMALE">
        ]
      </label></td>
    <td colspan="4" rowspan="9" align="center"><table style="border:5px inset #CCC;" width="99%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="227" align="center"><p>ADMISSION CONFIRMED WITH UTME REG NO: [ <?=$s_utme_reg?> ]          </p></td>
        </tr>
    </table></td>
    </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td>Marital Status:</td>
    <td><select name="marr_status"  required="required" id="select">
      <option value="Select" selected="selected">Select</option>
      <option value="SINGLE">SINGLE</option>
      <option value="MARRIED">MARRIED</option>
      <option value="DIVORCED">DIVORCED</option>
    </select></td>
    </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td>State of Origin:</td>
    <td><select name="state" required="required" id="state">
      <option value="Select" selected="selected">Select</option>
      <option value="Abia State">Abia State</option>
      <option value="Adamawa State">Adamawa State</option>
      <option value="Akwa Ibom State">Akwa Ibom State</option>
      <option value="Anambra State">Anambra State</option>
      <option value="Bauchi State">Bauchi State</option>
      <option value="Bayelsa State">Bayelsa State</option>
      <option value="Benue State">Benue State</option>
      <option value="Borno State">Borno State</option>
      <option value="Cross River State">Cross River State</option>
      <option value="Delta State">Delta State</option>
      <option value="Ebonyi State">Ebonyi State</option>
      <option value="Edo State">Edo State</option>
      <option value="Ekiti State">Ekiti State</option>
      <option value="Enugu State">Enugu State</option>
      <option value="Gombe State">Gombe State</option>
      <option value="Imo State">Imo State</option>
      <option value="Jigawa State">Jigawa State</option>
      <option value="Kaduna State">Kaduna State</option>
      <option value="Kano State">Kano State</option>
      <option value="Kastina State">kastina State</option>
      <option value="Kebbi State">Kebbi State</option>
      <option value="Kogi State">Kogi State</option>
      <option value="Kwara State">Kwara State</option>
      <option value="Lagos State">Lagos State</option>
      <option value="Nasarawa State">Nasarawa State</option>
      <option value="Niger State">Niger State</option>
      <option value="Ogun State">Ogun State</option>
      <option value="Ondo State">Ondo State</option>
      <option value="Osun State">Osun State</option>
      <option value="Oyo State">Oyo State</option>
      <option value="Plateau State">Plateau State</option>
      <option value="Rivers State">Rivers State</option>
      <option value="Sokoto State">Sokoto State</option>
      <option value="Taraba State">Taraba State</option>
      <option value="Yobe State">Yobe State</option>
      <option value="Zamfara State">Zamfara State</option>
    </select></td>
    </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td>Religion:</td>
    <td><select name="religion" required="required" id="religion">
      <option value="Select" selected="selected">Select</option>
      <option value="CHRISTIAN">CHRISTIAN</option>
      <option value="MUSLIM">MUSLIM</option>
      <option value="OTHERS">OTHERS</option>
    </select></td>
    </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td height="29">Nationality:</td>
    <td><select name="nation" required="required" id="nation">
      <option value="NIGERIA">NIGERIA</option>
    </select></td>
    </tr>
  <tr>
    <td colspan="6">&nbsp;</td>
    </tr>
    <tr>
    <td colspan="2">Parent/Guardian Address: </td>
    <td colspan="2"><textarea name="p_address" required="required" class="text_field2" id="p_address"></textarea></td>
    <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
    <td>Candidate Telephone:</td>
    <td><b>
      <input name="telephone" required="required" type="text" class="text_field2" id="telephone">
    </b></td>
    <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
    <td colspan="6">&nbsp;</td>
    </tr>
      <tr>
        <td title="Computer Literate?">Computer Lit:</td>
        <td>Yes [
          <input type="radio" required="required" name="comp" id="radio" value="YES">
          ] No
          [
          <label for="gender">
    <input type="radio" required="required" name="comp" id="radio2" value="NO">
    ] </label></td>
    <td colspan="4">&nbsp;</td>
    </tr>
      <tr>
    <td colspan="6">&nbsp;</td>
    </tr>
      <tr>
    <td colspan="2">Name of Parent/Guardian:</td>
    <td colspan="2"><b>
      <input name="p_name" required="required" type="text" class="text_field2" id="p_name">
    </b></td>
    <td colspan="2">&nbsp;</td>
    </tr>
      <tr>
    <td colspan="6">&nbsp;</td>
    </tr>
     <tr>
    <td colspan="2">Contact Telephone of
Parent/Guardian:</td>
    <td colspan="2"><b>
      <input name="p_phone" required="required" type="text" class="text_field2" id="p_phone">
    </b></td>
    <td colspan="2">&nbsp;</td>
    </tr>
     <tr>
    <td colspan="6">&nbsp;</td>
    </tr>
     <tr>
    <td colspan="2">Objective for Attending
Course in Details:</td>
    <td colspan="2"><textarea name="course_obj" class="text_field2" id="course_obj"></textarea></td>
    <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
    <td colspan="6">&nbsp;</td>
    </tr><tr>
    <td colspan="2">Institutions Attended and
Educational Qualification:</td>
    <td colspan="2"><textarea name="inst_det" class="text_field2" id="inst_det"></textarea></td>
    <td colspan="2">&nbsp;</td>
    </tr><tr>
    <td colspan="6">&nbsp;</td>
    </tr><tr style=" background:#F8F8F8;">
    <td colspan="2">Course Applied For:</td>
    <td colspan="4"><select name="course" required="required" id="course">
      <option value="Select" selected="selected">Select</option>
      <option value="Graduate Law Student Awaiting Law School">Graduate Law Student Awaiting Law School </option>
      <option value="Preparatory Class Through Cambridge">Preparatory Class Through Cambridge</option>
      <option value="Diploma in Law of the Institute of Legal Executives England">Diploma in Law of the Institute of Legal Executives England</option>
      <option value="Certificate Law Summer School">Certificate Law Summer School</option>
      <option value="One Week Course to equip new wigs in legal practice after call to the bar">One Week Course to equip new wigs in legal practice after call to the bar</option>
      <option value="Paralegal studies leading to OND Accredited by the NBTE">Paralegal studies leading to OND Accredited by the NBTE</option>
      
    </select></td>
    </tr><tr>
    <td colspan="6">&nbsp;</td>
    </tr>
    <tr>
    <td colspan="2">Areas of Subject
Interested In:</td>
    <td colspan="2"><b>
      <input name="sub_intre" type="text" class="text_field2" id="sub_intre">
    </b></td>
    <td colspan="2">&nbsp;</td>
    </tr><tr>
    <td colspan="6">&nbsp;</td>
    </tr>
    <tr>
    <td colspan="2">Upload Valid passport Photograph: 
      <label for="file"></label></td>
    <td colspan="4"><input type="file" required="required" name="file" id="file"></td>
    </tr>
    <tr>
    <td colspan="6">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="6"><p class="MsoNormal" style="margin-top: 7.5pt; margin-right: 0in; margin-bottom: 7.5pt; margin-left: 0in;"><b><span style="font-size: 8pt; font-family: 'Century Gothic', sans-serif;">&nbsp; State of Particular
      Course:-</span></b></p>
      <p class="MsoNormal" style="margin-top: 0in; margin-right: 0in; margin-left: 6.9pt; margin-bottom: 0.0001pt; text-indent: -0.25in; padding-left: 20px;">
        <!--[if !supportLists]-->
        <span style="font-size: 8pt; font-family: 'Century Gothic', sans-serif; color: rgb(30, 30, 11);">1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
        <!--[endif]-->
        <b><span style="font-size: 8pt; font-family: 'Century Gothic', sans-serif; color: rgb(30, 30, 11);">Innovation Diploma in
          paralegal studies (NID)</span></b></p>
      <p class="MsoNormal" style="margin-top: 0in; margin-right: 0in; margin-left: 6.9pt; margin-bottom: 0.0001pt; text-indent: -0.25in; padding-left: 20px;">
        <!--[if !supportLists]-->
        <span style="font-size: 8pt; font-family: 'Century Gothic', sans-serif; color: rgb(30, 30, 11);">2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
        <!--[endif]-->
        <b><span style="font-size: 8pt; font-family: 'Century Gothic', sans-serif; color: rgb(30, 30, 11);">A' Levels</span></b></p>
      <p class="MsoNormal" style="margin-top: 0in; margin-right: 0in; margin-left: 6.9pt; margin-bottom: 0.0001pt; text-indent: -0.25in; padding-left: 20px;">
        <!--[if !supportLists]-->
        <span style="font-size: 8pt; font-family: 'Century Gothic', sans-serif; color: rgb(30, 30, 11);">3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
        <!--[endif]-->
        <b><span style="font-size: 8pt; font-family: 'Century Gothic', sans-serif; color: rgb(30, 30, 11);">Diploma in Law (CILEX)</span></b></p>
      <p class="MsoNormal" style="margin-top: 0in; margin-right: 0in; margin-left: 6.9pt; margin-bottom: 0.0001pt; text-indent: -0.25in; padding-left: 20px;">
        <!--[if !supportLists]-->
        <span style="font-size: 8pt; font-family: 'Century Gothic', sans-serif; color: rgb(30, 30, 11);">4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
        <!--[endif]-->
        <b><span style="font-size: 8pt; font-family: 'Century Gothic', sans-serif; color: rgb(30, 30, 11);">Certificate in Law course
          (6 weeks)</span></b></p>
      <p>&nbsp;</p>
      <p class="MsoNormal" align="center" style="margin-top: 7.5pt; margin-right: 0in; margin-bottom: 7.5pt; margin-left: 0in; text-align: center;"><b><u><span style="font-size: 11.5pt; font-family: 'Century Gothic', sans-serif; color: rgb(30, 30, 11);">ENTRY
        QUALIFICATION</span></u></b></p>
      <p class="MsoNormal" style="margin-top: 0in; margin-right: 0in; margin-left: 6.9pt; margin-bottom: 0.0001pt; text-indent: -0.25in; padding-left: 20px;">
        <!--[if !supportLists]-->
        <span style="font-size: 10pt; font-family: Symbol; color: rgb(30, 30, 11);">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><b><i><span style="font-size: 8pt; font-family: Georgia, serif; color: rgb(30, 30, 11);">Ecxept for candidates at the law school and new
          wigs who must have a degree in law, all others need to have credit in five (5) O'
          Level subjects including English Language and literature.</span></i></b></p>
      <p class="MsoNormal" style="margin-top: 0in; margin-right: 0in; margin-left: 6.9pt; margin-bottom: 0.0001pt; text-indent: -0.25in; padding-left: 20px;"><b><i><span style="font-size: 8pt; font-family: Georgia, serif; color: rgb(30, 30, 11);"><br>
      </span></i></b></p>
      <p class="MsoNormal" style="margin-top: 0in; margin-right: 0in; margin-left: 6.9pt; margin-bottom: 0.0001pt; text-indent: -0.25in; padding-left: 20px;">
        <!--[if !supportLists]-->
        <span style="font-size: 10pt; font-family: Symbol; color: rgb(30, 30, 11);">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><b><i><span style="font-size: 8pt; font-family: Georgia, serif; color: rgb(30, 30, 11);">National Innovation Diploma should have a
          Certificate in paralegal Studies passed at credit level with not less than
          2years working experience plus four(4) passes in the SSCE or its equivalent
          (GCE level, WASCE, Teache's Grade II, e.t.c) and not more than one sittings.</span></i></b></p>
      <p class="MsoNormal" style="margin-top: 0in; margin-right: 0in; margin-left: 6.9pt; margin-bottom: 0.0001pt; text-indent: -0.25in; padding-left: 20px;"><b><i><span style="font-size: 8pt; font-family: Georgia, serif; color: rgb(30, 30, 11);"><br>
      </span></i></b></p>
      <p class="MsoNormal" style="margin-top: 0in; margin-right: 0in; margin-left: 6.9pt; margin-bottom: 0.0001pt; text-indent: -0.25in; padding-left: 20px;">
        <!--[if !supportLists]--></p></td>
    </tr>
  <tr>
    <td colspan="6">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    <td colspan="4"><input type="reset" name="Reset" id="button" value="RESET">
      <input type="submit" name="button2" id="button2" value="REGISTER NOW"></td>
    </tr>
</table>
<p><span style="color: rgb(30, 30, 11); font-family: Georgia, serif; font-size: 11px; font-style: italic; font-weight: bold;"><br>
</span></p>

<p>&nbsp;<span style="font-weight: bold; color: #E2341D;">Note:</span> <span style="font-size: 14px; color: rgb(226, 52, 29); font-family: 'Century Gothic';">Click on REGISTER NOW to Submit your information, RESET button will clear all information.</span></p><p><br></p></div></form>


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