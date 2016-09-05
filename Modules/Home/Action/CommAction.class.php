<?php

class CommAction extends Action
{
	public function _initialize()
	{
		//echo $this->getActionName();//得到模块名称
		//只判断不是登录模块，是否有session
		if($this->getActionName()!="Login")
		{
			if(empty($_SESSION["admin"]))
			{
				$this->redirect("__APP__/Home/Login/index");
	
			}
		}
	}
	public function verify()
	{
		//引入类
		import('ORG.Util.Image');
		//调用方法:得到验证码图片:向页面输出
		//Image::buildImageVerify();
		Image::buildImageVerify(4,1); //6表示验证码长度,5表示数字和字母混合. 1表示数字
	}
//文件上传
	 public function upload()
	 {
		import('ORG.Net.UploadFile');//引用文件上传类
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize = 3145728 ;// 设置附件上传大小
		$upload->allowExts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath = './Public1/images/';// 设置附件上传目录
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