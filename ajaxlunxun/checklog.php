<?php
include ("conn.php");
header("Content-type: text/html; charset=UTF-8");
$usermessage = json_decode($_POST['message']);//获取json数据
$username = $usermessage->username;
$password = $usermessage->password;
//获取传过来的值

$sql = "select * from `user` where username='$username' and password='$password'";
$res = $dbh->prepare($sql);
$res->execute();	
if($allname = $res->fetchAll(PDO::FETCH_ASSOC)){
	setcookie('username', $username, time()+3600, "/");
	$dat = [
		'status'=>'ok',
	];
	$data = json_encode($dat);
	echo $data;
}else{
	$dat = [
		'status'=>'false',
	];
	$data = json_encode($dat);
	echo $data;
}
//验证登陆
