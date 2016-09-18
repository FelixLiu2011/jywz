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
		$p=M();
		$aaa=$p->query("select yhhy from yhb where yhzh='$yhzh'");
		$yhhy=$aaa[0]["yhhy"];
		
		$sjzh=$_REQUEST["sjzh"];
		$nr=$_REQUEST["nr"];
		if($yhhy)
		{
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
		else
		{
			
			$zt=date("Y-m-d H:i:s",strtotime("-1 day"));	//昨天
			$mt=date("Y-m-d H:i:s",strtotime("+1 day"));	//明天
			
			
			$c=M();
			$c1=$c->query("select count(*) from fyjb where yhzh='$yhzh' and sj>'$zt' and sj<'$mt'");
			$count=$c1[0]['count(*)'];
			$v=M();
			$vv=$v->query("select * from fsyj where id=1");
			$vvv=$vv[0]['sl'];
			
			if($count<$vvv)
			{
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
							$i=M();
							$i->execute("insert into fyjb(yhzh) values ('$yhzh')");
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
			else
			{
				$this->error("权限不足","__APP__/Youjian",1);
			}
			
		}
	}
}