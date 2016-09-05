<?php
class IndexAction extends CommAction{
	public function index()
	{
		$orderid=$_REQUEST["cm"];
		


		$yhzh=$_SESSION["admin"];
		$m=M();
		$list=$m->query("select * from yhb where yhzh='$yhzh'");
		$this->assign("list",$list);
		
		$q=M();
		$q1=$q->query("select * from yhb where yhzh <> '$yhzh' limit 0,5");
		$this->assign("q1",$q1);
		
		$this->display();
	}
	public function pengyou()
	{
		$yhzh=$_SESSION["admin"];
		$q=M();
		$pyid=$_REQUEST["pyid"];
		$a=$q->query("select yhzh from yhb where yhid='$pyid'");
		$pyzh=$a[0]['yhzh'];
		$w=M();
		$aa=$w->query("select * from pengyou where yhzh='$yhzh' and pyzh='$pyzh'");
		if($aa)
		{
			$this->error("请不要重复添加","__APP__/Index",1);
		}
		else 
		{
			if($yhzh==$pyzh)
			{
				$this->error("添加失败,不能添加自己为好友","__APP__/Index",1);
			}
			else
			{
			
				$m=M();
				$b=$m->execute("insert into pengyou (yhzh,pyzh) values ('$yhzh','$pyzh') ");
				if($b)
				{
					$this->success("添加成功","__APP__/Index",1);
				}
			}
		}
	}
	
	public function gywm()
	{
		$this->display();
	}
	public function lxwm()
	{
		$this->display();
	}
	public function bzzx()
	{
		$this->display();
	}
}