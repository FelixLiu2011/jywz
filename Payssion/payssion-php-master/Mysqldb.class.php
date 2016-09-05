<?php
/**
 * 专门用于操作数据库的类
 * @author LAOYANG
 *
 */
//引入常量配置文件
require_once 'config.php';

//类名
class Mysqldb{
	//私有属性
	//连接对象
	private $link;
	//查询结果
	private $result;
	
	//两个下划线的都是魔术方法   new当前类的时候会触发构造方法
	public function __construct()
	{
		//创建连接
		$this->link = mysql_connect(HOST,USR,PWD) or die("数据库连接失败".mysql_error());
		
		//选择一个数据库
		$db=mysql_select_db(DBNAME);
		//判断选择一个数据库是否成功
		if(!$db)
		{
			die("选择一个数据库失败!!");;
		}
		
		//设置字符集编码
		mysql_query("set names ".ENCODE);
	}
	
	/**
	 * 
	 * 专门用于执行查询的select语句
	 * @param $sql:select语句
	 */
	public function cha($sql){
		//如果这个sql没有被设置值
		if(!isset($sql))
		{
			die("没有为查询sql赋值");
		}
		
		//执行sql语句得到结果集
		$this->result = mysql_query($sql);
		
		if(!$this->result)
		{
			die("sql语句执行失败:".$sql);
		}
		
		//把循环结果放到一个数组中
		$arr = array();
		//读取一条记录(是一个一维数组)，
		while($row = mysql_fetch_array($this->result)){
			//向数组中添加每一行的内容
			$arr[] = $row;
		}
		//得到的是一个二维数组,返回二维数组
		return $arr;
	}
	
	/**
	 * 
	 * 专门用于执行按主键查询或只有一条记录查询
	 * @param $sql:select 语句.如：select * from 表 where id=1 
	 */
	public function chaId($sql)
	{
		//如果这个sql没有被设置值
		if(!isset($sql))
		{
			die("没有为查询sql赋值");
		}
		
		//执行sql语句得到结果集
		$this->result = mysql_query($sql);
		
		if(!$this->result)
		{
			die("sql语句执行失败".$sql);
		}
		
		//因为只有一条记录  所以不需要循环
		$row = mysql_fetch_array($this->result);
		
		//返回一维数组
		return $row;
	}
	/**
	 * 
	 * 专门用于添删改:insert,delete,update语句
	 * @param sql:insert,delete,update语句
	 */
	public function tsg($sql)
	{
		//如果这个sql没有被设置值
		if(!isset($sql))
		{
			die("没有为查询sql赋值");
		}
		
		//执行:insert,delete,update语句
		$i=mysql_query($sql);//有返回值.真,假,真成功.
		if(!$i)
		{
			die("sql语句执行失败:".$sql);
		}
		
	
	}
	/**
	 * 
	 * 总记录数:
	 * @param $sql:select count(*) from users
	 */
	public function Zjls($sql){
		//如果这个sql没有被设置值
		if(!isset($sql))
		{
			die("没有为查询sql赋值");
		}
		
		//执行sql语句得到结果集
		$this->result = mysql_query($sql);
		
		if(!$this->result)
		{
			die("sql语句执行失败:".$sql);
		}
		//查询结果只有一条记录(不需要循环)。一行一列
		$row=mysql_fetch_array($this->result);
		//
		return  $row[0];
		
		
	}
	//总页数=总记录数%每页大小==0?总记录数/每页大小:(int)(总记录数/每页大小)+1;
	/**
	 * 
	 * 总页数=总记录数%每页大小==0?总记录数/每页大小:(int)(总记录数/每页大小)+1;
	 * @param $sql:select count(*) from users
	 * @param $mydx:每页大小
	 */
	public  function Zys($sql,$mydx)
	{
		return 	$this->Zjls($sql)%$mydx==0?$this->Zjls($sql)/$mydx:(int)($this->Zjls($sql)/$mydx)+1;
		
		
	}
	//分页:select a.*,b.departname from users a,depart b where a.departid=b.departid  limit 25,5
	//分页:select * from users    limit 25,5 #第6页
	/**
	 * 
	 * 查询分页
	 * @param  $sql:格式:select * from users  或select a.*,b.departname from users a,depart b where a.departid=b.departid 
	 * @param  $dqy:当前页
	 * @param  $mydx:每页大小
	 */
	public  function Fy($sql,$dqy,$mydx)
	{
		//分页格式:select * from users limit (n-1)*每页大小,每页大小 #n表示当前页
		//如果这个sql没有被设置值
		if(!isset($sql))
		{
			die("没有为查询sql赋值");
		}
		//拼select语句:格式:select * from users    limit 25,5
		$sql.=" limit ".  ($dqy-1)*$mydx ."," .$mydx;
		//echo $sql;
		//执行sql语句得到结果集
		$this->result = mysql_query($sql);
		
		if(!$this->result)
		{
			die("sql语句执行失败:".$sql);
		}
		
		//把循环结果放到一个数组中
		$arr = array();
		//读取一条记录(是一个一维数组)，
		while($row = mysql_fetch_array($this->result)){
			//向数组中添加每一行的内容
			$arr[] = $row;
		}
		//得到的是一个二维数组,返回二维数组
		return $arr;
	}
	//关闭数据库  在程序运行结束的时候会触发析构方法
	//析构函数:自动调用.用来连接数据为时释放资源的
	public function __destruct(){
		//关闭数据库 如果if或者for执行的代码只有一句的时候，可以省略大括号
		if($this->link)
		mysql_close($this->link);
	}
	
}
