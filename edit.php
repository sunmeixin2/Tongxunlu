<?php
/**
*	修改密码
*/

session_start();


$uid=$_SESSION['uid'];


//接收数据
$pwd_pre=trim($_POST['pwd_pre']);
$pwd_new=trim($_POST['pwd_new']);
$pwd_verf=trim($_POST['pwd_verf']);

include('mysql_connec.php');

//验证初始密码是否正确
$select_pwd_pre="select passwd from user where uid=".$uid;

$result=$db->query($select_pwd_pre);
if($result){
	
	$row=$result->fetch_assoc();
	if($row['passwd']!=md5($pwd_pre))
		//初始密码错误
		header("location:error.html");
	else if ($pwd_new!=$pwd_verf)
		//改后密码和确认密码不正确
		header("location:error.html");
	else{
		
		//修改信息
		$update="update user set passwd='".md5($pwd_new)."' where uid=".$uid;
		$result=$db->query($update);
		if($result){
			//修改成功
			// echo 'ok';
			header("location:home.html");
		}
		else
			//修改语句错误
			header("location:error.html");
	} 
	
}



?>