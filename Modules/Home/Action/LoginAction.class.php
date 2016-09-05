<?php
class LoginAction extends CommAction{
	
	
	//得到验证码图片
	public function getImage()
	{
		ob_clean();
	
		$this->verify();

		$_SESSION['verify'];
	}
	public function index()
	{
		$m=M("yhb");
		$list=$m->select();
		$this->assign("list",$list);
		$this->display();
	}
	public function login()
	{
		$yhzh=$_REQUEST["yhzh"];
		$yhmm=$_REQUEST["yhmm"];
		$yhmm1=$_REQUEST["yhmm1"];
		$yhyx=$_REQUEST["yhyx"];
		$yhxb=$_REQUEST["yhxb"];
		$code=$_REQUEST["code"];
		
		
		$m=M();
		$a=$m->query("select * from yhb where yhzh='$yhzh'");
		if($a)
		{
			$this->error("已存在此用户名","__APP__/Login",1);
		}
		else 
		{
			if($yhmm!=$yhmm1)
			{
				$this->error("2次密码不相同","__APP__/Login",1);
			}
			else 
			{
				if($_SESSION['verify']!=md5($code))
				{
					$this->error("验证码错误","__APP__/Login",1);
				}
				else 
				{
					$w=M();
					$b=$w->execute("insert into yhb (yhzh,yhmm,yhyx,yhxb) values ('$yhzh','$yhmm','$yhyx','$yhxb')");
					if($b)
					{
						$this->success("注册成功","__APP__/Login",1);
					}
					else 
					{
						$this->error("注册失败","__APP__/Login",1);
					}
				}
			}
		}
	}
	public function denglu()
	{
		$yhzh=$_REQUEST["yhzh"];
		$yhmm=$_REQUEST["yhmm"];
		$m=M();
		$a=$m->query("select * from yhb where yhzh='$yhzh' and yhmm='$yhmm'");
		$dqsj=$a[0]["dpsj"];
		if($a)
		{
			$_SESSION["admin"]=$yhzh;
			$dq=date("Y-m-d");
			if($dq>$dqsj)
			{
				$m->execute("update yhb set yhhy=0 where yhzh='$yhzh'");
			}
			$this->success("登录成功正在跳转...","__APP__/Index",1);
		}
		else 
		{
			$this->error("帐号或密码不正确","__APP__/Login",1);
		}
	}
	
	//安全退出
	public function tuichu()
	{
		session_unset();
		session_destroy();
	
		$this->success("退出成功","__APP__/Login");//笑脸:)
	}
}