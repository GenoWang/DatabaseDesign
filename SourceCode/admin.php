<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" >
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
<h2>libilibi后台管理</h2>
</div> 

<div class="login">

<center>
<p> SQL语句在这里可以直接执行:</p>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

<textarea rows="10" cols="100" name="item"> </textarea>
</br>
<input type="submit" name="submit" value="do it!">

</form>
<p>执行结果</p><p>
<?php
	if(isset($_POST["submit"])) {
		$item=$_POST["item"];
		$con = mysql_connect("localhost","root","iamtonny");
		if(!$con){
		    echo "<script>alert('数据库连接失败'); history.go(-1);</script>"; 
		}
		mysql_select_db("film");
		mysql_query("set names utf8");
		$result = mysql_query($item);
		$arr = array();
		while($rs = mysql_fetch_assoc($result)){ $arr[]=$rs; }
		print_r($arr);
//	}else{
//		echo "<script>alert('内容获取失败'); history.go(-1);</script>";
}
?>
</p>
</center>

</div>


