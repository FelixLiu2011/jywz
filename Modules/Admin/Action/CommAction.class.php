<?php

class CommAction extends Action
{
	//初始化方法:
		//_initialize 初始化方法:相当于类的构造函数
	//它会在所有类中的方法执行前执行
	public function _initialize() 
	{
		//echo $this->getActionName();//得到模块名称
		//只判断不是登录模块，是否有session
		if($this->getActionName()!="Index")
		{
			if(empty($_SESSION["admin"]))
			{
				$this->redirect("/Admin");
				
			}
		}
	}
//文件上传
	 public function upload()
	 {
		import('ORG.Net.UploadFile');//引用文件上传类
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize = 3145728 ;// 设置附件上传大小
		$upload->allowExts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath = './Public/images/';// 设置附件上传目录
		if(!$upload->upload())
		{// 上传错误提示错误信息
			//$this->error($upload->getErrorMsg());
		}
		else
		{// 上传成功 获取上传文件信息
			$info = $upload->getUploadFileInfo();
			//echo  $info[0]["savename"];//得到上传的文件名称
			return  $info[0]["savename"];//得到上传的文件名称
		}
	}
	
}
?>