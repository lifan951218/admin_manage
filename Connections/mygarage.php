<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_mygarage = "localhost";
$database_mygarage = "garage";
$username_mygarage = "root";
$password_mygarage = "123456";
$mygarage = mysql_pconnect($hostname_mygarage, $username_mygarage, $password_mygarage) or trigger_error(mysql_error(),E_USER_ERROR);
?>