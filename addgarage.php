<?php require_once('Connections/mygarage.php'); ?>
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
            case "float":
                $theValue = ($theValue != "") ? floatval($theValue) : "NULL";
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
    $insertSQL = sprintf("INSERT INTO garage_info(image, latitude, longtitude, id, freenum) VALUES (%s, %s, %s, %s, %s)",
        GetSQLValueString($_POST['image'], "text"),
        GetSQLValueString($_POST['latitude'], "float"),
        GetSQLValueString($_POST['longtitude'], "float"),
        GetSQLValueString($_POST['id'], "int"),
        GetSQLValueString($_POST['freenum'], "int"));


    mysql_select_db($database_mygarage, $mygarage);
    $Result1 = mysql_query($insertSQL, $mygarage) or die(mysql_error());

    $insertGoTo = "showgarage.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
        $insertGoTo .= $_SERVER['QUERY_STRING'];
    }
    header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>添加记录</title>
    <style type="text/css">
        .aline_center {	text-align: center;
        }
    </style>
</head>

<body>
<p class="aline_center">车库添加系统</p>
<hr />
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
    <table width="300" border="1" align="center" cellpadding="1" cellspacing="1">
        <tr>
            <td width="84">图片：</td>
            <td width="203"><input type="text" name="image" id="image" /></td>
        </tr>
        <tr>
            <td>经度：</td>
            <td><input type="float" name="latitude" id="latitude" /></td>
        </tr>
        <tr>
            <td>维度：</td>
            <td><input type="float" name="longtitude" id="longtitude" /></td>
        </tr>
        <tr>
            <td>编号：</td>
            <td><input type="int" name="id" id="id" /></td>
        </tr>
        <tr>
            <td>空闲车位数量：</td>
            <td><input type="int" name="freenum" id="freenum" /></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="button" id="button" value="提交" />
                <input type="reset" name="button2" id="button2" value="重置" /></td>
        </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form1" />
</form>
<hr />
<p>&nbsp;</p>
</body>
</html>