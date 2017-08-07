<?php

/**
*	注册页面
*/

//var_dump($_FILES['file']['name']==null);
$file=$_FILES['file'];	//得到传输的数据
//得到文件名称
$name = $file['name'];
$type = strtolower(substr($name,strrpos($name,'.')+1));	 	//得到文件类型，并且都转化成小写

$allow_type = array('jpg','jpeg','gif','png'); 		//定义允许上传的类型
//判断文件类型是否被允许上传
if(!in_array($type, $allow_type)){
  //如果不被允许，则直接停止程序运行
  return ;
}

$uplode_path = $_SERVER['DOCUMENT_ROOT']."/tongxunlu/img/"; //上传文件的存放路径
//设置时间戳重命名图片
$randname=time().".".$type;
//判断文件是否通过 HTTP POST上传
if(is_uploaded_file($_FILES['file']['tmp_name']))
{
	//将临时位置的文件移动到指定的目录上
	if(move_uploaded_file($_FILES['file']['tmp_name'], $uplode_path.$randname))
	{
		//文件名保存到img变量中，方便以后添加到数据库中
		 $img=$randname;
	}
	else
	{
		//文件上传失败
		header("location:error.html");
	}
}
else{
	//文件上传失败
	header("location:error.html");
}


//接收数据

$email=trim($_POST['email']);
$passwd=trim($_POST['pass1']);
$name=trim($_POST['name']);
$sex=trim($_POST['sex']);
$tel=trim($_POST['telnumber']);

//连接数据库
@$db=new mysqli('localhost','root','','tongxunlu');
$db->query('set names utf8');

if(mysqli_connect_error())
	header("location:error.html");
else{
	//插入用户信息
	$insert="insert into user(email,img,sex,passwd,name,tel) value('".$email."','".$img."','".$sex."','".md5($passwd)."','".$name."','".$tel."')";
	$result=$db->query($insert);
	if($result){
		header("location:login.html");
	}else{
		//添加数据发生错误
		header("location:error.html");
	}

}
?>