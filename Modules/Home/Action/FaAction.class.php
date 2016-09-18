<?php
class FaAction extends CommAction
{
public function index()
	{
		$yhzh=$_SESSION["admin"];
		
		$p=I("p",1);
		
		$m=M("shoujian");
		
		import ("ORG.Util.Page");
		
		$count=$m->where("yhzh='$yhzh'")->count();
		
		$page=new Page($count,5);
			
		$t="%first% %upPage% %downPage% %prePage%";
			
		$page->setConfig("theme",$t);
		
		$list=$m->where("yhzh='$yhzh'")->limit(($p-1)*5,5)->select();
		
		$pagestr=$page->show();
		
// 		$date=new DateTime($list[0]["fjsj"]);
// 		$sj=$date->format("Y-m-d");
// 		$list[0]["fjsj"]=$sj;
		$this->assign("list",$list);
		
		$this->assign("pagestr",$pagestr);
		
		$this->display();
	}
	public function nr($id)
	{
		$id=$_REQUEST["id"];
		$t=M();
		$t->execute("update shoujian set sfdq=1 where id='$id'");
		$m=M();
		$a=$m->query("select * from shoujian where id='$id'");
		$this->assign("a",$a);
		$this->display();
	}
	public function sc($id)
	{
		$id=$_REQUEST["id"];
		//var_dump($id);
		$m=M();
		$a=$m->execute("delete from shoujian where id='$id'");
		if($a)
		{
			$this->success("删除成功","__APP__/Fa",1);
		}
		else
		{
			$this->error("删除失败","__APP__/Fa",1);
		}
	}
}