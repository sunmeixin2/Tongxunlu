<?php
/**
*	删除好友信息
*/
session_start();

$uid=$_SESSION['uid'];
$fid=$_POST['fid'];

if(empty($fid)){
	header("location:error.html");
}
else{
	$del="delete from friend where fid=".$fid;
	$result=$db->query($del);
	if($result)
		//删除成功
		header("location:haoyou.html");
	else
		//SQL语句出错
		header("location:error.html");
}



?>