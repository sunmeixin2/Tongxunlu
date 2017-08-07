<?php
/**
*	好友信息修改
*/
session_start();

 $uid=$_SESSION['uid'];
// $fid=$_POST['fid'];
$fid=2;

if(empty($fid))
	header("location:error.html");
else{
	//接收数据
	$name=$_POST['name'];
	$sex=$_POST['sex'];
	$email=$_POST['email'];
	$tel=$_POST['tel'];
	$address=$_POST['address'];
	include('mysql_connec.php');
	$update="update friend set name='".$name."',sex='".$sex."',email='".$email."',tel='".$tel."',address='".$address."' where fid=".$fid;
	$result=$db->query($update);
	if($result){
		//修改成功
		header("location:haoyou.html");
	}else{
		//SQL语句出错
		header("location:error.html");
	}
}


?>