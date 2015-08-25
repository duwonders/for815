interface shop{
	public function mai{}；
	public function mai{}；
}//定义一个接口类，其子类必须要实现其中的全部方法

class baseshop implements shop{}//继承接口类的方法



开放封闭原则:软件实体是可拓展而不可修改的。
对扩展开放:意味着有新的需求或变化时，可以对现有代码进行扩展，以适
应新的情况。对修改封闭:意味着类一旦设计完成，就可以独立完成其工
作，而不要对类进行任何修改。“需求总是变化”、“世界上没有一个软件
是不变的”，这些言论是对软件需求最经典的表白。从中透射出一个关键的
意思就是，对于软件设计者来说，必须在不需要对原有的系统进行修改
的情况下，实现灵活的系统扩展。而如何能做到这一点呢？
只有依赖于抽象。实现开放封闭的核心思想就是对抽象编程，而不对具体编程
，因为抽象相对稳定。让类依赖于固定的抽象，所以对修改就是封闭的
；而通过面向对象的继承和对多态机制，可以实现对抽象体的继承，
通过覆写其方法来改变固有行为，实现新的扩展方法，所以对于扩展就是开放
的。这是实施开放封闭原则的基本思路，同时这种机制是建立在两个基本的
设计原则的基础上，这就是Liskov替换原则和合成/聚合复用原则。关于这两个
原则，我们在本书的其他部分都有相应的论述，在应用反思部分将有深入的讨
论。对于违反这一原则的类，必须进行重构来改善，常用于实现的设计模式
主要有Template Method模式和Strategy模式。而封装变化，是实现这一原则
的重要手段，将经常发生变化的状态封装为一个类。


迪米特法则:在类的设计上，每个类都应当尽量降低成员的访问权限。
类之间的耦合性越弱，越有利于复用，一个处于弱耦合的类被修改，不会
对有关系的类造成波及。






装饰模式:动态的给一个对象添加一些额外的职责，就添加功能来说，
装饰者模式比生成子类更加灵活。
对应同等级的类，比如衣服，鞋子，头发，裤子每一种写一个接口
interface clothse{
	public function style{}
}

interface shose{
	public function style{}
}

interface hair{
	public function style{}
}
然后用继承写一个装饰风格库 头发有哪些风格，鞋子有哪些风格。。。。
封装一个person类当传来一个需要装扮的人的时候
class person(name){
	new shoes();
	new hair();
	......
}





代理模式:对其它对象提供一种代理控制对这个对象的访问。
定义一个接口类：
interface follower{
	public function givedolls(){}
	public function giveflowers(){}
	public funcrion giveChocolate(){}
}
然后让代理者和真凶继承这个类
class zhenxiong implements follower{
	定义函数;
}
class daili implements follower{
	public function 实例化真凶(){
		$henxiong = new zhenxiong();
	}//实例化真凶
	public function givedolls(){
		zhenxiong->givedolls();
	}//用真凶的接口函数来实现代理的接口函数
	....
}





工厂模式:定义一个用于创建对象的接口，让子类决定实例化哪一个类。
工厂方法使一个类的实例化延迟到子类。
分别写出不同功能的类
class jiafa(){}
class jianfa(){}
class chufa(){}
class chengfa(){}
interface Ifactory{
	public function createNewOpration(){};
}//公共接口用于新建对象
class createAdd implements Ifactory(){
	public function createNewAdd(){
		$jafa = new add();
		return $jafa;
	}
}//用于返回新建对象
这样就可以在不违反封闭原则的条件下加功能比如添加一个阶乘的类
class jiecheng(){}
然后继承接口 一个class createJcheng()类;
在前端判断后新建对象new createjiecheng()





模板模式:定义一个操作的算法骨架，将一些步奏延迟到子类中。模板方法
使得子类可以不改变一个算法的结构即可重定义该算法的某些特定的步奏。

abstruct class classname{
	public function function1(){}
	public function function2(){}
	public function 调用模板(){//该方法会自动调用其中所定义的方法
	function1();
	function2();
	echo"";
}
}//相当于一个接口
子类继承时将其抽象方法实现
class classname1 extends classname{
	public function function1(){
		函数的定义;
	}
	public function function2(){
		函数的定义2;
	}
}





