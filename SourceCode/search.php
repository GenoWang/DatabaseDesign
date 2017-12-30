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

<div class="login">
<center><h3>查询结果</h3></center>

<?php
    if(isset($_POST["submit"]) && $_POST["submit"] == "搜索")
    {
        $con = $_POST["content"];

        if($con == "")
        {
            echo "<script>alert('搜索内容不能为空哦'); history.go(-1);</script>";
        }
        else
        {
            $connect = mysql_connect("localhost","root","iamtonny");
            if (!$connect){
                 echo"<script>alert('数据库连接失败！')</script>";
            }
            mysql_select_db("film");
            mysql_query("set names utf8");
            $sql1 = "SELECT * FROM `film_info` WHERE `film_name` like '%$con%'";
	    $sql2 = "SELECT * FROM `film_info` WHERE film_id in 
		(SELECT film_id FROM `film_actor` WHERE actor_id in 
		(SELECT actor_id FROM `actor` 
		WHERE`actor_name` like '%$con%'))";
	    $sql3 = "SELECT * FROM `film_info` WHERE director_id in (SELECT director_id FROM `director` WHERE `director_Name` like '%$con%')";
	    $sql4 = "SELECT * FROM `film_info` WHERE film_id in 
		(SELECT film_id FROM `film_theme` WHERE theme_id in 
		(SELECT theme_id FROM `theme` WHERE `theme_name` = '%$con%'))";

            $result1 = mysql_query($sql1);
            $num1 = mysql_num_rows($result1);
            if($num1)
            {
 		$arr1 = array();
		while($rs = mysql_fetch_assoc($result1)){ $arr1[]=$rs;  }
            } 
	    $result2 = mysql_query($sql2);
            $num2 = mysql_num_rows($result2);
            if($num2)
            {
 		$arr2 = array();
		while($rs = mysql_fetch_assoc($result2)){ $arr2[]=$rs;  }
            }  
            $result3 = mysql_query($sql3);
            $num3 = mysql_num_rows($result3);
            if($num3)
            {
 		$arr3 = array();
		while($rs = mysql_fetch_assoc($result3)){ $arr3[]=$rs;  }
            } 
	    $result4 = mysql_query($sql4);
            $num4 = mysql_num_rows($result4);
            if($num4)
            {
 		$arr4 = array();
		while($rs = mysql_fetch_assoc($result4)){ $arr4[]=$rs;  }
            } 
        }  
    }
    else  
    {
        echo "<script>alert('提交未成功！'); history.go(-1);</script>";
    }  
?>  
<?php 
        
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
?>
</br>
<?php
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
?>
</br>
<?php
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
</br>
<?php
    for($i=0;$i<count($arr4);$i++){
        $name = $arr4[$i][film_name];
        echo "<p align='left'>电影名称:".$name."</p>";
        $date = $arr4[$i][film_date];
        echo "<p align='left'>电影日期:".$date."</p>";
        $info = $arr4[$i][info];
        echo "<p align='left'>电影简介:".$info."</p>";
        echo "<hr />";
    }
?>

<center><p><a href="./welcome.php">返回</a></p></center>

</div> 


</body>
</html>

