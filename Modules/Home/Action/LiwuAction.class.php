<?php
class LiwuAction extends CommAction
{
	public function index()
	{
		
		$p=I("p",1);
		
		$m=M("xnliwu");
		
		import ("ORG.Util.Page");
		
		$count=$m->count();
		
		$page=new Page($count,15);
			
		$t="%first% %upPage% %downPage% %prePage%";
			
		$page->setConfig("theme",$t);
		
		$list=$m->limit(($p-1)*15,15)->select();
		
		$pagestr=$page->show();
		
		$this->assign("list",$list);
		
		$this->assign("pagestr",$pagestr);
		
		$this->display();
	}
	
	public function lwxq()
	{
		$id=$_REQUEST["id"];
		$m=M("xnliwu");
		$list=$m->where("id='$id'")->select();
		$this->assign("list",$list);
		$yhzh=$_SESSION["admin"];
		$a=M("pengyou");
		$qq=$a->where("yhzh='$yhzh'")->select();
		$this->assign("qq",$qq);
		$this->display();
	}
	
	public function zslw()
	{
		
		$p=I("p",1);
		
		$m=M("zsliwu");
		
		import ("ORG.Util.Page");
		
		$count=$m->count();
		
		$page=new Page($count,15);
			
		$t="%first% %upPage% %downPage% %prePage%";
			
		$page->setConfig("theme",$t);
		
		$list=$m->limit(($p-1)*15,15)->select();
		
		$pagestr=$page->show();
		
		$this->assign("list",$list);
		
		$this->assign("pagestr",$pagestr);
		
		$this->display();
	}
	
	public function zslwxq()
	{
		$id=$_REQUEST["id"];
		$m=M("zsliwu");
		$list=$m->where("id='$id'")->select();
		$this->assign("list",$list);
		$yhzh=$_SESSION["admin"];
		$a=M("pengyou");
		$qq=$a->where("yhzh='$yhzh'")->select();
		$this->assign("qq",$qq);
		$this->display();
	}
	
	
	
public function slw()
	{
		$yhzh=$_SESSION["admin"];
		
		$tp=$_REQUEST["tp"];
		
		$sl=$_REQUEST["sl"];
		
		$zsdx=$_REQUEST["zsdx"];
		
		$lwjg=$_REQUEST["lwjg"];
		
		$q=M("yhb");
		
		$w=$q->where("yhzh='$yhzh'")->select();
		
		$yhjb=$w[0]["yhjb"];
		
		$zje=$lwjg*$sl;
		
		$syjb=$yhjb-$zje;
		
		$r=M("yhb");
		$aa=$r->where("yhzh='$zsdx'")->select();
		if($aa)
		{
			if($syjb>=0)
			{
				$m=M();
				
				$a=$m->execute("insert into sclw (tp,lwlx,zsdx,sl,yhzh) values ('$tp','虚拟礼物','$zsdx',$sl,'$yhzh') ");
		
				$t=M();
				
				$b=$t->execute("insert into slwb (tp,lwlx,zsr,sl,yhzh) values ('$tp','虚拟礼物','$yhzh',$sl,'$zsdx') ");
				
				if($a && $b)
				{
					$p=M();
					$p->execute("update yhb set yhjb='$syjb' where yhzh='$yhzh'");
					$this->success("赠送成功","__APP__/Liwu",1);
				}
				else
				{
					$this->error("赠送失败","__APP__/Liwu",1);
				}
			}
			else 
			{
				$this->error("赠送失败,金币余额不足，请充值","__APP__/Chongzhi",1);
			}
		}
		else 
		{
			$this->error("无此用户,赠送失败","__APP__/Liwu",1);
		}
	
	}
	
	public function szslw()
	{
		$yhzh=$_SESSION["admin"];
	
		$tp=$_REQUEST["tp"];
	
		$sl=$_REQUEST["sl"];
	
		$zsdx=$_REQUEST["zsdx"];
	
		$lwjg=$_REQUEST["lwjg"];
	
		$q=M("yhb");
	
		$w=$q->where("yhzh='$yhzh'")->select();
	
		$yhjb=$w[0]["yhjb"];
	
		$zje=$lwjg*$sl;
	
		$syjb=$yhjb-$zje;
		
		$r=M("yhb");
		$aa=$r->where("yhzh='$zsdx'")->select();
		if($aa)
		{
			if($syjb>=0)
			{
				$m=M();
					
				$a=$m->execute("insert into sclw (tp,lwlx,zsdx,sl,yhzh) values ('$tp','真实礼物','$zsdx',$sl,'$yhzh') ");
		
				$t=M();
					
				$b=$t->execute("insert into slwb (tp,lwlx,zsr,sl,yhzh) values ('$tp','真实礼物','$yhzh',$sl,'$zsdx') ");
					
				if($a && $b)
				{
					$p=M();
					$p->execute("update yhb set yhjb='$syjb' where yhzh='$yhzh'");
					$this->success("赠送成功","__APP__/Liwu",1);
				}
				else
				{
					$this->error("赠送失败","__APP__/Liwu",1);
				}
			}
			else
			{
				$this->error("赠送失败,金币余额不足，请充值","__APP__/Chongzhi",1);
			}
		}
		else
		{
			$this->error("无此用户,赠送失败","__APP__/Liwu",1);
		}
	
	}
	public function sdlw()
	{
		$yhzh=$_SESSION["admin"];
		$p=I("p",1);
		
		$m=M("slwb");
		
		import ("ORG.Util.Page");
		
		$count=$m->where("yhzh='$yhzh'")->count();
		
		$page=new Page($count,5);
			
		$t="%first% %upPage% %downPage% %prePage%";
			
		$page->setConfig("theme",$t);
		
		$list=$m->where("yhzh='$yhzh'")->limit(($p-1)*5,5)->select();
		
		$pagestr=$page->show();
		
		$this->assign("list",$list);
		
		$this->assign("pagestr",$pagestr);
		
		$this->display();
	}
	
	public function sclw()
	{
		$yhzh=$_SESSION["admin"];
		$p=I("p",1);
		
		$m=M("sclw");
		
		import ("ORG.Util.Page");
		
		$count=$m->where("yhzh='$yhzh'")->count();
		
		$page=new Page($count,5);
			
		$t="%first% %upPage% %downPage% %prePage%";
			
		$page->setConfig("theme",$t);
		
		$list=$m->where("yhzh='$yhzh'")->limit(($p-1)*5,5)->select();
		
		$pagestr=$page->show();
		
		$this->assign("list",$list);
		
		$this->assign("pagestr",$pagestr);
		
		$this->display();
	}
}