<?php

	//连接数据库
	@$db=new mysqli('localhost','root','','tongxunlu');
	$db->query('set names utf8');

	if($db->connect_error())
		header("location:error.html");
	
?>