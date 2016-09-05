<?php
class ShengjiAction extends CommAction
{
	public function index()
	{
		$yhzh=$_SESSION["admin"];
		$m=M("yhb");
		$list=$m->where("yhzh='$yhzh'")->select();
		$this->assign("list",$list);
		
		$q=M("pengyou");
		$a=$q->where("yhzh='$yhzh'")->select();
		$this->assign("a",$a);
		
		$this->assign("yhzh",$yhzh);
		$this->display();
	}
	
	public function blhy()
	{
		$yhzh=$_SESSION["admin"];
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
			if($a[0]["yhhy"])
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
						$this->success("办理成功","__APP__/Shouye",1);
					}
					else
					{
						$this->error("办理失败","__APP__/Shouye",1);
					}
				}
				else
				{
					$this->error("办理失败，金币不足，请充值","__APP__/Chongzhi",1);
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
						$this->success("办理成功","__APP__/Shouye",1);
					}
					else
					{
						$this->error("办理失败","__APP__/Shouye",1);
					}
				}
				else 
				{
						$this->error("办理失败，金币不足，请充值","__APP__/Chongzhi",1);
				}
			}
		}
		else 		//充给朋友
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
						$this->success("办理成功","__APP__/Shouye",1);
					}
					else
					{
						$this->error("办理失败","__APP__/Shouye",1);
					}
				}
				else
				{
					$this->error("办理失败，金币不足，请充值","__APP__/Chongzhi",1);
				}
			}
			else 		//不是会员
			{

				if($syje>=0)
				{
					$f=M();
					$x=$f->execute("update yhb set yhhy=1,dqsj='$dqsj',kssj='$kssj' where yhzh='$pyzh'");
					if($x)
					{
						$f->execute("update yhb set yhjb='$syje' where yhzh='$yhzh'");
						$this->success("办理成功","__APP__/Shouye",1);
					}
					else
					{
						$this->error("办理失败","__APP__/Shouye",1);
					}
				}
				else
				{
					$this->error("办理失败，金币不足，请充值","__APP__/Chongzhi",1);
				}
			}
			
		}
	}
	
}