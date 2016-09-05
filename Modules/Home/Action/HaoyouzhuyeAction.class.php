<?php
class HaoyouzhuyeAction extends CommAction
{
	public function index()
	{
		$yhzh=$_SESSION["admin"];
		$yhid=$_REQUEST["yhid"];
		
		$_SESSION["yhid"]=$yhid;
		$m=M("yhb");
		$list=$m->where("yhid='$yhid'")->select();
		if(!$list)
		{
			$this->error("没有此用户","__APP__/Index",1);
		}	
		else
		{
			$this->assign("list",$list);
		

			$this->assign("yhid",$yhid);
			
			$q=M();
			$aa=$q->query("select * from yhb where yhzh <> '$yhzh' limit 0,5");
			$this->assign("aa",$aa);
			$this->display();
		}
		
		
	}
	public function hykj()
	{
		$yhid=$_REQUEST["yhid"];
		$m=M("yhb");
		$list=$m->where("yhid='$yhid'")->select();
		$yhzh=$list[0]["yhzh"];
		
		//相册详情
		$q=M();
		$a=$q->query("select * from xcxq where yhzh='$yhzh'  order by scsj desc limit 0,4 ");
		$this->assign("a",$a);
		$this->assign("yhid",$yhid);
		
		
		//日志
		$b=M();
		$c=$b->query("select * from rizhi where yhzh='$yhzh' and rzqx <> '自己可见'  order by scsj desc limit 0,1 ");
		$this->assign("c",$c);
		
		//留言
		$d=M();
		$e=$d->query("select * from liuyan where yhzh='$yhzh' order by lysj desc limit 0,1 ");
		$this->assign("e",$e);
		
		$this->display();
	}
	public function hyxc()
	{
		//读取相片id
			$id=$_REQUEST["id"];
			$q=M();
			$a=$q->query("select * from xcxq where id='$id'");
			$yhzh=$a[0]["yhzh"];
			
			
			
			
			
			
			//读取单张相片
			$m=M();
			$list=$m->query("select * from xcxq where id='$id'");
			$this->assign("list",$list);
			
			$s=$id-1;
			$w=M();
			$pp=$w->query("select * from xcxq where id='$s'");
			$szh=$pp[0]["yhzh"];
			
			$x=$id+1;
			$e=M();
			$pp=$e->query("select * from xcxq where id='$x'");
			$xzh=$pp[0]["yhzh"];
			
			
			if($szh==$yhzh)
			{
				$s=$id-1;
			}
			else 
			{
				$s=$id;
			}
			if($xzh==$yhzh)
			{
				$x=$id+1;
			}
			else
			{
				$x=$id;
			}
			
			$this->assign("s",$s);
			$this->assign("x",$x);
			

			$f=M("yhb");
			$aa=$f->where("yhzh='$yhzh'")->select();
			$yhid=$aa[0]["yhid"];
			$this->assign("yhid",$yhid);
			$this->display();
	}
	
	public function hyxc1()
	{
		$yhid=$_REQUEST["yhid"];
		$m=M("yhb");
		$a=$m->where("yhid='$yhid'")->select();
		$a=$a[0]["yhzh"];	//朋友帐号
		
		$this->assign("a",$a);
		
		$m=M();
		$list=$m->query("select * from xiangce where yhzh='$a' and kjx='好友可见'");
		foreach ($list as $key => $value) {
			$a=$m->query("select scsj  from xcxq where xcmc='".$value['xcmc']."' order by scsj desc ");
			$list[$key]['count']=mysql_affected_rows();
			$list[$key]['scsj']=$a[0]['scsj'];
		}
		$this->assign("list",$list);
		
		
		$this->display();
	}
	
