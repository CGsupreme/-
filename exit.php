<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8"> 
</head> 
<body> 
<?php
session_start ();//将session销毁时调用destroy 
session_destroy (); 
echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."安全退出！返回登陆界面！"."\"".")".";"."</script>";
echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."main.html"."\""."</script>";
exit;
?> 
<!--<script type="text/javascript"> 
 window.location.href="main.html"; 
</script> -->
</body> 
</html> 
