<?php
trait curl{
	function init($url){
		if($ch = curl_init($url)){
			return($ch);
		}else{
			return false;
		}
	}
//初始化curl

	function setport($ch, $option, $value ){
		curl_setopt($ch, $option, $value);
	}
//设置curl

	function copy($ch, $num){ //num 表示需要复制的次数
		for($i = 0; $i < $num; $i++){
			$copy_ch[$i] = curl_copy_handle($ch);
		}
		return $copy_ch;
	}
//复制方法

	function get_resource($ch, $condition = 1, $filename = ""){//如果conditon为1将用浏览器输出否者读入文件
		if($condition){
			curl_exec($ch);
		}else{
			$data = $curl_exec($ch);
			file_put_contents("$filename".$num.".jpg", $data);
		}
	}
//抓取方法

	function close($ch){
		curl_close($ch);
	}
//关闭资源方法

}
