<?php
/**
*	登录页面
*/
session_start();

$email=trim($_POST['email']);
$passwd=trim($_POST['passwd']);

// //连接数据库
// @$db=new mysqli('localhost','root','','tongxunlu');
// $db->query('set names utf8');

// if(mysqli_connect_error())
// 	header("location:error.html");
include('mysql_connec.php');


	//判断用户名和密码是否符合
	$select="select uid,passwd from user where email='".$email."'";

	$result=$db->query($select);
	if($result){
		$num=$result->num_rows;
		$row=$result->fetch_assoc();

		if($num==0||$row['passwd']!=md5($passwd)){
			//用户名或密码输入错误
			header("location:error.html");
		}
		else{
			//设置session
			$_SESSION['uid']=$row['uid'];
			header("location:home.html?".$_SESSION['uid']);
		}

	}else{
		//查询语句错误
		header("location:error.html");
	}



?>