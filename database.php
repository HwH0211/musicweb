<?php
$link=mysqli_connect("localhost","root","");//登录ysql数据库
//想验证是否登录mysql成功
if(!$link){
	echo "链接mysql失败";
}
else{
	echo "链接mysql成功";
}
//创建数据库
$sql="create database music";
$que=mysqli_query($link,$sql);//两个参数连接对象和查询语句
if($que){
	echo "数据库创建成功";
}
else{
	echo "数据库创建失败";
}
//创建表格
$link1=mysqli_connect("localhost","root","","music");
$sql1="CREATE TABLE user1(
id INT PRIMARY KEY AUTO_INCREMENT,
nm VARCHAR(50) NOT NULL UNIQUE,
pw VARCHAR(50) 
)DEFAULT CHARSET=utf8";
mysqli_query($link1,$sql1);


?>