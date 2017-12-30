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
.name {
    background-color:white;
    color:black;
    margin:20px;
    padding:0px;

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

<div class="name">

<div style="float:left; text-align:left">
大爷来啦！
<?php
    session_start();
    echo $_SESSION['name'];
?>
今儿来看点啥？
</div>
<div style="float:right; text-align:right">
<a href="welcome.php">主页</a>


</br></div>

<form action="search.php" method="post">
<span><input type="text" name="content" value="讨论帖标题"></span>
<span><input type="submit" name="submit" value="搜索"></span>
</form>

</div>

<div class="login">
<center>
<h3>发表讨论帖</h3>
<hr />
<p>富强  民主  文明  和谐</p>
<p>自由  平等  公正  法治</p>
<p>爱国  敬业  诚信  友善</p>

<form action="./writepostcheck.php" method="post">
讨论帖标题:</br>
	<input type="text" name="title"><br>
讨论帖内容:</br>
	<textarea rows="10" cols="100" type="text" name="word"> </textarea></br>

<input type="submit" name="submit" value="发表">
</form>

</center>
</div>

<?php
/* 
    $connect = mysql_connect("localhost","root","iamtonny");
    mysql_select_db("film",$connect); 
    mysql_query("set names utf8"); 
    session_start();
    $name = $_SESSION['name'];
	$result2 = mysql_query("SELECT * FROM `user_list` WHERE `user_name` = '$name'");
    $arr2 = array();
    $arr2 = mysql_fetch_array($result2);
    $user_id = $arr2[0][user_id];
    if(isset($_POST["submit"])&&$_POST["submit"]=="发表"){
		
		//此处用到sql语句
		
		INSERT INTO `posts` (`posts_id`, `user_id`, `topic`, `release_time`, `info`) VALUES (NULL, '', '标题', '2017-12-12 07:20:13','内容')
		

*/
		
?>

</body>
</html>









