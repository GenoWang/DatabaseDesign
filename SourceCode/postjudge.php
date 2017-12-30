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
	//回复用的插入语句：
        //INSERT INTO `posts_info` (`post_id`, `respond_idx`, `respond_time`, `user_id`, `respond_info`) VALUES ('1', NULL, '2017-12-22 00:00:00', '5', 'asdasd')

        session_start();
        $n = $_SESSION['name'];
        $post = $_SESSION['current_post_id'];
        if(isset($_POST["submit"])) {
                $comment=$_POST["comment"];
                $con = mysql_connect("localhost","root","iamtonny");
                if(!$con){
                    echo "<script>alert('数据库连接失败'); history.go(-1);</script>";
                }
                mysql_select_db("film");
                mysql_query("set names utf8");
                $sql2 = mysql_query("select * from user_list where user_name = '$n'");
                $row = mysql_fetch_array($sql2);
                $u_id = $row[user_id];

	$sql = "INSERT INTO `posts_info` (`post_id`, `respond_idx`, `respond_time`, `user_id`, `respond_info`) VALUES ('$post', NULL, '".date("Y-m-d H:i:sa")."', '$u_id', '$comment')";
        $result = mysql_query($sql);
}
?>

<div class="login"> 
<center>
<h2>评论讨论帖成功！</h2> 
<p>
大爷默数2秒，小的这就调刚才的界面～
</p>  
<?php header("refresh:2;url=post_info.php?post_id=$post");  ?>
</div>
