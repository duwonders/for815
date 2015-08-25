<?php
abstract class complexment{
	abstract function get_x();       //获取模中x的长度
	abstract function get_y();		//获取模中y的长度	
	abstract function get_sqrt();	//算出模长并且返回
	abstract function compare(complex $complexnum1);		//进行比较
}
//复数类的抽象类


class complex{
	private $complexnum;
	private $x = 0;
	private $y = 0;
	private $condition = false;//判断这个复数是否可以进行比较
	function __construct($str){
		$this->complexnum = $str;
		$this->get_x();
		$this->get_y();
	}
	//构造方法

	public function get_x(){
		$preg = '/-?^\d+/';          //匹配以数字开头和加或减号结尾的字符串
		preg_match($preg, $this->complexnum, $matches);    
		$this->condition = ($matches) ? true : false;        //如果没有匹配成功就将情况设置为false
		$this->x = ($this->condition) ? $matches[0] : "";    //如果condition为真就将数字部分赋给x
		if(!$this->condition){
			echo"不符合格式";
		}
		// echo $this->x;
	}
	//获取x的方法

	public function get_y(){
		$preg = "/(\d+)?i/";
		preg_match($preg, $this->complexnum, $matches);
		if(count($matches) >= 1){                         //获取match函数匹配的整数作为绝对值
			if(count($matches) == 1){					//主要处理i前没有整数的情况
				$this->y = 1;
			}else{         
				$this->y = $matches[1];
			}
		}else{
			$this->condition = false;
			echo"不符合格式";
		}
	}
	//获取y的方法

	public function get_sqrt(){
		return sqrt(($this->x)^2 + ($this->y)^2);
	}
	//获取模的方法

	public function compare(complex $complexnum2){
		if($complexnum2->get_sqrt() > $this->get_sqrt()){
			echo "try2大";
		}else if($complexnum2->get_sqrt() < $this->get_sqrt()){
			echo "try1大";
		}else{
			echo"一样大";
		}
	}
	//比较方法
}	

$try1 = new complex("2-i");//在这里修改
$try2 = new complex("2+i");//在这里修改
$try1->compare($try2);


