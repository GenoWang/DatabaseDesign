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
<center><h3>详细信息</h3></center>
<hr />
<?php
	$film = $_GET['film'];
	//echo "<p>film=".$film."</p>";
	$current_film_id = $film;
	$connect = mysql_connect("localhost","root","iamtonny");
        if (!$connect){
                echo"<script>alert('数据库连接失败！')</script>";
        }
        mysql_query("set names utf8");
        mysql_select_db("film");
        // according to theme
        $sql = "SELECT * FROM `film_info` WHERE film_id ='$film'";
        $result = mysql_query($sql);
        $num = mysql_num_rows($result);
	$actor = mysql_query("SELECT * FROM `actor` WHERE `actor_id` in(SELECT actor_id FROM `film_actor` WHERE `film_id` = '$film')");
	$num2 = mysql_num_rows($actor);
        if($num){
                $arr = array();
                while($rs = mysql_fetch_assoc($result)){ $arr[]=$rs;  }
        }
	if($num2){
                $arr2 = array();
                while($rs = mysql_fetch_assoc($actor)){ $arr2[]=$rs;  }
        }
	$i=0;
                $id = $arr[$i][film_id];
                $name = $arr[$i][film_name];
                $p = $arr[$i][picture];
                echo '<img src= '.$p.' style="max-width:200px;"/></br>';
                echo '<p>'.$name.'</p>';
		echo "<p align='light'>演员:";
	        for($i=0;$i<count($arr2);$i++){
        	        $id = $arr2[$i][actor_id];
               		$name = $arr2[$i][actor_name];
                	echo '<a align="left"href="actor.php?actor='.$id.'">'.$name.'</a >       ';
        	}
        	echo "</p>";
		$i=0;
                $date = $arr[$i][film_date];
                echo "<p align='left'>电影日期:".$date."</p>";
                $info = $arr[$i][info];
                echo "<p align='left'>电影简介:</br>".$info."</p>";
?>

<hr />

<center><h3>用户评论</h3></center></br>


</html>        
<?php
		$film = $_GET['film'];
		session_start();
		$_SESSION['current_film_id'] = $film;
		$result = mysql_query("SELECT * FROM `judgement` WHERE `film_id` = '{$film}' ");
		$num = mysql_num_rows($result);
        if($num){
			echo "<p align='left'>此电影共有<b>".$num."</b>个评论</p>";
            $arr3 = array();
            while($rs = mysql_fetch_assoc($result)){ $arr3[]=$rs;}
		    for($i=0;$i<count($arr3);$i++){
        	    $user_id = $arr3[$i][user_id];
				$info = $arr3[$i][info];
				$time = $arr3[$i][judge_time];
				$result2 = mysql_query("SELECT `nick_name` FROM `user_list` WHERE `user_id`='$user_id' ");
				$arr4 = array();
				$arr4[] = mysql_fetch_assoc($result2);
				$n_name = $arr4[0][nick_name];
				echo "<p align='left'>昵称：".$n_name."</p>";
	            echo "<p align='left'>评价:</br>      ".$info."</p>";
				echo "<p align='right'>时间：".$time."</p>";
                //echo '<a align="left"href="actor.php?actor='.$id.'">'.$name.'</a >       ';
				echo "<hr />";
        	}
		}
		else
			echo "<p align='left'>该电影还没有评论，去发表评论吧</p>";
		        
?>
<center><h3>发表你的评论</h3></center></br>
<center>
<form action="./judgement_check.php" method="post">
<textarea name="comment" style="vertical-align:top" rows="10" cols="100" ></textarea>
</br><input type="submit" name="submit" value="提交">
</center>

<?php
	session_start();
	$n = $_SESSION['name'];
	$film = $_GET['film'];	
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
	//echo $film;
	//echo $u_id;
	//echo date("Y-m-d");
	//echo date("H:i:s");
	//echo $comment;


		//$sql = "INSERT INTO `judgement` (`jdmt_id`, `film_id`, `user_id`, `judge_time_d`, `judge_time_t`, `Info`) VALUES ('','$current_film_id', '$u_id','".date("Y-m-d")."','".date("H:i:s")."', '$comment')";
		//$sqll = "INSERT INTO `judgement` (`jdmt_id`, `film_id`, `user_id`, `judge_time_d`, `judge_time_t`, `Info`) VALUES ('', '2', '5', '2017-12-15', '09:15:24', 'hahahahaha')";
        	$sql = "INSERT INTO `judgement` (`judge_id`, `film_id`, `judge_time`, `info`, `user_id`) VALUES (NULL, '$current_film_id', '".date("Y-m-d H:i:sa")."', '$comment', '$u_id')";
		echo "<br>";
	//	echo $sql;        
	$result = mysql_query($sql);
                //$arr = array();
                //while($rs = mysql_fetch_assoc($result)){ $arr[]=$rs; }
                //print_r($arr);
}
?>


















