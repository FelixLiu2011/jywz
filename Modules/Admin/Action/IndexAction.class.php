<?php
class IndexAction extends CommAction {
	
		//用户登录
		public function login()
		{
			$m=M("admin");
			
			$where=$m->create();
			
			$user=$m->where($where)->select();
			
			if($user)
			{
				$_SESSION["admin"]=$where["mm"];
				
				$this->success("登录成功","__APP__/Admin/Include/frameset",1);	
			}
			else
			{
				$this->error("登录失败","__APP__/Admin",1);
					
			}
		}
	
}