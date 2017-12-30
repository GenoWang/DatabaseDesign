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
.a{
    width: 300px;
    height: 30px;
}
 #b{
    width: 400px;
    text-align: right;·
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
<h3>注册</h3>

<p>
简单几步就可以变成大爷啦.
<div id="b">
<form action="./registercheck.php" method="post">
用户名: <input type="text" class="a" name="usrname">
<br>
昵称: <input type="text" class="a" name="usrnickname">
<br>
密码: <input type="text" class="a" name="usrpw1">
<br>
确认密码: <input type="text" class="a" name="usrpw2">
<br>
邮箱: <input type="text" class="a" name="usremail">
<br>
手机号: <input type="text" class="a" name="usrphone">
<br>

<center>
<!--
<label><input name="" type="checkbox" value="" />推理</label> 
<label><input name="" type="checkbox" value="" />爱情</label> 
<label><input name="" type="checkbox" value="" />恐怖</label> 
<label><input name="" type="checkbox" value="" />喜剧</label></br>
<label><input name="" type="checkbox" value="" />惊悚</label> 
<label><input name="" type="checkbox" value="" />魔幻</label> 
<label><input name="" type="checkbox" value="" />动漫</label> 
<label><input name="" type="checkbox" value="" />科幻</label></br>
-->
<p>
点击注册，开启新世界！
</p>
</br>
<input type="submit" name="submit" value="注册">


</center>
</form>
</div>
<center>
</div> 


</body>
</html>
