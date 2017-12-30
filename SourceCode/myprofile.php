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
.a{
    width: 300px;
    height: 30px;
}
 #b{
    width: 400px;
    text-align: right;·
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
<center>
<p><a href="./welcome.php">返回</a></p>
<h3>我的档案</h3>

<?php
    $connect = mysql_connect("localhost","root","iamtonny");
    if (!$connect){
        echo"<script>alert('数据库连接失败！')</script>";
    }
    mysql_select_db("film");
    session_start();
    $username = $_SESSION['name'];
    $sql = "select * from user_list where user_name ='$username'";
    $result = mysql_query($sql);
    $arr = array();
    while($rs = mysql_fetch_assoc($result)){ $arr[]=$rs;  }
?>
用户id:
<?php print($arr[0][user_id]); ?>
</br>
用户名:
<?php print($arr[0][user_name]); ?>
</br>
昵称:
<?php print($arr[0][nick_name]);   ?>
</br>
电话:
<?php print($arr[0][phone_num]);   ?>
</br>
邮箱:
<?php print($arr[0][mail]);   ?>
</br>
<hr />
<center><h3>更改档案</h3></center>
<p> 爷也可以更改个人信息哦！</p>
<p> *注:除了用户名不能更改外，其他均可以更改..  </p>

<div id="b">
<form action="./changeprofilecheck.php" method="post">

昵称: <input type="text" class="a" name="usrnickname">
<br>
密码: <input type="text" class="a" name="usrpw1">
<br>
确认密码: <input type="text" class="a" name="usrpw2">
<br>
邮箱: <input type="text" class="a" name="usremail">
<br>
手机号: <input type="text" class="a" name="usrphone">
<br>

<center>
</br>
<input type="submit" name="submit" value="更改">
</center>
</form>
</div>

<hr />

<?php
    $sql = "SELECT * FROM `user_theme` WHERE `user_id` =".$arr[0][user_id]." and `theme_id` = 2"; $re = mysql_query($sql); $num = mysql_num_rows($re); 
    if($num) $s_t1 = "checked"; else $s_t1 = "";
    $sql = "SELECT * FROM `user_theme` WHERE `user_id` =".$arr[0][user_id]." and `theme_id` = 1"; $re = mysql_query($sql); $num = mysql_num_rows($re);
    if($num) $s_t2 = "checked"; else $s_t2 = "";
    $sql = "SELECT * FROM `user_theme` WHERE `user_id` =".$arr[0][user_id]." and `theme_id` = 3"; $re = mysql_query($sql); $num = mysql_num_rows($re);
    if($num) $s_t3 = "checked"; else $s_t3 = "";

    $sql = "SELECT * FROM `user_director` WHERE `user_id` =".$arr[0][user_id]." and `director_id` = 1"; $re = mysql_query($sql); $num = mysql_num_rows($re);
    if($num) $s_d1 = "checked"; else $s_d1 = "";

    $sql = "SELECT * FROM `user_actor` WHERE `user_id` =".$arr[0][user_id]." and `actor_id` = 2"; $re = mysql_query($sql); $num = mysql_num_rows($re);
    if($num) $s_a1 = "checked"; else $s_a1 = "";



?>



<div style="login">
<center>
<h3>喜好设定</h3>
<p>选择自己的喜好，libi会根据你的喜好进行推荐</p>
</center>
<center><p> 电影题材 </p> 
<form method="post" action="./myprofile.php">

