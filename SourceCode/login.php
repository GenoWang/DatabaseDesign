<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
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
<h2>libilibi!</h2>
<p>
libilibi是一个电影论坛网站，你可以在这里看到最新的电影资讯，发帖子吐槽你的感受，
欢迎互动啊兄dei~
</p>
</div> 

<div class="login">
<center>
<h3>登录</h3>
<p>
有的东西，只有自己人才能看到...
</p>
<form action="./logincheck.php" method="post">
姓名: <input type="text" name="usrname">
<br>
密码: <input type="text" name="usrpw">
<br>
<input type="submit" name="submit" value="登录">
</form>

<p>
啥？你还不是注册会员？还不快去<a href="./register.php">注册..</a>
</br>
</br>
</p>

<p align="right" > 管理员大哥戳<a href="adminlogin.php">这里..</a> </p>

<center>
</div> 


</body>
</html>
