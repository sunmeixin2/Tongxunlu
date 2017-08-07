<?php
/**
*	显示所有的好友信息
*/
session_start();

$uid=$_SESSION['uid'];

include('mysql_connec.php');

$select="select fid,name,sex,email,tel,address from friend where uid=".$uid;

$result=$db->query($select);

if($result){
	$i=0;
	while ($fri_info=$result->fetch_assoc()) {
		$data=[$i]=$fri_info;
	}
	echo json_encode($fri_info);
}
else
	//SQL语句出现错误
	header("location:error.html");




?>