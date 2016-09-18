<?php
class YhbAction extends CommAction{
	public function index()
	{
			$p=I("p",1);
			 
			$m=M("yhb");
			 
			import ("ORG.Util.Page");
			 
			$count=$m->count();
			 
			$page=new Page($count,5);
			
			$t=" %first% %upPage% %downPage% %prePage% %linkPage% %end%";
			
			$page->setConfig("theme",$t);
			 
			$list=$m->order("yhid")->limit(($p-1)*5,5)->select();
				
			$pagestr=$page->show();
			 
			$this->assign("list",$list);
			 
			$this->assign("pagestr",$pagestr);
			
			
			 
 			$this->display();
	}
	
	public function deleteyhb($yhid)
	{
	if($yhid==0)
	{
		$this->error("删除失败,客服不允许删除","__APP__/Admin/Yhb",1);	
	}
	else
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
		//修改标识
		public function yhbbs($yhid)
		{
			$m=M("yhb");
			$a=$m->find($yhid);//只能按主键查询，结果一维数组
			$yhb["yhhy"]=$a["yhhy"]==1?0:1;
			
			$where["yhid"]=$yhid;
			
			$m->where($where)->save($yhb);
			
			$this->redirect("__APP__/Admin/Yhb/index");
		
		}
}