	public function hyxc2()
	{
			$xcmc=$_REQUEST["xcmc"];
		
			$p=I("p",1);
			 
			$m=M("xcxq");
			 
			import ("ORG.Util.Page");
			 
			$count=$m->where("xcmc='$xcmc'")->count();
			 
			$page=new Page($count,12);
			
			$t="%first% %upPage% %downPage% %prePage%";
			
			$page->setConfig("theme",$t);
			 
			$list=$m->where("xcmc='$xcmc'")->limit(($p-1)*12,12)->select();
				
			$pagestr=$page->show();
			 
			$this->assign("list",$list);
			 
			$this->assign("pagestr",$pagestr);
			 
			$yhzh=$list[0]["yhzh"];
			$this->assign("yhzh",$yhzh);
 			$this->display();
	}
	
	public function hyrz()
	{
		$yhid=$_REQUEST["yhid"];
		$q=M();
		$a=$q->query("select * from yhb where yhid='$yhid'");
		$yhzh=$a[0]["yhzh"];
		$this->assign("yhzh",$yhzh);
			$p=I("p",1);
			 
			$m=M("rizhi");
			 
			import ("ORG.Util.Page");
			 
			$count=$m->where("yhzh='$yhzh' and rzqx <> '自己可见' ")->count();
			 
			$page=new Page($count,5);
			
			$t="%first% %upPage% %downPage% %prePage%";
			
			$page->setConfig("theme",$t);
			 
			$list=$m->where("yhzh='$yhzh' and rzqx <> '自己可见' ")->limit(($p-1)*5,5)->select();
				
			$pagestr=$page->show();
			 
			$this->assign("list",$list);
			 
			$this->assign("pagestr",$pagestr);
			
			 
 			$this->display();
	}
	public function rznr()
	{
		
		$id=$_REQUEST["id"];
		$m=M("rizhi");
		$list=$m->where("id='$id'")->select();
		$this->assign("list",$list);
		$this->display();
	}
	
	public function hyzl()
	{
		$yhid=$_REQUEST["yhid"];
		$m=M("yhb");
		$list=$m->where("yhid='$yhid'")->select();
		$this->assign("list",$list);
		$this->display();
	}
	
