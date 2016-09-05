<?php
class FaAction extends CommAction
{
	public function index()
	{
		
		$p=I("p",1);
		
		$m=M("fajian");
		
		import ("ORG.Util.Page");
		
		$count=$m->count();
		
		$page=new Page($count,5);
			
		$t="%first% %upPage% %downPage% %prePage%";
			
		$page->setConfig("theme",$t);
		
		$list=$m->limit(($p-1)*5,5)->select();
		
		$pagestr=$page->show();
		
		$this->assign("list",$list);
		
		$this->assign("pagestr",$pagestr);
		
		$this->display();
	}
	
	public function deletefajian($id)
	{
		$m=M();
		$a=$m->execute("delete from fajian where id='$id'");
		if($a)
		{
			$this->success("删除成功","__APP__/Admin/Fa",1);
		}
		else
		{
			$this->error("删除失败","__APP__/Admin/Fa",1);
		
		}
	}
}