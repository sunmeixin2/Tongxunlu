<?php
session_start();
/**
*	前端页面---显示用户信息
*/

//$uid=$_POST['uid'];
$uid=$_SESSION['uid'];

if(!empty($uid)){
	include('mysql_connec.php');
	$select="select img,name,sex,tel,email from user where uid=".$uid;
	$result=$db->query($select);
	if($result){
		$row=$result->fetch_assoc();
		$user_info['name']=$row['name'];
		$user_info['sex']=$row['sex'];
		$user_info['tel']=$row['tel'];
		$user_info['email']=$row['email'];
		$user_info['img']=$row['img'];
		
		echo json_encode($user_info);
	}
	else
		header("location:error.html");
}else{
	header("location:error.html");
}





?>