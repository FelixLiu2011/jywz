<?php
class LiuyanAction extends CommAction
{
public function index()
	{
			$p=I("p",1);
			 
			$m=M("liuyan");
			 
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
	
	public function deletely($id)
		{
			$m=M("liuyan");
			$where["id"]=$id;
			
			if($m->where($where)->delete())
			{
				$this->success("删除成功","__APP__/Admin/Liuyan",1);
			}
			else 
			{
			$this->error("删除失败","__APP__/Admin/Liuyan",1);	
				
			}
		}
}