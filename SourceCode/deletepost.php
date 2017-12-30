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
            $id = $_POST['postid'];
	    $connect = mysql_connect("localhost","root","iamtonny");
            if (!$connect){
                 echo"<script>alert('数据库连接失败！')</script>";
            }
            mysql_select_db("film");
            mysql_query("set names utf8");
            session_start(); 
	    $name = $_SESSION['name'];
            //$id = $_SESSION['current_delete_post_id'];
	    $result2 = mysql_query("SELECT * FROM `user_list` WHERE `user_name` = '$name'");
    	    $arr2 = array();
    	    $arr2 = mysql_fetch_array($result2);
    	    $user_id = $arr2[0][user_id];
	    //$sql = "select * from user_list where user_name ='$user' and pwd ='$psw' ";
            
	    $sql = " DELETE FROM `posts` WHERE `user_id` ='$user_id' and `posts_id` ='$id'";
	    //echo $sql;
	    $result = mysql_query($sql);
            $num = mysql_num_rows($result);
?> 



<div class="login"> 
<center>
<h2>讨论帖删除成功！</h2> 
大爷默数2秒，小的这就回到刚才的界面～
</p>  
<?php header("refresh:2;url=posts.php");  ?>
</div>

