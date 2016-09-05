<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
<link rel="stylesheet" type="text/css" href="__APP__/Public1/css/style.css">
<link rel="stylesheet" type="text/css" href="__APP__/Public1/css/reveal.css">
<script type="text/javascript" src="__APP__/Public1/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="__APP__/Public1/js/jquery.reveal.js"></script>

<title>Roselove</title>
</head>

<body>
<div class="top">
	<div class="top_1">
    	<a href="__APP__"><img src="__APP__/Public1/images/roselove.png"></a>
        <ul class="nav">
        	<li><a href="__APP__"><?php echo (L("SHOUYE")); ?></a></li>
            <li><a href="__APP__/Kongjian" target="kuangjia"><?php echo (L("KONGJIAN")); ?></a></li>
            <li><a href="__APP__/Pengyou" target="kuangjia"><?php echo (L("PENGYOUQUAN")); ?></a></li>
            <li><a href="__APP__/Shengji" target="kuangjia"><?php echo (L("SHENGJI")); ?></a></li>
            <li><a href="__APP__/Chongzhi" target="kuangjia"><?php echo (L("CHONGZHI")); ?></a></li>
            <li><a href="__APP__/Liwu" target="kuangjia"><?php echo (L("LIWU")); ?></a></li>
        </ul>
        <ul class="nav_2">
        	<li><a href="?l=zh-cn">中文</a></li>
            <li style="margin:0 5px;">|</li>
            <li><a href="?l=zh-tw">繁体</a></li>
            <li style="margin:0 5px;">|</li>
            <li><a href="?l=en-us">English</a></li>
        </ul>
        <div class="xinxi" style="float:right;margin-top:33px;margin-right:-100px;">       	
        		<div class="rushou" style="margin-top:27px;"><img src="__APP__/Public1/images/set_img.png"></div>
            <ul>  
            	<p></p>
                <li><a href="__APP__/Ziliao" target="kuangjia"><img src="__APP__/Public1/images/user_ico.gif"><?php echo (L("YONGHUXINXI")); ?></a></li>
                <li><a href="__APP__/Touxiang" target="kuangjia"><img src="__APP__/Public1/images/user_info.gif"><?php echo (L("TOUXIANGSHEZHI")); ?></a></li>
                <li><a href="__APP__/Xiugaimima" target="kuangjia"><img src="__APP__/Public1/images/user_pw_change.gif"><?php echo (L("XIUGAIMIMA")); ?></a></li>
                <li class="juzhong"><a href="__APP__/Login/tuichu"><?php echo (L("TUICHU")); ?></a></li>
            </ul>
        </div>
    </div>
</div>

<div class="tt"><img src="__APP__/Public1/images/20150530071714175050.jpg"></div>
<div class="hyzy">	
	<ul>
    	<li><a href="__APP__/Haoyouzhuye/hykj/yhid/<?php echo ($list[0]['yhid']); ?>" target="kuangjia"><?php echo (L("GERENZHUYE")); ?></a></li>
        <li><a href="__APP__/Haoyouzhuye/hyzl/yhid/<?php echo ($list[0]['yhid']); ?>" target="kuangjia"><?php echo (L("ZILIAO")); ?></a></li>
        <li><a href="__APP__/Haoyouzhuye/hyrz/yhid/<?php echo ($list[0]['yhid']); ?>" target="kuangjia"><?php echo (L("RIZHI")); ?></a></li>
        <li><a href="__APP__/Haoyouzhuye/hyxc1/yhid/<?php echo ($yhid); ?>" target="kuangjia"><?php echo (L("XIANGCE")); ?></a></li>
        <li style="width:95px;"><a href="__APP__/Haoyouzhuye/hyly/yhid/<?php echo ($yhid); ?>" target="kuangjia"><?php echo (L("LIUYANBAN")); ?></a></li>
    </ul>
