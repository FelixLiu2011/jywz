<?php
class XinjianyoujianAction extends CommAction
{
	public function index()
	{
		$yhzh=$_SESSION["admin"];
		$m=M();
		$list=$m->query("select pyzh from pengyou where yhzh='$yhzh'");
		$this->assign("list",$list);
		$this->display();
	}
	
	public function youjianadd()
	{
		$yhzh=$_SESSION["admin"];
		$sjzh=$_REQUEST["sjzh"];
		$nr=$_REQUEST["nr"];
		if($sjzh)
		{
			$m=M();
			$a=$m->execute("insert into fajian (yhzh,sjzh,nr) values ('$yhzh','$sjzh','$nr')");
			$q=M();
			$b=$q->execute("insert into shoujian (yhzh,fjzh,nr) values ('$sjzh','$yhzh','$nr')");
			if($a)
			{
				if($b)
				{
					$this->success("发送成功","__APP__/Youjian",1);
				}
				else 
				{
					$this->error("发送失败","__APP__/Youjian",1);
				}
			}
		}
		else
		{
			$this->error("发送失败","__APP__/Youjian",1);
		}
		
	}
}