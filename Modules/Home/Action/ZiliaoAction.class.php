<?php
class ZiliaoAction extends CommAction
{
	public function index()
	{
		$m=M();
		$yhzh=$_SESSION["admin"];
		$list=$m->query("select * from yhb where yhzh='$yhzh'");
		$this->assign("list",$list);
		$this->display();
	}
	
	public function update()
	{
		$yhzh=$_SESSION["admin"];
		$yhsg=$_REQUEST["yhsg"];
		$yhtz=$_REQUEST["yhtz"];
		$gjdq=$_REQUEST["gjdq"];
		$yhsr=$_REQUEST["yhsr"];
		$yhzj=$_REQUEST["yhzj"];
		$yhxl=$_REQUEST["yhxl"];
		$yhnsr=$_REQUEST["yhnsr"];
		$yhxz=$_REQUEST["yhxz"];
		$hlzt=$_REQUEST["hlzt"];
		$m=M();
		$a=$m->execute("update yhb set yhsg='$yhsg',yhtz='$yhtz',gjdq='$gjdq',yhsr='$yhsr',yhzj='$yhzj',yhxl='$yhxl',yhnsr='$yhnsr',yhxz='$yhxz',hlzt='$hlzt' where yhzh='$yhzh'");
		if($a)
		{
			$this->success("修改成功","__APP__/Shouye",1);
		}
		else 
		{
			$this->error("修改失败","__APP__/Ziliao",1);
		}
	}
	
	public function touxiang()
	{
		$yhzh=$_SESSION["admin"];
		$m=M("yhb");
		$user=$m->create();
		$tp=$this->upload();
		if($tp)
		{
			$user["yhtx"]=$tp;
		}
		$i=$m->where("yhzh='$yhzh'")->save($user);
		if($i)
		{
			$this->success("修改成功","__APP__/Shouye",1);
		}
		else
		{
			$this->error("修改失败","__APP__/Touxiang",1);
		}
	}
	
	
	public function mima()
	{
		$yhzh=$_SESSION["admin"];
		$ysmm=$_REQUEST["ysmm"];
		$xmm=$_REQUEST["xmm"];
		$m=M();
		$a=$m->query("select yhmm from yhb where yhzh='$yhzh'");
		$yhmm=$a[0]['yhmm'];
		if($yhmm==$ysmm)
		{
			$q=M();
			$b=$q->execute("update yhb set yhmm='$xmm' where yhzh='$yhzh'");
			//var_dump($b);
			if($b)
			{
				$this->success("修改成功","__APP__/Shouye",1);
			}
			else
			{
				$this->error("修改失败","__APP__/Xiugaimima",1);
			}
		}
		else
		{
			$this->error("原始密码不正确","__APP__/Xiugaimima",1);
		}
		
	}
}