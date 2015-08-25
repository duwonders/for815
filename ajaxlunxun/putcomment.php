<?php
header("Content-type: text/html; charset=UTF-8");
include("conn.php");
$id = $_GET['id'];						//获取上一次查询的终点，判断是否有新信息
$sql = "select * from `comment` where id>$id";
$res = $dbh->prepare($sql);
$res->execute();
if($comments = $res->fetchAll(PDO::FETCH_ASSOC)){
	$comments['status'] = true;        //当有新的消息时就返回数组和状态为true
	$comments = json_encode($comments);
	echo $comments;
}else{
	$comments['status'] = false;       //当没有新的消息就返回false
	$comments = json_encode($comments);
	echo $comments;
}
