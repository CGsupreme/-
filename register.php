<?php
	header("Content-Type: text/html;charset=utf-8");
	//建立连接
	$conn = mysqli_connect('localhost','root','cg20020128');
	if($conn){
		//数据库连接成功
		$select = mysqli_select_db($conn,"user_info");		//选择数据库
		if(isset($_POST["subr"])){
			
			$user = $_POST["username"];
			$pass = $_POST["password"];
			$re_pass = $_POST["assertpassword"];
			
			if($user == ""||$pass == ""){
				//用户名or密码为空
				echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."用户名或密码不能为空！"."\"".")".";"."</script>";
				echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."register.html"."\""."</script>";
				exit;
			}
			if($pass == $re_pass){
				//两次密码输入一致
				mysqli_set_charset($conn,'utf8');	//设置编码
				
				//sql语句
				$sql_select = "select username from nbb where username = '$user'";
				//sql语句执行
				$result = mysqli_query($conn,$sql_select);
				//判断用户名是否已存在
				$num = mysqli_num_rows($result); 
				
				if($num){
					//用户名已存在
					echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."用户名已存在！"."\"".")".";"."</script>";
					echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."register.html"."\""."</script>";
					exit;
				}else{
					//用户名不存在
					$sql_insert = "insert into nbb(username,password) values('$user','$pass')";
					//插入数据
					$ret = mysqli_query($conn,$sql_insert);
					$row = mysqli_fetch_array($ret); 
					//跳转注册成功页面
					echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."注册成功！返回重新登陆!"."\"".")".";"."</script>";
					echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."main.html"."\""."</script>";
					exit;
				}
			}else{
				//两次密码输入不一致
				echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."两次密码输入不一致！"."\"".")".";"."</script>";
				echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."register.html"."\""."</script>";
				exit;
			}
		}
		//关闭数据库
		mysqli_close($conn);
	}else{
		//连接错误处理
		die('Could not connect:'.mysql_error());
	}
 
?>
