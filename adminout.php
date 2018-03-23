<?php
/**
 * Created by PhpStorm.
 * User: Studio
 * Date: 2017/11/14
 * Time: 22:09
 */
session_start();
$_SESSION['adminLogined'] = "unlogined";
if(isset($_SESSION['adminLogined'])) {
    if ($_SESSION['adminLogined'] == "unlogined") {
        header('Location: adminlogin.php');
    }
}

?>