<?php
header('content-type:text/html;charset=utf-8');
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
if(isset($_SESSION['name'])){
	$login=true;
	$userinfo=$_SESSION['name'];	
}else{
	$login=false;
}
if(isset($_GET['action'])&&$_GET['action']=='logout'){
	unset($_SESSION['name']);
	session_destroy();
	echo "<script>alert('退出成功！')</script>";
	header("refresh:0;url=index.php");
	die;
}
//加载HTML显示模板文件
define('APP', 'itcast');
require './index.html';
?>
