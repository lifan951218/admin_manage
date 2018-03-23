<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">  
	    <title>立体车库管理平台</title>
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
	<?php
    session_start();
    header("Content-type: text/html; charset=utf-8");
    if($_SESSION['adminLogined']==null){
      header('Location: adminlogin.php');
    }
    ?>
    <body>
    <div class="templatemo-flex-row">
          <div class="templatemo-sidebar">
            <header class="templatemo-site-header">
    <!--          <div class="square"></div>-->
              <h1>立体车库云平台</h1>
            </header>
            <div class="profile-photo-container">
              <img src="images/profile-photo.jpg" style="width:100%" alt="Profile Photo" class="img-responsive">
    <!--          <div class="profile-photo-overlay"></div>-->
            </div>
            <div class="mobile-menu-icon">
                <i class="fa fa-bars"></i>
            </div>
            <nav class="templatemo-left-nav">
              <ul>
                <li><a href="adminmanage.php" class="active"><i class="fa fa-eject fa-fw"></i>主页</a></li>
                <li><a href="adminlogin.php"><i class="fa fa-eject fa-fw"></i>管理员登录</a></li>
                <li><a href="adminout.php"><i class="fa fa-database fa-fw"></i>管理员注销</a></li>
              </ul>
            </nav>
          </div>
          <div class="templatemo-content col-1 light-gray-bg">
            <div class="templatemo-top-nav-container">
              <div class="row">
                <nav class="templatemo-top-nav col-lg-12 col-md-12">
                  <ul class="text-uppercase">
                    <li><a href="" class="active">管理后台</a></li>
                  </ul>
                </nav>
              </div>
            </div>
            <br>
                  <h1 align="center" style="margin-top:10px;">
                   立体车库管理平台
                 </h1>
             <br>
             <br>
          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-1 text-center">
                     <br>
                     <h2 style="text-align: center;">
                            <a href="showmember.php" title="用户信息">用户信息</a>
                    </h2>
                    <br>
                  <img src="images/1.jpg" alt="Bicycle" class="img-circle img-thumbnail">
            </div>
            <div class="templatemo-content-widget white-bg col-1 text-center">
                  <br>
                  <h2 style="text-align: center;">
                      <a href="showgarage.php" title="车库信息">车库信息</a>
                  </h2>
                  <br>
                  <img src="images/2.jpg" alt="Bicycle" class="img-circle img-thumbnail">
            </div>
          </div>
              <div class="templatemo-flex-row flex-content-row">
                  <div class="templatemo-content-widget white-bg col-1 text-center">
                      <br>
                      <h2 style="text-align: center;">
                          <a href="show_order_info.php" title="预约信息">预约信息</a>
                      </h2>
                      <br>
                      <img src="images/1.jpg" alt="Bicycle" class="img-circle img-thumbnail">
                  </div>
                  <div class="templatemo-content-widget white-bg col-1 text-center">
                      <br>
                      <h2 style="text-align: center;">
                          <a href="show_parking_info.php" title="停车信息">停车信息</a>
                      </h2>
                      <br>
                      <img src="images/2.jpg" alt="Bicycle" class="img-circle img-thumbnail">
                  </div>
              </div>
              <div class="templatemo-flex-row flex-content-row">
                  <div class="templatemo-content-widget white-bg col-1 text-center">
                      <br>
                      <h2 style="text-align: center;">
                          <a href="" title="计费信息">计费信息</a>
                      </h2>
                      <br>
                      <img src="images/1.jpg" alt="Bicycle" class="img-circle img-thumbnail">
                  </div>
                  <div class="templatemo-content-widget white-bg col-1 text-center">
                      <br>
                      <h2 style="text-align: center;">
                          <a href="" title="车库运行数据">车库运行数据</a>
                      </h2>
                      <br>
                      <img src="images/2.jpg" alt="Bicycle" class="img-circle img-thumbnail">
                  </div>
              </div>
        </div>
     </div>
</body>
</html>