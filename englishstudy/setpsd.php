<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>
<body>
<?php
    header("content-type:text/html;charset=utf-8");//这个貌似是设置字符编码吧，不然的话页面输出回事乱码
    //开启session,b不明白？没关系，我待会再在下面单独说
    session_start();
    
    //接收表单传递的用户名和密码
    $name=$_POST['username'];//$_POST[],这个大神们都应该知道，就是获取前端表单传回来的数据，并且是通过input的name属性值来获取，看到没？我index.html中有一个input的name值是user的
    $pwd=$_POST['oldpsd'];//以下同上
    $newpwd=$_POST['newpsd'];
	$repwd=$_POST['repsd'];
  
       //下面判断信息是不是输入完整
    if(empty($name)||empty($pwd)||empty($newpwd)||empty($repwd)){
        echo "<script>alert('信息输入没完整');</script>";
        echo "<script>window.location='setpsd.html';</script>";
    }else
    //判断密码是否一 致
    if ($newpwd!=$repwd) {
        echo"<script>alert('新密码输入不一致，请重新输入');</script>";
        echo"<script>location='setpsd.html'</script>";
    }else{  
            //通过php连接到mysql数据库
    mysql_connect("localhost","root","",'englishsystem');
	mysql_select_db('englishsystem');	//选择数据库
	mysql_query('set names utf8');		
	$sql="select * from user where username='$name' and password='$pwd'";
	 $rs=mysql_query($sql);
	//获取结果集的记录数
	if(mysql_num_rows($rs)==1)
	{
 mysql_query ( "update  user set password='{$newpwd}' where username='{$name}'" ) or die ( "存入数据库失败" . mysql_error () );//如果上述用户名密码判定不错，则update进数据库中  
   
	echo"<script>alert('密码修改成功');</script>";
	}
	else
	{
		echo"<script>alert('用户名和密码不一致');</script>";
		echo"<script>location='setpsd.html'</script>";
	}
}    
?>
</body>
</html>