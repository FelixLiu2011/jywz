<?php
class ChongzhiAction extends CommAction
{
	public function index()
	{
		$yhzh=$_SESSION["admin"];
		$m=M("yhb");
		$list=$m->where("yhzh='$yhzh'")->select();
		$this->assign("list",$list);
		
		$q=M("pengyou");
		$a=$q->where("yhzh='$yhzh'")->select();
		$this->assign("yhzh",$yhzh);
		$this->assign("a",$a);
		$this->display();
	}
}