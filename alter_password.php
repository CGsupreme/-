<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8"> 
<title>正在修改密码</title> 
</head> 
<body> 
 <?php
 session_start (); 
 header("Content-Type: text/html;charset=utf-8");
	//建立连接
	$conn = mysqli_connect('localhost','root','cg20020128');
		//数据库连接成功
// $username = $_POST ["username"]; 
// $oldpassword = $_POST ["oldpassword"]; 
// $newpassword = $_POST ["newpassword"]; 
 if ($conn) { 
 	$select = mysqli_select_db($conn,"user_info");		//选择数据库
 		if(isset($_POST["subr"])){
 			$user = $_POST["username"];
			$oldpass = $_POST["oldpassword"];
			$newpass = $_POST["newpassword"];
			$assertpass = $_POST["assertpassword"];
//				if($user == ""||$oldpass == ""||$newpass == ""||$assertpass == ""){
//				  //用户名or密码为空
//				  echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."用户名或密码不能为空"."\"".")".";"."</script>";
//				  echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."alter_password.html"."\""."</script>";
//				  exit;}
				if($oldpass == $newpass){
				        echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."新旧密码不能相同"."\"".")".";"."</script>";
				        echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."alter_password.html"."\""."</script>";
			        exit; }
				if($newpass == $assertpass){
				 	//两次密码输入一致
				   	mysqli_set_charset($conn,'utf8');	//设置编码
				
					//sql语句
					$sql_select = "select username from nbb where username = '$user'";
					//sql语句执行
					$result = mysqli_query($conn,$sql_select);
					//判断用户名是否已存在
					$num = mysqli_num_rows($result);
					if($num){
					//用户名已存在执行修改操作
					$sql_update="update nbb set password='$newpass' where username='$user'";//修改
					$ret = mysqli_query($conn,$sql_update);
					$row = mysqli_fetch_array($ret);
					//跳转修改成功页面
					 echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."修改密码成功！返回重新登陆"."\"".")".";"."</script>";
				     echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."main.html"."\""."</script>";
			        exit;
			        }else{
					//用户名不存在
					echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."用户名不存在！"."\"".")".";"."</script>";
					echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."alter_password.html"."\""."</script>";
					exit;}}}
		//关闭数据库
		mysqli_close($conn);
	}else{
		//连接错误处理
		die('Could not connect:'.mysql_error());
	}
 
?>     																		 								                 
