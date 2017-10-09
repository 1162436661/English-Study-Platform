<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>

<?php
if(isset($_POST['submit']))  //判断是否点击登录按钮
{
	//用户输入的用户名和密码
	$username=$_POST['lguesr'];
	$pwd=$_POST['lgpsd'];
	//连接数据库

	mysql_connect("localhost","root","",'englishsystem');
	mysql_select_db('englishsystem');	//选择数据库
	mysql_query('set names utf8');
	$sql="select * from user where username='$username' and password='$pwd'";
	$rs=mysql_query($sql);
	//获取结果集的记录数
	if(mysql_num_rows($rs)==1)
	{
		echo"<script>alert('登录成功');</script>";
		echo"<script>location='alterpassword.html'</script>";
	}
	else
	{
		echo"<script>alert('登录失败');</script>";
		echo"<script>location='login.html'</script>";
	}
}
?>
</body>
</html>