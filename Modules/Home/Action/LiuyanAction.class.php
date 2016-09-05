<?php
class LiuyanAction extends CommAction
{
	public function index()
	{
			$yhzh=$_SESSION["admin"];
			$p=I("p",1);
			 
			$m=M("liuyan");
			 
			import ("ORG.Util.Page");
			 
			$count=$m->where("yhzh='$yhzh'")->count();
			 
			$page=new Page($count,5);
			
			$t="%first% %upPage% %downPage% %prePage%";
			
			$page->setConfig("theme",$t);
			 
			$list=$m->where("yhzh='$yhzh'")->limit(($p-1)*5,5)->select();
				
			$pagestr=$page->show();
			 
			$this->assign("list",$list);
			
			$this->assign("yhzh",$yhzh);
			 
			$this->assign("pagestr",$pagestr);
			 
 			$this->display();
	}
	
	public function lynr()
	{
		$id=$_REQUEST["id"];
		$m=M("liuyan");
		$list=$m->where("id='$id'")->select();
		$this->assign("list",$list);
		$this->display();
	}
	
	public function sc()
	{
		$id=$_REQUEST["id"];
		$m=M();
		$a=$m->execute("delete from liuyan where id='$id'");
		if($a)
		{
			$this->success("删除成功","__APP__/Liuyan",1);
		}
		else 
		{
			$this->error("删除失败","__APP__/Liuyan",1);
		}
	}
}