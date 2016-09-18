<?php
class ShezhiAction extends CommAction
{
	public function index()
	{
		
		
		$m=M("fsyj");
		
		$list=$m->select();
		
		$this->assign("list",$list);
		
		$this->display();
	}
	public function edit($id)
	{
	
		$m=M("fsyj");
	
		$user=$m->find($id);
	
		$this->assign("user",$user);
	
		$this->display();
	}
	public function updatesl()
	{
		$m=M("fsyj");
		
		$user=$m->create();
		
		$i=$m->save($user);
		
		if($i)
		{
			$this->success("修改成功","__APP__/Admin/Shezhi/index",1);
		}
		else
		{
			$this->error("修改失败","__APP__/Admin/Shezhi/index",1);
		}
	}
	
}