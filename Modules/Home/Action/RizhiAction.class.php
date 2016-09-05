<?php
class RizhIAction extends CommAction
{
	public function index()
	{
			$yhzh=$_SESSION["admin"];
		
			$p=I("p",1);
			 
			$m=M("rizhi");
			 
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
	public function chuangjian()
	{
		$this->display();
	}
	public function rizhiadd()
	{
		$yhzh=$_SESSION["admin"];
		$rzbt=$_REQUEST["rzbt"];
		$rzbq=$_REQUEST["rzbq"];
		$rzqx=$_REQUEST["rzqx"];
		$rznr=$_REQUEST["rznr"];
		$m=M();
		$a=$m->execute("insert into rizhi (yhzh,rzbt,rzbq,rzqx,rznr) values ('$yhzh','$rzbt','$rzbq','$rzqx','$rznr') ");
		if($a)
		{
			$this->success("上传成功","__APP__/Rizhi",1);
		}
		else 
		{
			$this->error("上传失败","__APP__/Rizhi",1);
		}
	}
	public function nr($id)
	{
		$id=$_REQUEST["id"];
		$m=M();
		$list=$m->query("select * from rizhi where id='$id'");
		$this->assign("list",$list);
		
		$this->display();
	}
	public function sc($id)
	{
		$id=$_REQUEST["id"];
		$m=M();
		$a=$m->execute("delete from rizhi where id='$id'");
		if($a)
		{
			$this->success("删除成功","__APP__/Rizhi",1);
		}
		else
		{
			$this->error("删除失败","__APP__/Rizhi",1);
		}
	}
}