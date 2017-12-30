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


<?php
	session_start();
	$name = $_SESSION['name'];
	
    	$connect = mysql_connect("localhost","root","iamtonny");
   	if (!$connect){
        	echo"<script>alert('数据库连接失败！')</script>";
    	}
	mysql_query("set names utf8");
    	mysql_select_db("film");
	// according to theme
    	$sql1 = "SELECT DISTINCT film_info.* FROM `film_theme`,`film_info` WHERE `film_theme`.`theme_id` IN( SELECT `user_theme`.`theme_id` FROM `user_theme`,`user_list` WHERE `user_list`.user_id = `user_theme`.user_id and `user_list`.`user_name` = '$name')";
    	$result1 = mysql_query($sql1);
	$num1 = mysql_num_rows($result1);
	if($num1){
		$arr1 = array();
    		while($rs = mysql_fetch_assoc($result1)){ $arr1[]=$rs;  }
    	}
	
	// according to actor
        $sql2="SELECT DISTINCT film_info.* FROM `film_actor`,`film_info` WHERE `film_actor`.`actor_id` IN( SELECT `user_actor`.`actor_id` FROM `user_actor`,`user_list` WHERE `user_list`.user_id = `user_actor`.user_id and `user_list`.`user_name` = '$name')";
	$result2 = mysql_query($sql2);
        $num2 = mysql_num_rows($result2);
        if($num2){
                $arr2 = array();
                while($rs = mysql_fetch_assoc($result2)){ $arr2[]=$rs;  }
        }

	// according to director
        $sql3="SELECT DISTINCT * FROM `film_info` WHERE `director_id` IN( SELECT `user_director`.`director_id` FROM `user_director`,`user_list` WHERE `user_list`.user_id = `user_director`.user_id and `user_list`.`user_name` = '$name')";
	$result3 = mysql_query($sql3);
        $num3 = mysql_num_rows($result3);
        if($num3){
                $arr3 = array();
                while($rs = mysql_fetch_assoc($result2)){ $arr3[]=$rs;  }
        }

	// theme results
	echo  '<font size = "5px"  color="red">根据你喜爱的题材提供的电影...</br><hr/></font>';
	for($i=0;$i<count($arr1);$i++){
		    $id = $arr1[$i][film_id];
        	$name = $arr1[$i][film_name];
			$p = $arr1[$i][picture];
			echo '<img src= '.$p.' style="max-width:200px;"/></br>';
			echo '<a align="left" href="film.php?film='.$id.'">'.$name.'</a></br>';
        	$date = $arr1[$i][film_date];
        	echo "<p align='left'>电影日期:".$date."</p>";
        	$info = $arr1[$i][info];
        	echo "<p align='left'>电影简介:".$info."</p>";
        	echo "<hr />";
    	}	
	// actor results
	echo  '<font size = "5px"  color="red">根据你喜爱的演员提供的电影...</br><hr/></font>';
	for($i=0;$i<count($arr2);$i++){
		        $id = $arr2[$i][film_id];
                $name = $arr2[$i][film_name];
			    $p = $arr2[$i][picture];
				echo '<img src= '.$p.' style="max-width:200px;"/></br>';
			echo '<a align="left" href="film.php?film='.$id.'">'.$name.'</a></br>';
                $date = $arr2[$i][film_date];
                echo "<p align='left'>电影日期:".$date."</p>";
                $info = $arr2[$i][info];
                echo "<p align='left'>电影简介:".$info."</p>";
                echo "<hr />";
        }
echo  '<font size = "5px"  color="red">根据你喜爱的导演提供的电影...</br><hr/></font>';
	for($i=0;$i<count($arr3);$i++){
		        $id = $arr3[$i][film_id];
                $name = $arr3[$i][film_name];
			    $p = $arr3[$i][picture];
				echo '<img src= '.$p.' style="max-width:200px;"/></br>';
			    echo '<a align="left" href="film.php?film='.$id.'">'.$name.'</a></br>';
                $date = $arr3[$i][film_date];
                echo "<p align='left'>电影日期:".$date."</p>";
                $info = $arr3[$i][info];
                echo "<p align='left'>电影简介:".$info."</p>";
                echo "<hr />";
        }

?>


</div>

</body>
</html>
