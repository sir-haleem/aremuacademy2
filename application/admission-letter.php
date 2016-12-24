<?php
require "./adm_letter_logic.php";

$firstname = $aspirant_details['firstname'];

$surname = $aspirant_details['surname'];

$othernames = $aspirant_details['othernames'];

$jambNumber = $aspirant_details['jamb_number'];

$course = $aspirant_details['course'];
?>





<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>L.O.A Academy</title>
    <meta name="description" content="Aremu">
    
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="all" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" media="all" href="../assets/css/custom.css">
    <!--[if lt IE 9]>
			<script src="../assets/js/html5shiv.min.js"></script>
			<script src="../assets/js/respond.min.js"></script>
		<![endif]-->
    <script>
        function trim(s) {
            return s.replace(/^\s*/, "").replace(/\s*$/, "");
        }
    </script>
</head>

<body class="adm_letter">


<?php if ($status === "Admitted") { ?>


    <header class="container adm-header">

        <section class="row">
            
            <div class="col-xs-3 ">
                <img src="../assets/img/ABS_logo.jpg" class="img img-rounded img-responsive pull-right" width="50" height="70" alt="ABS">
                
            </div>

            <div class="col-xs-9 text-center name">
                <h2>
                    <span style="">HON. JUSTICE L.O AREMU'S</span>
                    <span class="text-uppercase">Academy For Executive Diploma Studies</span>
                </h2>
            </div>
        </section>
    </header>

    <main class="container adm-body">
        <section class="row">
            <div class="col-xs-12 text-center">
                <p>
                    <strong><u>Admission Letter</u></strong>
                </p>
            </div>
        </section>
        <section class="row">
            <section class="col-xs-12">
                <p align="left"><strong>Dear <?=$surname?> <?=$firstname?> <?=$othernames?>, </strong></p>
                <p align="center"><strong><u>RE: PROVISIONAL ADMISSION FOR 2015/2016 ACADEMICS SESSION</u></strong></p>
            </section>
        </section>

        <section class="row">
            <section class="col-xs-12 text-justified">
                <p
                    >In reference to your application with JAMB Number <strong><?= strtoupper($jambNumber)?></strong>, you have been offered provisional admission into HON. JUSTICE L.O AREMU'S ACADEMY, Ibadan to study <strong><?= strtoupper($course)?></strong>.                
                </p>

                <p>
                    You are to report to the school (<strong>L. O. A. COURT 102, BASHORUN ASHI/BODIJA JUNCTION, IBADAN, OYO STATE, NIGERIA)</strong> with 
                    <ul>
                        <li>A copy of your JAMB result slip</li>
                        <li>0'level result</li>
                        <li>Four(4) Passport Photographs</li>
                    </ul>

                     Within 2 weeks of this notification.
                </p>

                <p>
                    You are required to print three copies of the admission letterand submit a copy to the Account Department, a copy to the H.O.D of your Department. Keep the 3rd copy for your own record.
                </p>

                <p>
                    You are required to pay the sum of N157,500 :00 for <u>Registration</u> and <u>Tuition fee</u>. N7,500 is for Registeration, while Tuition fee is N75,000 per semester. All payments are madde to <strong>[ UBA Bank, Acc. No: 1017536939, Acc Name: AREMU ACADEMY ]</strong>.
                    <br />
                    <br />
                    <strong>NB: Come along with Payment teller to complete your registrations</strong>. 
                    <br />
            </section>
        </section>

        <section class="row">
                <section class="col-xs-12 text-left">                       
                                                    
                    <p><strong>Student Signature:</strong> _________________ </p>
                    <br />

                    <p><strong>Account Department:</strong> ______________________</p>
                    <br />
                    
                    <p><strong> Head Of Department:</strong> ______________________</p>
                    <br />
                </section>
        </section>

        <section class="row">
                    <section class="col-xs-12">
                        <p>
                            Yours faithfully,
                        </p>
                        <p>
                            Aremu Y.N.
                        </p>
                        <p>
                            Registrar
                        </p>
                    </section>
                </section>
    </main> 

<script>
    window.print();
</script>                              
<?php } else {
    header("Location: http://" . $_SERVER["SERVER_NAME"]."/index.html#applications-tab");
} ?>                                    
                                        
    <footer class="col-xs-12 text-center footer adm-footer">
        <p>
            Copyright &copy; 2015.
        </p>

        <p>
            HON. JUSTICE L.O AREMU'S ACADEMY FOR EXECUTIVE DIPOMA STUDIES &amp; CENTRE FOR LEGAL STUDIES
        </p>
    </footer>

    <script src="./assets/js/jquery-1.9.1.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
</body>

</html>