	public function hyly()
	{
		$yhid=$_REQUEST["yhid"];
		$q=M();
		$a=$q->query("select * from yhb where yhid='$yhid'");
		$yhzh=$a[0]["yhzh"];
		$this->assign("yhzh",$yhzh);
		
		$yhzh1=$_SESSION["admin"];
		$this->assign("yhzh1",$yhzh1);
		
		
		
		
		
		$p=I("p",1);
		
		$m=M("liuyan");
		
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
	
	public function lyjs()
	{
		
		
		$lynr=$_REQUEST["lynr"];
		$yhzh=$_REQUEST["yhzh"];
		$lyzh=$_REQUEST["lyzh"];
		
		$q=M("yhb");
		$aa=$q->where("yhzh='$yhzh'")->select();
		$yhid=$aa[0]["yhid"];
		
		$m=M();
		$a=$m->execute("insert into liuyan (yhzh,lyzh,lynr) values ('$yhzh','$lyzh','$lynr') ");
		if($a)
		{
			$this->success("留言成功","__APP__/Haoyouzhuye/hyly/yhid/$yhid",1);
		}
		else 
		{
			$this->error("留言失败","__APP__/Haoyouzhuye/hyly/yhid/$yhid",1);
		}
	}
	
	public function lynr()
	{
		$id=$_REQUEST["id"];
		$m=M("liuyan");
		$list=$m->where("id='$id'")->select();
		$this->assign("list",$list);
		$this->display();
	}
	
public function addhy()
	{
		$pyid=$_REQUEST["yhid"];
		$yhzh=$_SESSION["admin"];
		$m=M("yhb");
		$list=$m->where("yhid='$pyid'")->select();
		$pyzh=$list[0]['yhzh'];
		
		$q=M();
		$a=$q->query("select * from pengyou where yhzh='$yhzh' and pyzh='$pyzh'");
		if($a)
		{
			$this->error("请不要重复添加","__APP__/Haoyouzhuye/hykj/yhid/$pyid",1);
		}
		else 
		{
			if($yhzh==$pyzh)
			{
				$this->error("添加失败,不能添加自己为好友","__APP__/Haoyouzhuye/hykj/yhid/$pyid",1);
			}
			else
			{
				$s=M();
				$e=$s->execute("insert into pengyou (yhzh,pyzh) values ('$yhzh','$pyzh') ");
				$r=M();
				$c=$r->execute("insert into pengyou (yhzh,pyzh) values ('$pyzh','$yhzh')" );
				if($e && $c)
				{
					$this->success("添加成功","__APP__/Haoyouzhuye/hykj/yhid/$pyid",1);
				}
			}
		}
		
	}
	
	public function addhy1()
	{
		$pyid=$_REQUEST["yhid"];
		$yhzh=$_SESSION["admin"];
		$m=M("yhb");
		$list=$m->where("yhid='$pyid'")->select();
		$pyzh=$list[0]['yhzh'];
	
		$q=M();
		$a=$q->query("select * from pengyou where yhzh='$yhzh' and pyzh='$pyzh'");
		if($a)
		{
			$this->error("请不要重复添加","__APP__/Haoyouzhuye/index/yhid/$pyid",1);
		}
		else
		{
			if($yhzh==$pyzh)
			{
				$this->error("添加失败,不能添加自己为好友","__APP__/Haoyouzhuye/index/yhid/$pyid",1);
			}
			else
			{
				$s=M();
				$e=$s->execute("insert into pengyou (yhzh,pyzh) values ('$yhzh','$pyzh') ");
				$r=M();
				$c=$r->execute("insert into pengyou (yhzh,pyzh) values ('$pyzh','$yhzh')" );
				if($e && $c)
				{
					$this->success("添加成功","__APP__/Haoyouzhuye/index/yhid/$pyid",1);
				}
			}
		}
	
	}
	
	public function hyyj()
	{
		$fjzh=$_SESSION["admin"];
		$sjzh=$_REQUEST["yhzh"];
		$this->assign("sjzh",$sjzh);
		$this->assign("fjzh",$fjzh);
		$this->display();
	}
	
	public function fyj()
	{
		$fjzh=$_REQUEST["fjzh"];	//用户帐号
		
		$sjzh=$_REQUEST["sjzh"];	//朋友帐号
		
		$e=M("yhb");
		
		$f=$e->where("yhzh='$sjzh'")->select();		//用户表中的用户

		
		$yhid=$f[0]["yhid"];		//用户表中的朋友id
		
		$nr=$_REQUEST["nr"];
		$m=M();
		$a=$m->execute("insert into fajian (yhzh,sjzh,nr) values ('$fjzh','$sjzh','$nr') ");
		$w=M();
		$b=$w->execute("insert into shoujian (yhzh,fjzh,nr) values ('$sjzh','$fjzh','$nr') ");
		if($a && $b)
		{
			$this->success("发送成功","__APP__/Haoyouzhuye/hykj/yhid/$yhid",1);
		}
		else 
		{
			$this->error("发送失败","__APP__/Haoyouzhuye/hykj/yhid/$yhid",1);
		}
	}
	
	public function czzx()
	{
		$yhzh=$_SESSION["admin"];
		$m=M("yhb");
		$list=$m->where("yhzh='$yhzh'")->select();
		$this->assign("list",$list);
		
		$q=M("pengyou");
		$a=$q->where("yhzh='$yhzh'")->select();
		$this->assign("yhzh",$yhzh);
		$this->assign("a",$a);
		$this->display();
	}
	
	public function gtsj()
	{
		$yhzh=$_SESSION["admin"];
		$m=M("yhb");
		$list=$m->where("yhzh='$yhzh'")->select();
		$this->assign("list",$list);
		
		$q=M("pengyou");
		$a=$q->where("yhzh='$yhzh'")->select();
		$this->assign("a",$a);
		$this->assign("yhzh",$yhzh);
		
		$pyzh=$_REQUEST["yhzh"];
		$this->assign("pyzh",$pyzh);
		$this->display();
	}
	
	public function xnlw()
	{
		$yhzh=$_REQUEST["yhzh"];
		
		$q=M('yhb');
		$a=$q->where("yhzh='$yhzh'")->select();
		$yhid=$a[0]["yhid"];
		$this->assign("yhid",$yhid);
		
		
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
	public function xnlwxq()
	{
		$yhzh=$_REQUEST["yhzh"];
		
		$q=M('yhb');
		$a=$q->where("yhzh='$yhzh'")->select();
		$yhid=$a[0]["yhid"];
		$this->assign("yhid",$yhid);
		
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
		$yhid=$_REQUEST["yhid"];
		$this->assign("yhid",$yhid);
		
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
	
	public function dzh()
	{
		$dfzh=$_SESSION["admin"];
		$yhzh=$_REQUEST["yhzh"];
		$q=M("yhb");
		$aa=$q->where("yhzh='$yhzh'")->select();
		$yhid=$aa[0]["yhid"];
		
		
		$nr=$_REQUEST["d"];
		$m=M();
		$a=$m->execute("insert into dzh (dfzh,yhzh,nr) values ('$dfzh','$yhzh','$nr') ");
		if($a)
		{
			$this->success("发送成功","__APP__/Haoyouzhuye/index/yhid/$yhid",1);
		}
		else 
		{
			$this->error("发送失败","__APP__/Haoyouzhuye/index/yhid/$yhid",1);
		}
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
		
		$e=M("yhb");
		
		$d=$e->where("yhzh='$zsdx'")->select();
		$yhid=$d[0]["yhid"];
		
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
					$this->success("赠送成功","__APP__/Haoyouzhuye/hykj/yhid/$yhid",1);
				}
				else
				{
					$this->error("赠送失败","__APP__/Haoyouzhuye/hykj/yhid/$yhid",1);
				}
			}
			else 
			{
				$this->error("赠送失败,金币余额不足，请充值","__APP__/Haoyouzhuye/hykj/yhid/$yhid",1);
			}
		}
		else
		{
			$this->error("无此用户,赠送失败","__APP__/Haoyouzhuye/hykj/yhid/$yhid",1);
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
	
		$e=M("yhb");
		
		$d=$e->where("yhzh='$zsdx'")->select();
		$yhid=$d[0]["yhid"];
		
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
					$this->success("赠送成功","__APP__/Haoyouzhuye/hykj/yhid/$yhid",1);
				}
				else
				{
					$this->error("赠送失败","__APP__/Haoyouzhuye/hykj/yhid/$yhid",1);
				}
			}
			else 
			{
				$this->error("赠送失败,金币余额不足，请充值","__APP__/Haoyouzhuye/hykj/yhid/$yhid",1);
			}
		}
		else
		{
			$this->error("无此用户,赠送失败","__APP__/Haoyouzhuye/hykj/yhid/$yhid",1);
		}
	}
	
	public function blhy()
	{
		$hyzh=$_REQUEST["hyzh"];
		
		$yhzh=$_SESSION["admin"];
		
		$t=M("yhb");
		$h=$t->where("yhzh='$yhzh'")->select();
		$yhid=$h[0]["yhid"];
		
		
		
		$m=M("yhb");
		$a=$m->where("yhzh='$yhzh'")->select();
		$yhjb=$a[0]["yhjb"];			//用户剩余金币数量
	
		$lx=$_REQUEST["c"];
		$q=M("hyjg");
		$b=$q->where("lx='$lx'")->select();
		$je=$b[0]["je"];				//办理会员金额
		$ts=$b[0]["ts"];				//天数
	
		$syje=$yhjb-$je;					//办理后剩余金币数量
	
		$kssj=date("Y-m-d");			//成功后的开始时间
	
		$dqsj=date("Y-m-d",strtotime("+".$ts." day",strtotime($kssj)));		//会员结束时间
	
	
		$cg=$_REQUEST["w"];
		if($cg=='zj')
		{
			if($a[0]["yhhy"]) 	//是会员 充给自己
			{
				if($syje>=0)
				{
					$t=M("yhb");
					$qq=$t->where("yhzh='$yhzh'")->select();
					$yhdqsj=$qq[0]["dqsj"];
					$xfsj=date("Y-m-d",strtotime("+".$ts." day",strtotime($yhdqsj)));
					$w=M();
					$r=$w->execute("update yhb set yhhy=1,dqsj='$xfsj' where yhzh='$yhzh'");
					if($r)
					{
						$w->execute("update yhb set yhjb='$syje' where yhzh='$yhzh'");
						$this->success("办理成功","__APP__/Haoyouzhuye/hykj/yhid/$yhid",1);
					}
					else
					{
						$this->error("办理失败","__APP__/Haoyouzhuye/hykj/yhid/$yhid",1);
					}
				}
				else
				{
					$this->error("办理失败，金币不足，请充值","__APP__/Haoyouzhuye/hykj/yhid/$yhid",1);
				}
			}
			else
			{
				//不是会员
				if($syje>=0)
				{
					$w=M();
					$r=$w->execute("update yhb set yhhy=1,dqsj='$dqsj',kssj='$kssj' where yhzh='$yhzh'");
					if($r)
					{
						$w->execute("update yhb set yhjb='$syje' where yhzh='$yhzh'");
						$this->success("办理成功","__APP__/Haoyouzhuye/hykj/yhid/$yhid",1);
					}
					else
					{
						$this->error("办理失败","__APP__/Haoyouzhuye/hykj/yhid/$yhid",1);
					}
				}
				else
				{
					$this->error("办理失败，金币不足，请充值","__APP__/Haoyouzhuye/hykj/yhid/$yhid",1);
				}
			}
			
			
		}
		else 			//充给朋友
		{
			$pyzh=$_REQUEST["pyzh"];
			$y=M("yhb");
			$d=$y->where("yhzh='$pyzh'")->select();
			$pyhy=$d[0]["yhhy"];
			
			if($pyhy) 	//是会员
			{
				if($syje>=0)
				{
					$t=M("yhb");
					$qq=$t->where("yhzh='$pyzh'")->select();
					$yhdqsj=$qq[0]["dqsj"];
					$xfsj=date("Y-m-d",strtotime("+".$ts." day",strtotime($yhdqsj)));
					$w=M();
					$r=$w->execute("update yhb set yhhy=1,dqsj='$xfsj' where yhzh='$pyzh'");
					if($r)
					{
						$w->execute("update yhb set yhjb='$syje' where yhzh='$yhzh'");
						$this->success("办理成功","__APP__/Haoyouzhuye/hykj/yhid/$yhid",1);
					}
					else
					{
						$this->error("办理失败","__APP__/Haoyouzhuye/hykj/yhid/$yhid",1);
					}
				}
				else
				{
					$this->error("办理失败，金币不足，请充值","__APP__/Haoyouzhuye/hykj/yhid/$yhid",1);
				}
			}
			else  		//不是会员
			{
				if($syje>=0)
				{
					$pyzh=$_REQUEST["pyzh"];
					$f=M();
					$x=$f->execute("update yhb set yhhy=1,dqsj='$dqsj',kssj='$kssj' where yhzh='$pyzh'");
					if($x)
					{
						$f->execute("update yhb set yhjb='$syje' where yhzh='$yhzh'");
						$this->success("办理成功","__APP__/Haoyouzhuye/hykj/yhid/$yhid",1);
					}
					else
					{
						$this->error("办理失败","__APP__/Haoyouzhuye/hykj/yhid/$yhid",1);
					}
				}
				else
				{
					$this->error("办理失败，金币不足，请充值","__APP__/Haoyouzhuye/hykj/yhid/$yhid",1);
				}
			}
			
		}
	}
}