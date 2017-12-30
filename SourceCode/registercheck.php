<head>
 <meta charset="utf8">
<?php 
    if(isset($_POST["submit"]) && $_POST["submit"] == "注册")
    {

        $username = $_POST["usrname"]; 
	$usernickname = $_POST["usrnickname"];
        $userpsw1 = $_POST["usrpw1"];  
	$userpsw2 = $_POST["usrpw2"];
	$useremail = $_POST["usremail"];
	$userphone = $_POST["usrphone"];

        if($username == "" || $usernickname == "" || $userpsw1 == "" ||$userpsw2 == "" ||$useremail == "" ||$userphone == "")
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
	    if($num0 != 0){
		echo "<script>alert('已经有位爷用这个名字注册过了，对不住喽'); history.go(-1);</script>";
	    }
	    else if($userpsw1 != $userpsw2){
		echo "<script>alert('爷你俩不一样的，不厚道啊！'); history.go(-1);</script>";
	    }
	    else{
		$sql = "INSERT INTO `user_list` (`user_id`, `phone_num`, `pwd`, `nick_name`, `mail`,`user_name`) 
			VALUES (NULL, '$userphone', '$userpsw1', '$usernickname', '$useremail', '$username')";
		$result = mysql_query($sql);
		header("Location:registerok.php");
	    }
        }
    }
    else
    {
        echo "<script>alert('注册未成功！'); history.go(-1);</script>";
    }
?> 
<head>

