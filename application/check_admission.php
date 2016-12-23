<?php


require './bootstrap.php';
header('Content-Type: application/json');
session_start();
$data = ['name'];
$_POST['jamb_number'] = '25849848BG';

if(isset($_POST['jamb_number']) && strlen($_POST['jamb_number']) == 10) {

    $status = $app::$user->check_admission_status( $_POST['jamb_number'], ( new Validator() ) );
    echo json_encode($status);
} else {
    echo json_encode(array('error' => strlen($_POST['jamb_number']) + " There is an error in what you put in as jamb number "));
}







