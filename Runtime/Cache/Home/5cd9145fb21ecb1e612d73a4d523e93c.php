<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Roselove</title>
<link rel="stylesheet" type="text/css" href="__APP__/Public1/css/style.css">
<link rel="stylesheet" type="text/css" href="__APP__/Public1/css/reveal.css">
<link type="text/css" rel="stylesheet" href="__APP__/Public1/css/owl.carousel.css">
<link type="text/css" rel="stylesheet" href="__APP__/Public1/css/owl.theme.css">
<script src="__APP__/Public1/js/jquery-1.7.2.js"></script>
<script src="__APP__/Public1/js/scrollAd.js"></script>
<script type="text/javascript" src="__APP__/Public1/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="__APP__/Public1/js/owl.carousel.min.js"></script>
<script type="text/javascript">
$(function(){
	$('#scroll').owlCarousel({
		items: 4,
		autoPlay: true,
		navigation: true,
		navigationText: ["",""],
		scrollPerPage: true
	});
});
</script>
<script type="text/javascript">
//重新获取验证码
function aa()
{
	//取时间
	var date=new Date().getTime();

	document.getElementById("img").src="__APP__/Login/getImage/"+date;//不读的缓存图片，会重新生成图片
}
</script>


</head>

<body>
<div class="top">
	<div class="top_1">
    	<a href="index.html"><img src="__APP__/Public1/images/roselove.png"></a>
        <div class="zhuce">
            <form  action="__APP__/Login/denglu" method="post" name="form">
                <ul>
                    <li><span><?php echo (L("YONGHUMING")); ?>：</span><input type="text" name="yhzh" autocomplete="off"></li>
                    <li style="margin-left:10px;"><span><?php echo (L("MIMA")); ?>：</span><input type="password" name="yhmm"  autocomplete="off"></li>
                    <li><input type="submit" name="" value="<?php echo (L("DENGLU")); ?>" style="background:#42ABD9;height:22px;width:60px;color:#FFF;border:none;cursor:pointer;"></li>
                </ul>
            </form>
        </div>
        <ul class="nav_2">
        	<li><a href="?l=zh-cn">中文</a></li>
            <li style="margin:0 5px;">|</li>
            <li><a href="?l=zh-tw">繁体</a></li>
            <li style="margin:0 5px;">|</li>
            <li><a href="?l=en-us">English</a></li>
        </ul>
    </div>
</div>
		<div class="box">
            <ol></ol>
            <ul>
                <li><img src="__APP__/Public1/images/571.png"></li>
            </ul>
        </div>
            <div class="zhuce_zh">
            	<h2><?php echo (L("XINLAIDE")); ?>？  <?php echo (L("YIQIHIGH")); ?>......</h2>
            	<form action="__APP__/Login/login" method="post" name="form1">
                	<ul>
                    	<li><input type="text" name="yhzh" id="yhzh" autocomplete="off"><span><?php echo (L("YONGHUMING")); ?>:</span></li>
                        <li><input type="password" name="yhmm" id="yhmm" autocomplete="off"><span><?php echo (L("MIMA")); ?>:</span></li>
                        <li><input type="password" name="yhmm1" id="yhmm1" autocomplete="off"><span><?php echo (L("CHONGFUMIMA")); ?>:</span></li>
                        <li><input type="text" name="yhyx" id="yhyx" autocomplete="off"><span><?php echo (L("YOUXIANG")); ?>:</span></li>
                        <li>
                            <select  name="yhxb" style="float:right;margin-right:120px;background:#CCE8CF;height:25px;width:50px;">
                                <option selected = "selected"  value="男"><?php echo (L("NAN")); ?></option>
                                <option value="女"><?php echo (L("NV")); ?></option>
                            </select>
                            <span><?php echo (L("XINGBIE")); ?>:</span>
						</li>
                        <li>
                        <a href='javascript:aa()'>
                        <img src="__APP__/Login/getImage" id="img" width="80" height="30" title="看不清楚？点击切换"/>
                        </a>
                        <input type="text" name="code" style="width:70px;height:25px;">
                        <span><?php echo (L("YANZHENGMA")); ?>:</span>
                        
                        </li>
                        <li><input type="button" name="" onclick="validate()"  value="<?php echo (L("ZHUCE")); ?>" style="margin-left:55px;line-height:25px; cursor:pointer;"></li>
                    </ul>
                </form>
            </div>
            <div class="Members"><?php echo (L("HUIYUANTUIJIAN")); ?></div>
<div class="scroll-outer">
	<div id="scroll" class="owl-carousel">
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><div class="item">
				<a href="#"><img src="__APP__/Public1/images/<?php echo ($user["yhtx"]); ?>" alt=""></a>
	            <div class="clear"></div>
				<div class="txt">
					<h4><a href="#"><?php echo ($user["yhzh"]); ?></a></h4>
				</div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>    
	</div>
</div>
<div class="clear"></div>
<div class="bottom">
	<div class="bottom_1">
    	<ul>
        	<li><a href="?l=zh-cn">中文</a></li>
            <li style="margin:0 5px;">|</li>
            <li><a href="?l=zh-tw">繁体</a></li>
            <li style="margin:0 5px;">|</li>
            <li><a href="?l=en-us">English</a></li>
        </ul>
        <ul class="bottom_2">
        	<li><a href="__APP__/Index/gywm"><?php echo (L("GUANYUWOMEN")); ?></a></li>
            <li style="margin:0 5px;">|</li>
            <li><a href="__APP__/Index/lxwm"><?php echo (L("LIANXIWOMEN")); ?></a></li>
            <li style="margin:0 5px;">|</li>
            <li><a href="__APP__/Index/bzzx"><?php echo (L("BANGZHUZHONGXIN")); ?></a></li>
        </ul>
    </div>
</div>
<script type="text/javascript">
	function validate(){
		
		//alert(aaa.val());
		var username=$("#yhzh").val();
		var password=$("#yhmm").val();
		var email=$("#yhyx").val();
		var reg=/^[a-zA-Z]\w{5,17}$/;
		var reg2=/^[A-Za-z0-9]{5,17}$/;
		var reg3=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
		if(username.match(reg)){
			if(password.match(reg2)){
				if($("#yhmm").val()!=$("#yhmm1").val()){
					alert("俩次密码不一致");
				}else{
					if(email.match(reg3)){
						$('form').submit();
					}else{	
						alert("请输入正确的邮箱地址");
					}
				}
			}else{
				alert("密码由英文字母和数字组成,长度在6-18之间");
			}
		}else{
			alert('用户名必须以字母开头,长度在6-18之间');
		}
	}
</script>
</body>
</html>