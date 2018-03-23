
<?php require_once('Connections/mygarage.php'); ?>
<?php
mysql_query("set names 'utf8'");
mysql_select_db($database_mygarage, $mygarage);
$query_Rsdb = "SELECT * FROM parking_info";

$Rsdb = mysql_query($query_Rsdb, $mygarage) or die(mysql_error());
$row_Rsdb = mysql_fetch_assoc($Rsdb);

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
                        <li><a href="" class="active">停车信息</a></li>
                        <li><a href="adminmanage.php">返回主页</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <br>
        <h1 align="center" style="margin-top:10px;">
            停车信息
        </h1>
        <br>
        <br>
        <div class="templatemo-flex-row flex-content-row">
            <div class="col-1">
                <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                    <i class="fa fa-times"></i>
                    <div class="panel-heading templatemo-position-relative"><h2 class="text-uppercase">Parking Table</h2></div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td>序号</td>
                                <td>用户名</td>
                                <td>车牌号</td>
                                <td>车库号</td>
                                <td>开始时间</td>
                                <td>离开时间</td>、
                                <td>停车费用</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php do { ?>
                                <tr>
                                    <td><?php echo $row_Rsdb['parking_id']; ?></td>
                                    <td><?php echo $row_Rsdb['username']; ?></td>
                                    <td><?php echo $row_Rsdb['car_num']; ?></td>
                                    <td><?php echo $row_Rsdb['garage_num']; ?></td>
                                    <td><?php echo $row_Rsdb['start_time']; ?></td>
                                    <td><?php echo $row_Rsdb['leave_time']; ?></td>
                                    <td><?php echo $row_Rsdb['money']; ?></td>
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
