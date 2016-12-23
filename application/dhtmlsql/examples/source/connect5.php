<?php 
$mysqli = @new mysqli('localhost','root','manunited@2016','dbtest');

require "../../library/dhtmlsql.php";


$db=DHTMLSQL::connect($mysqli);

if(!$db->connected()) {
exit("Unable to connect to database");
}

//Sets MySQL character set and collation
$db->set_charset('utf8','utf8_general_ci');

echo "Database connection was successful<br/><br/>";
?>