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
<h2>libilibi!</h2>
<p>
libilibi是一个电影论坛网站，你可以在这里看到最新的电影资讯，发帖子吐槽你的感受，
欢迎互动啊兄dei~
</p>
</div> 


<?php
	$title = $_POST['title'];
	$content = $_POST['word'];

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
               $sql = "INSERT INTO `posts` (`posts_id`, `user_id`, `topic`, `release_time`, `info`) VALUES (NULL, '$user_id', '$title', '".date("Y-m-d H:i:sa")."','$content')";
	//echo $sql;	
	mysql_query($sql);
                //此处用到sql语句
                /*
                INSERT INTO `posts` (`posts_id`, `user_id`, `topic`, `release_time`, `info`) VALUES (NULL, '', '标题', '2017-12-12 07:20:13','内容')
                */
    }

                
?>
   



<div class="login"> 
<center>
<h2>讨论帖发布成功！</h2> 
</p>
大爷默数2秒，小的这就回到刚才的界面～
</p>  
<?php header("refresh:2;url=posts.php");  ?>
</div>

