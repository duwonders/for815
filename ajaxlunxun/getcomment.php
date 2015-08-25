<?php
header("Content-type: text/html; charset=UTF-8");
include("conn.php");
$comments = json_decode($_POST['comment']);//获取聊天内容
$comment = $comments->comment;
$username = $_COOKIE['username'];//获取用户名
if($comment){
	$sql = "insert into `comment` (username,comment) values('$username','$comment')";
	$res = $dbh->prepare($sql);
	if($res->execute()){                  //成功的方法
		$data = [
			'status' => true,
		];
		$dat = json_encode($data);
		echo $dat;
	}else{                            //插入失败的方法
		$data = [
			'status' => false,
		];
		$dat = json_encode($data);
		echo $dat;
	}
}else{                                  //评论为空的方法
		$data = [
			'status' => false,
		];
		$dat = json_encode($data);
		echo $dat;
}
