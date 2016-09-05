<?php
class XiangceAction extends CommAction
{
	//相册主页
	
public function index()
	{
		$yhzh=$_SESSION["admin"];
		$m=M();
		$list=$m->query("select * from xiangce where yhzh='$yhzh'");
		foreach ($list as $key => $value) {
			$a=$m->query("select scsj  from xcxq where xcmc='".$value['xcmc']."' order by scsj desc ");
			$list[$key]['count']=mysql_affected_rows();
			$list[$key]['scsj']=$a[0]['scsj'];
		}
		$this->assign("list",$list);
		
		$this->display();
	}
	//跳转新建相册
	public function xinjian()
	{
		$this->display();
	}
	//跳转新加
	public function tianjia()
	{
		$yhzh=$_SESSION["admin"];
		$xcmc=$_REQUEST["xcmc"];
		$xcms=$_REQUEST["xcms"];
		$xcbq=$_REQUEST["xcbq"];
		$kjx=$_REQUEST["kjx"];
		$tp=$this->upload();
		if($tp)
		{
			$xcfm=$tp;
		}
		$m=M();
		$a=$m->execute("insert into xiangce (yhzh,xcmc,xcms,xcbq,kjx,xcfm) values ('$yhzh','$xcmc','$xcms','$xcbq','$kjx','$xcfm') ");
		if($a)
		{
			$this->success("添加成功","__APP__/Xiangce",1);
		}
		else 
		{
			$this->error("添加失败","__APP__/Xiangce",1);
		}
	}
	
	
	
	
	
	
	
	
	
	
	//跳转照片
	public function zhaopian($id)
	{
		$yhzh=$_SESSION["admin"];
		$id=$_REQUEST["id"];
		$q=M();
		$aa=$q->query("select * from xiangce where id='$id'");
		$xcmc=$aa[0]["xcmc"];
		$this->assign("aa",$aa);
		
		
		
		
		
		
		
		$p=I("p",1);
		
		$m=M("xcxq");
		
		import ("ORG.Util.Page");
		
		$count=$m->where("xcmc='$xcmc'")->count();
		
		$page=new Page($count,8);
			
		$t="%first% %upPage% %downPage% %prePage%";
			
		$page->setConfig("theme",$t);
		
		$list=$m->where("xcmc='$xcmc'")->limit(($p-1)*8,8)->select();
		
		$pagestr=$page->show();
		
		$this->assign("list",$list);
		
		$this->assign("pagestr",$pagestr);
		
		$this->display();
		
		
	}
	//跳转上传
	public function shangchuan()
	{
		$xcmc=$_REQUEST["xcmc"];
		$this->assign("xcmc",$xcmc);
		//var_dump($xcmc);
		$this->display();
	}
	//照片上传跳转
	public function shangchuanadd()
	{
		$yhzh=$_SESSION["admin"];
		$xcmc=$_REQUEST["xcmc"];
		$tp=$this->upload();
		if($tp)
		{
			$xctp=$tp;
		}
		$m=M();
		$a=$m->execute("insert into xcxq (yhzh,xcmc,xctp) values ('$yhzh','$xcmc','$xctp') ");
		if($a)
		{
			$this->success("上传成功","__APP__/Xiangce",1);
		}
		else 
		{
			$this->error("上传失败","__APP__/Xiangce",1);
		}
	}
	public function zhaopian1()
	{
		$id=$_REQUEST["id"];
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
		
		
		$yhzh=$list[0]["yhzh"];
		
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
		
		
		
		$this->assign("yhzh",$yhzh);
		$this->assign("id",$id);
		$this->display();
	}
	
	public function scxc()
	{
		$xcmc=$_REQUEST["xcmc"];
		$m=M();
		$a=$m->execute("delete from xiangce where xcmc='$xcmc'");
		$q=M();
		$b=$q->execute("delete from xcxq where xcmc='$xcmc'");
		if($a && $b)
		{
			$this->success("删除成功","__APP__/Xiangce",1);
		}
		else 
		{
			$this->error("删除失败","__APP__/Xiangce",1);
		}
	}
	
	public function sczp()
	{
		$id=$_REQUEST["id"];
		$m=M();
		$a=$m->execute("delete from xcxq where id='$id'");
		if($a)
		{
			$this->success("删除成功","__APP__/Xiangce",1);
		}
		else
		{
			$this->error("删除失败","__APP__/Xiangce",1);
		}
	}
}