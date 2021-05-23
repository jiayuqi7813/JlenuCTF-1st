<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HELP</title>
    <script src="JS/jquery.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<style>
	body
	{
		width:500px;
		margin:0 auto;
	}
	</style>
</head>

<body>
	<br>
	<div class="panel panel-default">
	  <div class="panel-heading">
		<h3 class="panel-title">Webset Log</h3>
	  </div>
		<ul class="list-group">
		<li class="list-group-item"><a href="<?php echo $_SERVER['PHP_SELF']."?id=1";?>">first</a></li>
		<li class="list-group-item"><a href="<?php echo $_SERVER['PHP_SELF']."?id=2";?>">second</a></li>
		<li class="list-group-item"><a href="<?php echo $_SERVER['PHP_SELF']."?id=3";?>">third</a></li>
	  </ul>
	</div>


</body>

<?php
error_reporting(0);

function getTxtcontent($txtfile){
    $file = @fopen($txtfile,'r');
    $content = array();
    if(!$file){
        return 'file open fail';
    }else{
        $i = 0;
        while (!feof($file)){
            $content[$i] = mb_convert_encoding(fgets($file),"UTF-8","GBK,ASCII,ANSI,UTF-8");
            $i++ ;
        }
        fclose($file);
        $content = array_filter($content); 
    }
    return $content;
}

function waf($str)
{
    $list = getTxtcontent("sql.txt");
    $waf_list = array_rand($list, 10);
	for($i=0;$i<10;$i++){
		$word = $list[$waf_list[$i]];
        $word=str_ireplace("\r\n","",$word);
		$str=str_ireplace($word,"waf",$str);
	}
	return $str;
}

$coon = mysqli_connect("localhost","root","root");
mysqli_select_db($coon,"jlenu_ctf");
$id = waf($_GET['id']);
$num = preg_match('/waf/',$id);

if($num!=0)
{
	echo " &nbsp  &nbsp  &nbsp not this";
	die();
}
else
{
	$sql = "select content from chat where id = ".$id;
	$result=mysqli_query($coon,$sql);
	$info = mysqli_fetch_array($result);
	echo " &nbsp  &nbsp  &nbsp ".$info['content'];
}

?>


