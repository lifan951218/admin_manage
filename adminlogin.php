<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">  
	    <title>立体车库管理平台-管理员登陆</title>
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
    if(isset($_SESSION['adminLogined'])){
        if($_SESSION['adminLogined']=="logined"){
            header('Location: adminmanage.php');
        }
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST["submit"]) && $_POST["submit"] == "登录")
        {
            $user = $_POST["username"];
            $psw = $_POST["password"];
            if($user == "" || $psw == "")
            {
                // echo "<script> history.go(-1);</script>";
                $loginFail=true;
            }
            else{
                if($user == "admin" && $psw == "123456"){

                    $_SESSION['adminLogined']='logined';
                    header('Location: adminmanage.php');
                }
                else{
                    // echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";
                    $loginFail=true;
                }
            }
        }
        else
        { echo "<script>alert('提交未成功！'); history.go(-1);</script>";
        }

    }


    ?>
    <body class="templatemo-flex-row">
    <div class="templatemo-content-widget templatemo-login-widget white-bg">
        <header class="text-center">
            <div class="square"></div>
            <h1>管理员登陆</h1>
        </header>
        <form class="templatemo-login-form" method="post" action="adminlogin.php">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>
                    <input type="text" class="form-control" name="username" id="username" placeholder="用户名">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>
                    <input type="password" class="form-control" name="password" id="password" placeholder="密码">
                </div>
            </div>
            <div class="form-group">
                <button  class="templatemo-blue-button width-100" type="submit"  name="submit" value="登录">登录</button>
            </div>
            <?php if(isset($loginFail)) echo '<div style="align:right;margin-left: 20%;font-size: 14px;color:#FF0000;"><span>登陆失败!</span></div>'; ?>
        </form>

    </div>
    </body>
</html>

