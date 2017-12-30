<head>
 <meta charset="utf8">
<?php 
    if(isset($_POST["submit"]) && $_POST["submit"] == "登录")
    {
        $user = $_POST["adminname"]; 

        $psw = $_POST["adminpw"];  

        if($user == "" || $psw == "")
        {
            echo "<script>alert('请输入用户名或密码！不能为空哦'); history.go(-1);</script>";
        }   
        else   
        {     
            $connect = mysql_connect("localhost","root","iamtonny");
            if (!$connect){
                 echo"<script>alert('数据库连接失败！')</script>";
            }
            mysql_select_db("film");
            mysql_query("set names utf8");
	    $sql = "select * from Admin where name ='$user' and pwd ='$psw' ";
            $result = mysql_query($sql);
            $num = mysql_num_rows($result);
            if($num)
            {
                session_start();
                $_SESSION['name']=$user;
                header("Location:admin.php");
            }
            else
            {
                echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";
            }
        }
    }
    else
    {
        echo "<script>alert('提交未成功！'); history.go(-1);</script>";
    }
?> 
<head>
