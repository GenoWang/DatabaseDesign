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
    session_start();
    $n = $_SESSION['name'];
    if(isset($_POST["submit"]) && $_POST["submit"] == "更改")
    {

        $usernickname = $_POST["usrnickname"];
        $userpsw1 = $_POST["usrpw1"];
        $userpsw2 = $_POST["usrpw2"];
        $useremail = $_POST["usremail"];
        $userphone = $_POST["usrphone"];

        if($usernickname == "" || $userpsw1 == "" ||$userpsw2 == "" ||$useremail == "" ||$userphone == "")
        {
            echo "<script>alert('有档案没有填完！不能留空哦'); history.go(-1);</script>";
        }
        else
        {
            $connect = mysql_connect("localhost","root","iamtonny");
            if (!$connect){
                 echo"<script>alert('数据库连接失败！')</script>";
            }
            mysql_select_db("film");
            $sql0 = "SELECT * FROM user_list WHERE user_name LIKE '$username'";
            $result0 = mysql_query($sql0);
            $num0 = mysql_num_rows($result0);
            if($userpsw1 != $userpsw2){
                echo "<script>alert('爷你俩密码不一样的，不厚道啊！'); history.go(-1);</script>";
            }
            else{
                $sql = "UPDATE `user_list` SET `phone_num` = '$userphone', `pwd` = '$userpsw1', `nick_name` ='$usernickname', `mail` = '$useremail' WHERE `user_list`.`user_name` = '$n'";
                $result = mysql_query($sql);
                echo "<script>alert('更改成功！'); </script>";
            }
        }
    }
?> 

<p align=center> <a href="./welcome.php">返回</p>
