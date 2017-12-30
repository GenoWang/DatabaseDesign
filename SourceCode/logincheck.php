<head>
 <meta charset="utf8">
<?php
    if(isset($_POST["submit"]) && $_POST["submit"] == "登录")  
    {  
        $user = $_POST["usrname"]; 
	
        $psw = $_POST["usrpw"];  

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
            $sql = "select * from user_list where user_name ='$user' and pwd ='$psw' ";
            $result = mysql_query($sql);  
            $num = mysql_num_rows($result);  
            if($num)  
            {  
		echo "<script>alert('欢迎大爷！');</script>";
		session_start();
		$_SESSION['name']=$user;
                //echo $_SESSION['name'];
		header("Location:welcome.php");
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
