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
<a href="posts.php">返回</a> |
<a href="welcome.php">主页</a> |
<a href="writeposts.php">发表讨论帖</a> |
<a href="">管理讨论帖</a>


</br></div>

<form action="search.php" method="post">
<span><input type="text" name="content" value="讨论帖标题"></span>
<span><input type="submit" name="submit" value="搜索"></span>
</form>

</div>

<div class="login">
<center>
<h3>讨论帖详细信息</h3>
<hr />
</center>

<?php
	$postid = $_GET['post_id'];
	session_start();
	$_SESSION['current_post_id'] = $postid;
        $connect = mysql_connect("localhost","root","iamtonny");
        if (!$connect){
                echo"<script>alert('数据库连接失败！')</script>";
        }
        mysql_query("set names utf8");
        mysql_select_db("film");

        $sql = "SELECT `topic`,`info` FROM `posts` WHERE `posts_id` = '$postid'";
		$result = mysql_query($sql);
		$arr = array();
		$arr[] = mysql_fetch_array($result);
		$topic = $arr[0][topic];
		$info = $arr[0][info];
		echo '<p><b>标题:</b>';
            echo ''.$topic.'';
			echo '<p><b>内容:</b></br>       '.$info.'<hr />';
		
		$sql = "SELECT * FROM `posts_info` WHERE `post_id` = '$postid' ";
        $result = mysql_query($sql);
        $num = mysql_num_rows($result);
        if($num){
                $arr = array();
                while($rs = mysql_fetch_assoc($result)){ $arr[]=$rs;  }
                for($i=0;$i<count($arr);$i++){
                    $user_id = $arr[$i][user_id];
                    $time = $arr[$i][respond_time];
					$info = $arr[$i][respond_info];
					$result2 = mysql_query("SELECT `nick_name` FROM `user_list` WHERE `user_id` = '$user_id'");
					$arr2 = array();
					$arr2[] = mysql_fetch_array($result2);
					$name = $arr2[0][nick_name];
					echo '<p><b>用户:</b>';
                     echo ''.$name.'';
								echo "<p align='left'><b>回复:</b></br>".$info."</p>";
								echo '<a style="float:right">'.$time.'</a></p>';
                        }
        }
        else
                echo "<p>该帖还没有人回复..</p>";

         //回复用的插入语句：
		 //INSERT INTO `posts_info` (`post_id`, `respond_idx`, `respond_time`, `user_id`, `respond_info`) VALUES ('1', NULL, '2017-12-22 00:00:00', '5', 'asdasd')
?>
<br/>
<hr />
<center><h3>发表你的评论</h3></center></br>
<center>
<form action="./postjudge.php" method="post">
<textarea name="comment" style="vertical-align:top" rows="10" cols="100" ></textarea>
</br><input type="submit" name="submit" value="提交">
</center>





</div>
</body>
</html



