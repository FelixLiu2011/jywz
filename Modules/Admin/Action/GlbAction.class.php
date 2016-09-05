<?php
class GlbAction extends CommAction
{
public function index()
	{
			$p=I("p",1);
			 
			$m=M("admin");
			 
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
	
	public function deleteglb($id)
	{
		$m=M("admin");
		$where["id"]=$id;
		
		if($m->where($where)->delete())
		{
			$this->success("删除成功","__APP__/Admin/Glb/index",1);
		}
		else 
		{
			$this->error("删除失败","__APP__/Admin/Glb/index",1);	
		}
	}
	public function insertglb()
	{
			$m=new Model("admin");
			
			$user=$m->create();
			
			if($m->add($user))
			{
				$this->success("添加成功","__APP__/Admin/Glb/index");
			}
			
			else 
			{
				$this->error("添加失败","__APP__/Admin/Glb/index");
			}
	}
	public function edit($id)
	{
	
		$m=M("admin");
	
		$user=$m->find($id);
	
		$this->assign("user",$user);
	
		$this->display();
	}
	
	public function updateglb()
	{
		$m=M("admin");
		
		$user=$m->create();
		
		$i=$m->save($user);
		
		if($i)
		{
			$this->success("修改成功","__APP__/Admin/Glb/index",1);
		}
		else
		{
			$this->error("修改失败","__APP__/Admin/Glb/index",1);
		}
	}
}