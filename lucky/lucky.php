<?php
include('mysql.class.php');
if($conn->_exec('LOCK TABLE award WRITE')){//锁表
	$conn->startsw();                    //开始事务
	$awards = ['iphone4s', 'iphone5s', 'iphone6s', 'imac', 'mac pro', 'mac air'];
	$i = rand(0,5);
	$award = $awards[$i];          //获取奖品
	$award_num = $conn->select_by_sql("SELECT num FROM `award` WHERE award='$award'");//获取对应奖品的件数
	if($award_num > 0){ //判断奖品的件数是否大于0
		// print_r($award_num);
		$sql = "update `award` set num=num-1 where award='$award'";
		// echo $sql;
		$res = $conn->update_by_sql($sql);//数据库里面件数减一
		echo $award;
		$conn->stopsw();
	}else{
		echo "该奖品已抽完再来一次";
	}
}else{
	echo "系统错误";
}
$conn->_exec('UNLOCK TABLE award WRITE');
// $conn->startsw();
// print_r($conn->select_by_sql('select * from award'));
// sleep(3);
// $conn->stopsw();
// $conn->_exec('UNLOCK TABLE award WRITE');
