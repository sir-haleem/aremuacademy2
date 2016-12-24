<?php
    require "./bootstrap.php";
    $jamb_no = strtolower( $_GET["jamb_number"]);
    if(isset($jamb_no) && strlen($jamb_no) == 10) {

    $aspirant = $app::$user->check_admission_status( $jamb_no, ( new Validator() ) );
    $status = $aspirant["status"];

    if ($status = "Admitted") {
        $aspirant_details = $app::$user->get_aspirant_data($jamb_no, ( new Validator() ) );
        
    }
}
?>