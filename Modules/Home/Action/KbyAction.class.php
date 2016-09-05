<?php
class KbyAction extends CommAction
{
	public function index()
	{
header("Content-type:text/html;charset=utf-8");
		$zfzt=$_REQUEST["state"];
		$ddid=$_REQUEST["order_id"];
		$czje=$_REQUEST["amount"];
		$m=M("czb");
		$a=$m->where("ddid='$ddid'")->select();
		if($zfzt=='completed')
		{
			$cgzh=$a[0]["cgzh"];
			$q=M();
			$t=$q->query("select * from yhb where yhzh='$cgzh'");
			$yljb=$t[0]['yhjb'];
			$xjb=$czje+$yljb;
			$xjb=Intval($xjb);
			$b=$q->execute("update yhb set yhjb='$xjb' where yhzh='$cgzh'");
			if($b)
			{
				$this->success("Top-up success","__APP__/Index",1);
			}
			
		}
		else
		{
			$this->success("Top-up failure","__APP__/Index",1);
		}
	}
}