</div>
<div class="center" id="top1">
	<div class="center_left" id="top2">
    	<div class="center_tx">
        	<img src="__APP__/Public1/images/<?php echo ($list[0]['yhtx']); ?>">
            <a href="#"><?php echo ($list[0]["yhzh"]); ?></a>
            <div class="center_1"><img src="__APP__/Public1/images/xingbie.gif"><?php echo ($list[0]['yhxb']); ?></div>
        </div>
        <ul>
        	<li><a href="__APP__/Haoyouzhuye/addhy/yhid/<?php echo ($list[0]['yhid']); ?>" target="kuangjia"><img src="__APP__/Public1/images/add.gif"><?php echo (L("JIAWEIHAOYOU")); ?></a></li>
            <li><a href="__APP__/Haoyouzhuye/hyyj/yhzh/<?php echo ($list[0]['yhzh']); ?>" target="kuangjia"><img src="__APP__/Public1/images/mail.gif"><?php echo (L("GEITAFAXIN")); ?></a></li>
            <li><a href="__APP__/Haoyouzhuye/czzx/yhzh/<?php echo ($list[0]['yhzh']); ?>" target="kuangjia"><img src="__APP__/Public1/images/chong.gif"><?php echo (L("CHONGZHIGEITA")); ?></a></li>
            <li><a href="#" target="kuangjia" class="big-link" data-reveal-id="myModal"><img src="__APP__/Public1/images/hi_img.jpg"><?php echo (L("DAZHAOHU")); ?></a></li>
            <li><a href="__APP__/Haoyouzhuye/gtsj/yhzh/<?php echo ($list[0]['yhzh']); ?>" target="kuangjia"><img src="__APP__/Public1/images/n_left_shengji.jpg"><?php echo (L("GEITASHENGJI")); ?></a></li>
            <li><a href="__APP__/Haoyouzhuye/xnlw/yhzh/<?php echo ($list[0]['yhzh']); ?>" target="kuangjia"><img src="__APP__/Public1/images/ico_hy_gift.jpg"><?php echo (L("SONGLIGEITA")); ?></a></li>
        </ul>
    </div>
    <div class="center_center" id="top3">
		<iframe name="kuangjia" src="__APP__/Haoyouzhuye/hykj/yhid/<?php echo ($list[0]['yhid']); ?>" style="width:640px;min-height:770px;" id="iframepage" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" onLoad="iFrameHeight()">
		
		</iframe>
 
    </div>
    <div class="center_right" id="top4">
    	<p class="ke"><?php echo (L("KEFU")); ?></p>
        <div class="kefu">
        	<a href="#"><img src="__APP__/Public1/images/avatar.png" class="kefu_1"></a>
            			<a href="#"><p><?php echo (L("KEFU")); ?></p></a>
                        <a href="#" class="big-link" data-reveal-id="myModal"><img src="__APP__/Public1/images/hi_img.jpg" class="Hi"></a>
            			<a href="#"><img src="__APP__/Public1/images/addfriends.gif"></a>
        </div>
        <p class="ke"><?php echo (L("TUIJIAN")); ?></p>
        
        
        <?php if(is_array($aa)): $i = 0; $__LIST__ = $aa;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$b): $mod = ($i % 2 );++$i;?><div class="kefu">
        	<a href="__APP__/Haoyouzhuye/index/yhid/<?php echo ($b["yhid"]); ?>"><img src="__APP__/Public1/images/<?php echo ($b["yhtx"]); ?>" class="kefu_1"></a>
            			<a href="__APP__/Haoyouzhuye/index/yhid/<?php echo ($b["yhid"]); ?>"><p><?php echo ($b["yhzh"]); ?></p></a>
                        <a href="#" class="big-link" data-reveal-id="myModal"><img src="__APP__/Public1/images/hi_img.jpg" class="Hi"></a>
            			<a href="__APP__/Haoyouzhuye/addhy1/yhid/<?php echo ($b["yhid"]); ?>"><img src="__APP__/Public1/images/addfriends.gif"></a>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
       
        
       
    </div>   
</div>
<div class="bottom">
	<div class="bottom_1">
    	<ul>
        	<li><a href="?l=zh-cn">中文</a></li>
            <li style="margin:0 5px;">|</li>
            <li><a href="?l=zh-tw">繁体</a></li>
            <li style="margin:0 5px;">|</li>
            <li><a href="?l=en-us">English</a></li>
            <li class="yx">hiusdjkhfguw@163.com</li>
        </ul>
        <ul class="bottom_2">
        	<li><a href="#"><?php echo (L("GUANYUWOMEN")); ?></a></li>
            <li style="margin:0 5px;">|</li>
            <li><a href="#"><?php echo (L("LIANXIWOMEN")); ?></a></li>
            <li style="margin:0 5px;">|</li>
            <li><a href="#"><?php echo (L("BANGZHUZHONGXIN")); ?></a></li>
        </ul>
    </div>
</div>
            <div id="myModal" class="reveal-modal">
			<h1><?php echo (L("DAZHAOHU")); ?></h1>
            <form id="form" method="post" action="__APP__/Haoyouzhuye/dzh" enctype="multipart/form-data">
            <input type="hidden" name="yhzh" value="<?php echo ($list[0]['yhzh']); ?>"/>
			<ul>
            	<li><input type='radio' checked='checked' name='d' value="pokeact_0.gif"/><img src="__APP__/Public1/images/pokeact_0.gif"></li>
                <li><input type='radio' name='d' value="pokeact_1.gif"/><img src="__APP__/Public1/images/pokeact_1.gif"></li>
                <li><input type='radio' name='d' value="pokeact_2.gif"/><img src="__APP__/Public1/images/pokeact_2.gif"></li>
                <li><input type='radio' name='d' value="pokeact_3.gif"/><img src="__APP__/Public1/images/pokeact_3.gif"></li>
                <li><input type='radio' name='d' value="pokeact_4.gif"/><img src="__APP__/Public1/images/pokeact_4.gif"></li>
                <li><input type='radio' name='d' value="pokeact_5.gif"/><img src="__APP__/Public1/images/pokeact_5.gif"></li>
                <li><input type='radio' name='d' value="pokeact_6.gif"/><img src="__APP__/Public1/images/pokeact_6.gif"></li>
                <li><input type='radio' name='d' value="pokeact_7.gif"/><img src="__APP__/Public1/images/pokeact_7.gif"></li>
                <li><input type='radio' name='d' value="pokeact_8.gif"/><img src="__APP__/Public1/images/pokeact_8.gif"></li>
                <li><input type='radio' name='d' value="pokeact_9.gif"/><img src="__APP__/Public1/images/pokeact_9.gif"></li>
                <li><input type='radio' name='d' value="pokeact_10.gif"/><img src="__APP__/Public1/images/pokeact_10.gif"></li>
                <li><input type='radio' name='d' value="pokeact_11.gif"/><img src="__APP__/Public1/images/pokeact_11.gif"></li>
            </ul>
            <div class="dazhaohu"><input type="submit" name="" value="<?php echo (L("DAZHAOHU")); ?>"></div>
            </form>
			</div>         
</body>
<script>
$(".xinxi>ul").hide();//要隐藏的id
$(".xinxi").mouseenter(//要移入的地方
	function(){
		$(".xinxi>ul").stop(true,true).fadeIn()//显示隐藏的id
		//$(".box img").show();
	}
).mouseleave(
	function(){
		$(".xinxi>ul").stop(true,true).fadeOut()//显示隐藏的id
		//$(".box img").hide();
	}
)
</script>
</html>