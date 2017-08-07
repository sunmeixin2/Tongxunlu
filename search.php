<?php
/**
*	站内搜索
*/
session_start();

 $uid=$_SESSION['uid'];
// $name=$_POST['search'];
$name="王";

if(empty($name))
	header("location:search.html");
else{
	include('mysql_connec.php');
	$select="select *from friend where uid=".$uid." and name like '%".$name."%'";

	$result=$db->query($select);
	if($result){
		$info_fri=$result->fetch_assoc();
		$num=$result->num_rows;
		$info_fri['num']=$num;
		echo json_encode($info_fri);
		//var_dump($info_fri);
	}
	else
		header("location:error.html");

}

?>