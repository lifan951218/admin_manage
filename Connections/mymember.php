<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_mymember = "localhost";
$database_mymember = "member";
$username_mymember = "root";
$password_mymember = "123456";
$mymember = mysql_pconnect($hostname_mymember, $username_mymember, $password_mymember) or trigger_error(mysql_error(),E_USER_ERROR); 
?>