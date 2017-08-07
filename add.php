<?php
/**
*	添加好友
*/
session_start();

$uid=$_SESSION['uid'];
// $uid=3;

//接收信息
$name=trim($_POST['name']);
$sex=trim($_POST['sex']);
$tel=trim($_POST['telnumber']);
$email=trim($_POST['email']);
$address=trim($_POST['address']);

include('mysql_connec.php');

$insert="insert into friend(uid,name,sex,tel,email,address) value(".$uid.",'".$name."','".$sex."','".$tel."','".$email."','".$address."')";

$result=$db->query($insert);
if($result){
	//添加成功
	header("location:haoyou.html");
}
else
	//SQL语句出错
	header("location:error.html");


?>