外观模式:为子系统中的一组接口提供一个一致的界面，此模式定于了一个
高层接口，这个接口使得这一子系统更加容易使用
有四个类
class lei1{
	private function function1(){
		函数定义
	}
}
class lei2{
	private function function1(){
		函数定义2
	}
}
class lei3{
	private function function1(){
		函数定义3
	}
}
class lei4{
	private function function1(){
		函数定义4
	}
}
定义一个高层接口里面实例化这四个类(根据需求进行组合)
class gaocengjiekou{
	public function facade(){
		one = new lei1();
		two = new lei2();
		three = new lei3();
		four = new lei4();
	}
	public function diaoyongleifangfa(){
		lei1->function1();
		lei2->function2();
		lei3->function3();
		lei4->function4();
	}
}
需要时直接实例化这个高层接口。
这个模式经常用到，在设计之初应该要有意识的将不同的两个层分离，如数
据访问层，业务逻辑层，表示层，层与层之间建立接口，使得耦合度大大降低。






建造者模式:将一个复杂的对象结构与它的表示分离，使得同样的建造过程
可以建造不同的表示。
建造一个小人为例:
abstruct class person{
	private $name;
	private $sex;
	function __construct($name,$sex){
		$this->name = $name;
		$this->sex = $sex;
	}
	function builtfoot(){}
	function builthand(){}
	function builthead(){}
	function builtbody(){}
}
class personbuter extends person{
	fucntion builtfoot(){
		函数实现
		return foot;
	}
	fucntion builthand(){
		函数实现
		return hand;
	}
	fucntion builthead(){
		函数实现
		return head;
	}
	fucntion builtbody(){
		函数实现
		return body;
	}
}
class 指挥创建对象类(){
	personbuter = new personbuter();
	foot = personbuter->builtfoot();
	....
}
客户端只需要new一个指挥创建对象类就好;
这种设计模式适合于创建复杂的对象算法应该独立于该对象的组成部分以
及其它部分的装配方式时适用。





职责链模式:使多个对象都有机会处理请求，从而避免请求发送者和接收者
之间的耦合关系。这个对象连成一条链，并沿着这条链传递该请求，直到有
一个对象处理它为止。
设置一个处理者接口:
interface handlelor{
	public function request();
}
class handlelor1 implements handlelor{
	public function request($request){
		if($request == 1){
			dosomething;
		}else{
			handlener2->request($request);
		}
	}
}
class handlelor2 implements handlelor{
	public function request($request){
		if($request == 2){
			dosomething;
￥Sql			handlener3->request($request);
		}
	}
}
class handlelor3 implements handlelor{
	public function request($request){
		if($request == 3){
			dosomething;
		}else{
			echo"什么东西请求，滚粗！"；
		}
	}
}

5.16日听课记录
数据库择优:概要
1.并发、事物、存储引擎
2.范式与反范式
3.查询性能:优化数据访问、重构查询方式
4.高级特性:视图

并发与锁:
现分为两种存储引擎:
InnoDB{
	事物性存储引擎
	基于聚簇索引建立，对主见查询有很高的性能
	支持热备份
}
MyISAM{
	不支持事物和行级锁
	是5。1之前的默认存储引擎。
}

什么是锁？
当多个用户来访问同一个资源的时候会产生读锁，读锁是共享的，也就是说可以有很多读锁同时存在
当管理员来修改数据库里面的资源时，会产生写锁，这个锁分等级，行级锁，表锁，当要修改数据时这个锁将表或者
某一行锁定，用户和其他管理员在这一时间无法访问或者修改。

什么是事务？
一个事务由很多个事件组成，比如，将用户表里面的杜泽萱删除，然后删除数据表里杜泽萱的数据，这就是一个事务
一个事物包括对数据库的多个连续操作，这些操作不能分离。
死锁:当两个操作同时操作某个表的时候，可能将表锁死。
原子性:整个事务是不可分割的，所有的操作要么全部做完一起提交，要么全部失败。
数据库总是从一个一致性的状态转向另一个一致性的状态
隔离性:一个事务在修改和最终提交前对其它事务是不可见的。
持久性:一旦提交成功，所有的修改将会永远保存在数据库中

什么是范式？
第一范式:第一列都是不可分割的原子数据项，也就是无重复的列
第二范式:一是表必须要一个主键，二是没有包含在主键中的列必须完全依赖于主键，而不能只依赖于主键的一部分
[也就是消除依赖] 
第三范式:任何非主属性不依赖于其它非主属性[在2NF基础上消除传递依赖]；

什么是反范式?
如果说范式是增加依赖关系的话，反范式就是消除依赖关系，范式会影响查询速度，而反范式能够增加查询速度
但是却将表与表之间的关联消弱了，减小了数据的跟新速度。

优化数据访问？
1.是否请求了不必要的数据
2.是否在扫描额外的记录


