<?php
/*theme*/
	$username = $_SESSION['name'];
	$y = $arr[0][user_id];
	mysql_query("set names utf8"); 
	$sql = "SELECT * FROM `theme` WHERE 1";
	$result1 = mysql_query($sql);
	$num1 = mysql_num_rows($result1);
	$arr1 = array();
	for($x=0;$x<$num1;$x++)
{
	$rs = mysql_fetch_assoc($result1);
	$arr1[] = $rs;
}
	for($x=0;$x<$num1;$x++)
{
	$name = $arr1[$x][theme_name];
	$id = $arr1[$x][theme_id];
	$sql2 = "SELECT * FROM `user_theme` WHERE `user_id` ='{$y}'  and `theme_id` = '{$id}'";
	$result2 = mysql_query($sql2);
	$test = mysql_fetch_array($result2);
    if($test == true){
        echo '<input name="check1[]" type="checkbox" value='.$id.' checked = "checked" />'.$name;
	}
	else
		echo '<input name="check1[]" type="checkbox" value='.$id.'/>'.$name;
}
/*director*/
echo '<p> 导演 </p>';

$sql = "SELECT * FROM `director` WHERE 1";
	$result1 = mysql_query($sql);
	$num1 = mysql_num_rows($result1);
	$arr1 = array();
	for($x=0;$x<$num1;$x++)
{
	$rs = mysql_fetch_assoc($result1);
	$arr1[] = $rs;
}
	for($x=0;$x<$num1;$x++)
{
	$name = $arr1[$x][director_Name];
	$id = $arr1[$x][director_Id];
	$sql2 = "SELECT * FROM `user_director` WHERE `user_id` ='{$y}'  and `director_id` = '{$id}'";
	$result2 = mysql_query($sql2);
	$test = mysql_fetch_array($result2);
    if($test == true){
        echo '<input name="check2[]" type="checkbox" value='.$id.' checked = "checked" />'.$name;
	}
	else
		echo '<input name="check2[]" type="checkbox" value='.$id.'/>'.$name;
}
echo '<p> 演员 </p>';
$sql = "SELECT * FROM `actor` WHERE 1";
	$result1 = mysql_query($sql);
	$num1 = mysql_num_rows($result1);
	$arr1 = array();
	for($x=0;$x<$num1;$x++)
{
	$rs = mysql_fetch_assoc($result1);
	$arr1[] = $rs;
}
	for($x=0;$x<$num1;$x++)
{
	$name = $arr1[$x][actor_name];
	$id = $arr1[$x][actor_id];
	$sql2 = "SELECT * FROM `user_actor` WHERE `user_id` ='{$y}'  and `actor_id` = '{$id}'";
	$result2 = mysql_query($sql2);
	$test = mysql_fetch_array($result2);
    if($test == true){
        echo '<input name="check3[]" type="checkbox" value='.$id.' checked = "checked" />'.$name;
	}
	else
		echo '<input name="check3[]" type="checkbox" value='.$id.'/>'.$name;
}
echo '</br></br>';
?>
<input type="submit" name="submit" value="选择">
</form>
</center>

<? 
    $connect = mysql_connect("localhost","root","iamtonny");
    mysql_select_db("film",$connect); 
    mysql_query("set names utf8"); 
    session_start();
    $name = $_SESSION['name'];
	$x = $arr[0][user_id];
    if(isset($_POST["submit"])&&$_POST["submit"]=="选择"){
		/*   theme  */
		mysql_query("DELETE FROM `user_theme` WHERE `user_id` = '{$x}'");
	 foreach($_POST['check1'] as $val) {
         mysql_query("INSERT INTO `user_theme` (`user_id`, `theme_id`) VALUES ('{$x}', '{$val}')");
    } 

	$d1 = $_POST['d1'];

        $a1 = $_POST['a1'];

    
    /*  director  */
		mysql_query("DELETE FROM `user_director` WHERE `user_id` = '{$x}'");
	 foreach($_POST['check2'] as $val) {
         mysql_query("INSERT INTO `user_director` (`user_id`, `director_id`) VALUES ('{$x}', '{$val}')");
    } 
    /*  actor  */
			mysql_query("DELETE FROM `user_actor` WHERE `user_id` = '{$x}'");
	 foreach($_POST['check3'] as $val) {
         mysql_query("INSERT INTO `user_actor` (`user_id`, `actor_id`) VALUES ('{$x}', '{$val}')");
    } 

	}
    //if($_POST)
    //    echo "<script>alert('操作成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";

?>
</div>











