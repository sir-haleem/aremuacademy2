<?php
session_start();

if ($_POST && !empty($_POST['utme_reg'])) {
$_SESSION['utme_reg'] = $_POST['utme_reg'];
}

$s_utme_reg = $_SESSION['utme_reg'];
 ?>