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
<a href="writeposts.php">发表讨论帖</a>


</br></div>

<form action="search.php" method="post">
<span><input type="text" name="content" value="讨论帖标题"></span>
<span><input type="submit" name="submit" value="搜索"></span>
</form>

</div>

<div class="login">
<center>
<h3>讨论帖</h3>
<hr />
</center>



<?php
	
	$connect = mysql_connect("localhost","root","iamtonny");
        if (!$connect){
                echo"<script>alert('数据库连接失败！')</script>";
        }

        mysql_query("set names utf8");
        mysql_select_db("film");

        $name =  $_SESSION['name'];
        $result2 = mysql_query("SELECT * FROM `user_list` WHERE `user_name` = '$name'");
        $arr2 = array();
        $arr2 = mysql_fetch_array($result2);
        $user_id = $arr2[0][user_id];
//        echo "user id =$user_id";





        $sql = "SELECT * FROM `posts` WHERE 1";
        $result = mysql_query($sql);
        $num = mysql_num_rows($result);
        if($num){
                $arr = array();
                while($rs = mysql_fetch_assoc($result)){ $arr[]=$rs;  }
			    for($i=0;$i<count($arr);$i++){
                $id = $arr[$i][posts_id];
		
                $topic = $arr[$i][topic];
                $day = $arr[$i][release_time];
				$result3 = mysql_query("SELECT * FROM `posts` WHERE `user_id` ='$user_id' and `posts_id` ='$id'");
				$num3 = mysql_num_rows($result3);
				echo '<a  ><b>标题:</b></a>';
				echo '<a  href="post_info.php?post_id='.$id.'">'.$topic.'</a>';
				if($num3){
					session_start();
					$_SESSION['current_delete_post_id'] = $id;
					echo '<form action="./deletepost.php" method="post">';	
                                        //echo '<input type="hidden" name="postid" value="'.$id.'"  >';
					echo '<input style="float:center" type="submit" name="'.$id.'" value="删除">';
					echo '<input type="hidden" name="postid" value="'.$id.'"  >'; 
				}
//删除的sql语句为 DELETE FROM `posts` WHERE `user_id` ='$user_id' and `posts_id` ='$id'

				echo '<a style="float:right">'.$day.'</a></br>';
				echo '<hr />';
		        }
        }
	else
		echo "<p>目前还什么都没有..</p>";


?>

</div>
</body>
</html>
