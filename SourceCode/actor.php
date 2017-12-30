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
<a href="welcome.php">主页</a> |
<a href="posts.php">讨论帖</a> |
<a href="myprofile.php">我的资料</a> |
<a href="login.php">注销</a> |
<a href="thankyou.php">打赏</a>


</br></div>

<form action="search.php" method="post">
<span><input type="text" name="content" value="电影名/导演/演员/题材"></span>
<span><input type="submit" name="submit" value="搜索"></span>
</form>

</div>
<div class="login">
<center><h3>演员详细信息</h3></center>
<hr />


<?php
        $actor = $_GET['actor'];
        $connect = mysql_connect("localhost","root","iamtonny");
        if (!$connect){
                echo"<script>alert('数据库连接失败！')</script>";
        }
        mysql_query("set names utf8");
        mysql_select_db("film");
        $sql = "SELECT * FROM `actor` WHERE `actor_id` ='$actor'";
        $result = mysql_query($sql);
        $num = mysql_num_rows($result);
        
        if($num){
                $arr = array();
                while($rs = mysql_fetch_assoc($result)){ $arr[]=$rs;  }
        }
        	$i=0;
                $actor_name = $arr[$i][actor_name];
                $info = $arr[$i][info];
				$p = $arr[$i][picture];
                echo '<img src= '.$p.' style="max-width:200px;"/></br>';
                echo "<p align='left'>演员名称:".$actor_name."</p>";
                echo "<p align='left'>演员信息:</br>".$info."</p>";
?>


</body>
</html>

