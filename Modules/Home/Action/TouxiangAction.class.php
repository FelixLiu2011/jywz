<?php
class TouxiangAction extends CommAction
{
	public function index()
	{
		$yhzh=$_SESSION["admin"];
		$m=M();
		$list=$m->query("select * from yhb where yhzh='$yhzh'");
		$this->assign("list",$list);
		$this->display();
	}
}