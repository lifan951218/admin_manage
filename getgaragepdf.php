
<?php
header('Content-type:text/html;charset=utf-8');
require('fpdf/chinese.php');
//require('fpdf/fpdf.php');
class PDF extends PDF_Chinese
{
    function Header() //设置页眉
    {
        $this->SetFont('GB','',20);
        $this->Write(10, iconv("UTF-8","gbk",'立体车库信息'));
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
mysql_query('set names utf8');
mysql_select_db("garage", $conn); //执行SQL
$query_rs_prod = "SELECT * FROM garage_info ";
$rs_prod = mysql_query($query_rs_prod, $conn) or die(mysql_error());

$row_rs_prod = mysql_fetch_assoc($rs_prod);
$totalRows_rs_prod = mysql_num_rows($rs_prod);

$pdf=new PDF(); //创建新的FPDF对象
$pdf->AddGBFont(); //设置中文字体
$pdf->Open(); //开始创建PDF
$pdf->AddPage(); //增加一页

$pdf->SetFont('GB','I',12); //设置字体样式

$header=array(iconv("UTF-8","gbk",'车库编号'),iconv("UTF-8","gbk",'经度'),iconv("UTF-8","gbk",'纬度'),iconv("UTF-8","gbk",'地址'),iconv("UTF-8","gbk",'总车位数量'),iconv("UTF-8","gbk",'空闲车位数量'),iconv("UTF-8","gbk",'停车单价')); //设置表头
$width=array(21,19,19,45,27,30,25); //设置每列宽度

for($i=0;$i<count($header);$i++) //循环输出表头
    $pdf->Cell($width[$i],15,$header[$i],1);
$pdf->Ln();

do //循环输出表体
{
    $pdf->Cell($width[0],15,$row_rs_prod['id'],1);
    $pdf->Cell($width[1],15,$row_rs_prod['latitude'],1);
    $pdf->Cell($width[2],15,$row_rs_prod['longtitude'],1);
    $pdf->Cell($width[3],15,iconv("UTF-8","gbk",$row_rs_prod['address']),1);
    $pdf->Cell($width[4],15,$row_rs_prod['total_num'],1);
    $pdf->Cell($width[5],15,$row_rs_prod['free_num'],1);
    $pdf->Cell($width[6],15,$row_rs_prod['price_per_hour'],1);
    $pdf->Ln();
} while ($row_rs_prod = mysql_fetch_assoc($rs_prod));

$pdf->Output();  //下载PDF文件
?>
