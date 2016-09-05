<?php
class DazhaohuAction extends CommAction
{
	public function index()
	{
		$yhzh=$_SESSION["admin"];
		
		$p=I("p",1);
		
		$m=M("dzh");
		
		import ("ORG.Util.Page");
		
		$count=$m->where("yhzh='$yhzh'")->count();
		
		$page=new Page($count,5);
			
		$t="%first% %upPage% %downPage% %prePage%";
			
		$page->setConfig("theme",$t);
		
		$list=$m->where("yhzh='$yhzh'")->order('sj desc')->limit(($p-1)*5,5)->select();
		
		
		$pagestr=$page->show();
		
		$this->assign("list",$list);
		
		$this->assign("pagestr",$pagestr);
		
		$this->display();
	}
	
	public function dzh()
	{
		$yhzh=$_SESSION["admin"];
		$dfzh=$_REQUEST["yhzh"];
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
}