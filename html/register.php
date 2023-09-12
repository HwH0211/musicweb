<?php 
//获取注册的信息 把注册信息保存到数据表格中 ，判断 这个用户名是否已经注册
//1获取注册信息  用户名和密码
$user=$_GET["username"] ?? "";
$pw=$_GET["password"] ?? "";
//链接mysql数据库 针对php操作mysql数据提供api函数  mysqli

$link1=mysqli_connect("localhost","root","","music");
$sql2 = "select * from user1 where nm='$user'";
$que2 = mysqli_query($link1,$sql2);

$sz=mysqli_fetch_assoc($que2);

if($sz["nm"]==$user){
	echo "<script>alert('该用户已经注册请重新输入')</script>";
	echo "<script>location.href='../html/register.html'</script>";
}else{
	$sql="insert into user1 values (null,'$user','$pw')";
	$que=mysqli_query($link1,$sql);
	if($que){
		echo "<script>alert('注册成功')</script>";//注册成功跳转等来了
		echo "<script>location.href='login.html';</script>";
	}else{
	//失败 回到注册前段页面
	echo "<script>location.href='register.html';</script>";
	}
}
?>