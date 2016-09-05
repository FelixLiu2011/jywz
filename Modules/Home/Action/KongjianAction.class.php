<?php
class KongjianAction extends CommAction
{
	public function index()
	{
		$yhzh=$_SESSION["admin"];
		
		//相册详情
		$q=M("xcxq");
		$a=$q->where("yhzh='$yhzh'")->limit(0,4)->select();
		$this->assign("a",$a);
		$this->assign("yhid",$yhid);
		
		
		//日志
		$b=M("rizhi");
		$c=$b->where("yhzh='$yhzh'")->limit(0,1)->select();
		$this->assign("c",$c);
		
		//留言
		$d=M("liuyan");
		$e=$d->where("yhzh='$yhzh'")->limit(0,1)->select();
		$this->assign("e",$e);
		
		$this->display();
	}
}