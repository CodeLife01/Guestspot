<?php
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';

$mysql_db = 'guestspot';

@mysqli_connect($mysql_host, $mysql_user, $mysql_pass);
@mysqli_select_db($mysql_db);

echo 'Ok!';