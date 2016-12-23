<?php
session_start();

if ($_POST && !empty($_POST['password'])) {
$_SESSION['password'] = $_POST['password'];
}

$spass = $_SESSION['password'];
 ?>