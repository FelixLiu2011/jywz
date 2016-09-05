<?php
class XnliwuAction extends CommAction
{
	public function index()
	{
			$p=I("p",1);
			 
			$m=M("xnliwu");
			 
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
	
	public function insertxnliwu()
	{
			$m=new Model("xnliwu");
			
			$user=$m->create();
			$tp=$this->upload();
			
			
			if($tp)
			{
				$user["lwtp"]=$tp;
			}
			
			if($m->add($user))
			{
				$this->success("添加成功","__APP__/Admin/Xnliwu/index");
			}
			
			else 
			{
				$this->error("添加失败","__APP__/Admin/Xnliwu/index");
			}
	}
	
	public function deletexnliwu($id)
	{
		$m=M("xnliwu");
		$where["id"]=$id;
		
		if($m->where($where)->delete())
		{
			$this->success("删除成功","__APP__/Admin/Xnliwu/index",1);
			
		}
		else 
		{
		$this->error("删除失败","__APP__/Admin/Xnliwu/index",1);	
			
		}
	}
	
	public function edit($id)
	{
		$m=M("xnliwu");
		
		$user=$m->find($id);
		
		$this->assign("user",$user);
		
		$this->display();
	}
	
	public function updatexnliwu()
	{
		$m=M("xnliwu");
		
		$user=$m->create();
		$tp=$this->upload();
		if($tp)
		{
			$user["lwtp"]=$tp;
		}
		
		$i=$m->save($user);
		
		if($i)
		{
			$this->success("修改成功","__APP__/Admin/Xnliwu");
		}
		else
		{
			$this->error("修改失败","__APP__/Admin/Xnliwu");
		}
	}
}