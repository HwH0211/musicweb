<?php
header("content-type:text/html;charset=utf-8");
//获取表单数据 如何获取登录的信息？
// $_GET 本质是一个空数组,表单数据会以键值的形式保存在$_GET空数组里面保存方式是 name值作为键 表单数据作为值
$user=$_GET["username"] ?? "";
$pw=$_GET["password"] ?? "";

$link1=mysqli_connect("localhost","root","","music");
$sql1 = "select * from user1 where nm='$user'";
$sql2 = "select * from user1 where pw='$pw'";
$que1 = mysqli_query($link1,$sql1);
$que2 = mysqli_query($link1,$sql2);
$sz1=mysqli_fetch_assoc($que1);
$sz2=mysqli_fetch_assoc($que2);

if($sz1["nm"]==$user && $sz2["pw"]==$pw ){
	echo "<script>alert('登录成功');</script>";
	echo "<script>location.href='../index.php';</script>";	
}else{
	echo "<script>alert('登录失败');</script>";
}
//Session存储在服务器端，实现数据跨脚本共享的会话技术，Session实Session技术的实现依赖于Cookie技术。
session_start();
$_SESSION["name"]=$user;


// setcookie("name",$user,time()+4);
//想办法$user 数据共享 使用cookie来实现  $_COOKIE是一个空的数组 你可以把登录信息保存在 $_COOKIE里面
//为什么保存在 $_COOKIE能够实现数据共享，因为$_COOKIE数组是保存在浏览器中
?>
