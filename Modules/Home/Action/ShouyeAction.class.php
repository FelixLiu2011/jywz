<?php
class ShouyeAction extends CommAction{
	
	public function index()
	{
		$yhzh=$_SESSION["admin"];
		$m=M();
		$list=$m->query("select * from yhb where yhzh='$yhzh'");
		
		$this->assign("list",$list);
		
		$hy=$list[0]['yhhy'];
		
		
		$p=I("p",1);
		 
		$m=M("yhb");
		 
		import ("ORG.Util.Page");
		 
		$count=$m->count();
		 
		$page=new Page($count,12);
		
		$t="%first% %upPage% %downPage% %prePage%";
		
		$page->setConfig("theme",$t);
		 
		$q1=$m->where("yhzh <> '$yhzh'")->limit(($p-1)*12,12)->select();
			
		$pagestr=$page->show();
		 
		$this->assign("q1",$q1);
		
		if(!$hy){
			$pagestr="<a href=javascript:alert('权限不足，请升级'); >下一页</a>";	
		}
		 
		$this->assign("pagestr",$pagestr);
		
		$this->display();
	}
public function pengyou($pyzh)
		{
			$yhzh=$_SESSION["admin"];
			$pyzh=$_REQUEST["pyzh"];
			
			$m=M();
			$a=$m->query("select * from pengyou where yhzh='$yhzh' and pyzh='$pyzh'");
			if($a)
			{
				$this->error("请不要重复添加","__APP__/Shouye",1);
			}
			else
			{
				if($yhzh==$pyzh)
				{
					$this->error("添加失败,不能添加自己为好友","__APP__/Shouye",1);
				}
				else 
				{
					$q=M();
					$b=$q->execute("insert into pengyou (yhzh,pyzh) values ('$yhzh','$pyzh') ");
					$e=M();
					$c=$e->execute("insert into pengyou (yhzh,pyzh) values ('$pyzh','$yhzh')" );
					if($b && $c)
					{
						$this->success("添加成功","__APP__/Shouye",1);
					}
				}
			}
		}
		public function pengyou1($pyzh)
		{
			$yhzh=$_SESSION["admin"];
			$pyzh=$_REQUEST["pyzh"];
			
			$m=M();
			$a=$m->query("select * from pengyou where yhzh='$yhzh' and pyzh='$pyzh'");
			if($a)
			{
				$this->error("请不要重复添加","__APP__/Index",1);
			}
			else
			{
				if($yhzh==$pyzh)
				{
					$this->error("添加失败,不能添加自己为好友","__APP__/Index",1);
				}
				else 
				{
					$q=M();
					$b=$q->execute("insert into pengyou (yhzh,pyzh) values ('$yhzh','$pyzh') ");
					if($b)
					{
						$this->success("添加成功","__APP__/Index",1);
					}
				}
			}
		}
	
	
}