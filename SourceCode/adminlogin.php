<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
<style>
.websitetitle {
    background-color:CornflowerBlue;
    color:white;
    margin:20px;
    padding:20px;
}
.login {
    background-color:Lavender;
    color:black;
    margin:20px;
    padding:20px;
} 
 
</style>
</head>

<body>

<div class="websitetitle">
<h2>libilibi后台管理登录</h2>
</div> 

<div class="login">
<center>
<h3>管理员登录</h3>
<form action="adminlogincheck.php" method="post">
管理员名称: <input type="text" name="adminname">
<br>
管理员口令: <input type="text" name="adminpw">
<br>
<input type="submit" name="submit" value="登录">
</form>

<center>
</div> 


</body>
</html>
