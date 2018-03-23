
<?php
//Header('Content-type:text/html;charset=utf-8');
require('fpdf/chinese.php');
//require('fpdf/fpdf.php');
class PDF extends PDF_Chinese
{
    function Header() //设置页眉
    {
        $this->SetFont('GB','',20);
        $this->Write(10, iconv("UTF-8","gbk",'用户信息'));
        $this->Ln(20); //换行
    }
    function Footer() //设置页脚
    {
        $this->SetY(-15);
        $this->SetFont('GB','',10);
        $this->Cell(0,10,iconv("UTF-8","gbk",'第').$this->PageNo().iconv("UTF-8","gbk",'页'));
    }
}

$conn = mysql_connect("localhost", "root", "123456"); //连接数据库

mysql_select_db("member", $conn); //执行SQL
$query_rs_mem = "SELECT * FROM member ";
$rs_mem = mysql_query($query_rs_mem, $conn) or die(mysql_error());

$row_rs_mem = mysql_fetch_assoc($rs_mem);
$totalRows_rs_mem = mysql_num_rows($rs_mem);

$pdf=new PDF(); //创建新的FPDF对象
$pdf->AddGBFont(); //设置中文字体
$pdf->Open(); //开始创建PDF
$pdf->AddPage(); //增加一页

$pdf->SetFont('GB','I',12); //设置字体样式

$header=array(iconv("UTF-8","gbk",'序号'),iconv("UTF-8","gbk",'用户名'),iconv("UTF-8","gbk",'车牌号'),iconv("UTF-8","gbk",'车型')); //设置表头
$width=array(25,25,25,35,35); //设置每列宽度

for($i=0;$i<count($header);$i++) //循环输出表头
    $pdf->Cell($width[$i],15,$header[$i],1);
$pdf->Ln();

do //循环输出表体
{
    $pdf->Cell($width[0],15,iconv("UTF-8","gbk",$row_rs_mem['id']),1);
    $pdf->Cell($width[1],15,iconv("UTF-8","gbk",$row_rs_mem['username']),1);
    $pdf->Cell($width[2],15,iconv("UTF-8","gbk",$row_rs_mem['car_num']),1);
    $pdf->Cell($width[3],15,iconv("UTF-8","gbk",$row_rs_mem['car_type']),1);
    $pdf->Ln();
} while ($row_rs_mem = mysql_fetch_assoc($rs_mem));

$pdf->Output();  //下载PDF文件
?>
