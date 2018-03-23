
<?php require_once('Connections/mymember.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
    {
        if (PHP_VERSION < 6) {
            $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
        }

        $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

        switch ($theType) {
            case "text":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "long":
            case "int":
                $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                break;
            case "double":
                $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
                break;
            case "date":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "defined":
                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                break;
        }
        return $theValue;
    }
}

/*$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Rsdb = 5;
$pageNum_Rsdb = 0;
if (isset($_GET['pageNum_Rsdb'])) {
    $pageNum_Rsdb = $_GET['pageNum_Rsdb'];
}
$startRow_Rsdb = $pageNum_Rsdb * $maxRows_Rsdb;*/

mysql_select_db($database_mymember, $mymember);
mysql_query("set names 'utf8'");
$query_Rsdb = "SELECT * FROM member";
//$query_limit_Rsdb = sprintf("%s LIMIT %d, %d", $query_Rsdb, $startRow_Rsdb, $maxRows_Rsdb);
//$Rsdb = mysql_query($query_limit_Rsdb, $mymember) or die(mysql_error());
//$row_Rsdb = mysql_fetch_assoc($Rsdb);
$Rsdb = mysql_query($query_Rsdb, $mymember) or die(mysql_error());
$row_Rsdb = mysql_fetch_assoc($Rsdb);
/*if (isset($_GET['totalRows_Rsdb'])) {
    $totalRows_Rsdb = $_GET['totalRows_Rsdb'];
} else {
    $all_Rsdb = mysql_query($query_Rsdb);
    $totalRows_Rsdb = mysql_num_rows($all_Rsdb);
}
$totalPages_Rsdb = ceil($totalRows_Rsdb/$maxRows_Rsdb)-1;

$queryString_Rsdb = "";
if (!empty($_SERVER['QUERY_STRING'])) {
    $params = explode("&", $_SERVER['QUERY_STRING']);
    $newParams = array();
    foreach ($params as $param) {
        if (stristr($param, "pageNum_Rsdb") == false &&
            stristr($param, "totalRows_Rsdb") == false) {
            array_push($newParams, $param);
        }
    }
    if (count($newParams) != 0) {
        $queryString_Rsdb = "&" . htmlentities(implode("&", $newParams));
    }
}
$queryString_Rsdb = sprintf("&totalRows_Rsdb=%d%s", $totalRows_Rsdb, $queryString_Rsdb);*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>立体车库管理云平台</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <!--
    Visual Admin Template
    http://www.templatemo.com/preview/templatemo_455_visual_admin
    -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<style>
    div.templatemo-content-container{
        font-size:medium;
    }
    div.templatemo-sidebar{
        font-size:medium;
    }
    div.input-group{
        font-size:medium;
    }
    div.row{
        font-size:medium;
    }
    a{
        color:#000000;
    }
</style>
<body>
<!-- Left column -->
<div class="templatemo-flex-row">
    <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
<!--            <div class="square"></div>-->
            <h1>立体车库云平台</h1>
        </header>
        <div class="profile-photo-container">
            <img src="images/profile-photo.jpg" style="width:100%" alt="Profile Photo" class="img-responsive">
<!--            <div class="profile-photo-overlay"></div>-->
        </div>
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
        </div>
        <nav class="templatemo-left-nav">
            <ul>
                <li><a href="adminmanage.php" class="active"><i class="fa fa-eject fa-fw"></i>主页</a></li>
                <li><a href="adminlogin.php"><i class="fa fa-eject fa-fw"></i>管理员登录</a></li>
                <li><a href="adminout.php"><i class="fa fa-eject fa-fw"></i>管理员注销</a></li>
            </ul>
        </nav>
    </div>
    <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
            <div class="row">
                <nav class="templatemo-top-nav col-lg-12 col-md-12">
                    <ul class="text-uppercase">
                        <li><a href="" class="active">用户名单</a></li>
                        <li><a href="getmemberpdf.php">打印</a></li>
                        <li><a href="adminmanage.php">返回主页</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <br>
        <h1 align="center" style="margin-top:10px;">
            立体车库用户名单
        </h1>
        <br>
        <br>
        <div class="templatemo-flex-row flex-content-row">
<!--        共有--><?php //echo $totalRows_Rsdb ?><!-- 位用户，目前查看第--><?php //echo ($startRow_Rsdb + 1) ?><!--至第--><?php //echo min($startRow_Rsdb + $maxRows_Rsdb, $totalRows_Rsdb) ?><!--位-->
            <div class="col-1">
                <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                    <i class="fa fa-times"></i>
                    <div class="panel-heading templatemo-position-relative"><h2 class="text-uppercase">User Table</h2></div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td>序号</td>
                                <td>用户名</td>
                                <td>车牌号</td>
                                <td>车型</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php do { ?>
                            <tr>
                                <td><?php echo $row_Rsdb['id']; ?></td>
                                <td><?php echo $row_Rsdb['username']; ?></td>
                                <td><?php echo $row_Rsdb['car_num']; ?></td>
                                <td><?php echo $row_Rsdb['car_type']; ?></td>
                            </tr>
                            <?php } while ($row_Rsdb = mysql_fetch_assoc($Rsdb)); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <script src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
        <script src="js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->
        <script src="https://www.google.com/jsapi"></script> <!-- Google Chart -->
        <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->
    </div>

</body>
</html>
<?php
mysql_free_result($Rsdb);
?>
