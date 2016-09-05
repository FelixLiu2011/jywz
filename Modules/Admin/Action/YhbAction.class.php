<?php
class YhbAction extends CommAction{
	public function index()
	{
			$p=I("p",1);
			 
			$m=M("yhb");
			 
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
	
	public function deleteyhb($yhid)
		{
			$m=M("yhb");
			$where["yhid"]=$yhid;
			
			if($m->where($where)->delete())
			{
				$this->success("删除成功","__APP__/Admin/Yhb",1);
			}
			else 
			{
			$this->error("删除失败","__APP__/Admin/Yhb",1);	
				
			}
		}
}