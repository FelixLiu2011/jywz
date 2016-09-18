<?php
class PengyouAction extends CommAction
{
public function index()
	{
		$yhzh=$_SESSION["admin"];
		
		$m=M();
		
		$a=$m->query("select pyzh from pengyou where yhzh='$yhzh'");
		//var_dump($a);
		
		
		foreach ($a as $key => $value) 
		{
			if($key == 0){
				$where .= "	yhzh='".$value['pyzh']."'";
			}else{
				$where .= " or yhzh='".$value['pyzh']."'";
			}
		}
// 		$b=$m->query("select * from yhb".$where);
// 		$this->assign("b",$b);
// 		$this->display();

		

		if($where)
		{
			$p=I("p",1);
				
			$w=M("yhb");
			
			$q1=$w->where("$where")->limit(($p-1)*12,12)->select();
			
			
			import ("ORG.Util.Page");
				
			$count=$w->where("$where")->count();
				
			$page=new Page($count,12);
			
			$t="%first% %upPage% %downPage% %prePage%";
			
			$page->setConfig("theme",$t);
				
				
			$pagestr=$page->show();
				
			$this->assign("q1",$q1);
			
			$this->assign("pagestr",$pagestr);
				
				
				
			$this->display();
		}
		else 
		{
			
			$q1="";
			$this->assign("q1",$q1);
			$this->display();
		}
		
 		
	}
	
	public function tianjia()
	{
		$this->display();
	}
	
	public function ss()
	{
		$pyzh=$_REQUEST["pyzh"];
		
		$m=M();
		$list=$m->query("select * from yhb where yhzh like '%$pyzh%' limit 0,12");
		$this->assign("list",$list);
		
		$this->display();
	}
	public function scpy()
	{
		$yhzh=$_SESSION["admin"];
		$pyid=$_REQUEST["yhid"];
		$qq=M("yhb");
		$qq1=$qq->where("yhid='$pyid'")->select();
		$pyzh=$qq1[0]["yhzh"];
		$m=M();
		$a=$m->execute("delete from pengyou where pyzh='$pyzh' and yhzh='$yhzh'");
		if($a)
		{
			$this->success("Delete success","__APP__/Home/Pengyou",1);
		}
		else
		{
			$this->error("Delete error","__APP__/Home/Pengyou",1);
		}
	}
}