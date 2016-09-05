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
    	<a href="__APP__"><img src="__APP__/Public1/images/roeslove.png"></a>
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
<div class="clear"></div>
<div class="center">
	<div class="center_left">
    	<div class="center_tx">
        	<div class="center_tx_tx"><a><img src="__APP__/Public1/images/<?php echo ($list[0]['yhtx']); ?>"></a></div>
            <a href="#"><?php echo (session('admin')); ?></a>&nbsp;<?php if($list[0]['yhhy'] == 1): ?><img src="__APP__/Public1/images/user_vip.jpg" style="width:16px; height:9px"/><?php else: endif; ?>
            <div class="center_1"><img src="__APP__/Public1/images/golds_img.jpg"><?php echo (L("JINBI")); ?>：<p><?php echo ($list[0]['yhjb']); ?></p></div>
        </div>
        <ul>
        	<li><a href="__APP__/Chongzhi" target="kuangjia"><img src="__APP__/Public1/images/golds_img.jpg"><?php echo (L("CHONGZHIZHONGXIN")); ?></a></li>
            <li><a href="__APP__/Shengji" target="kuangjia"><img src="__APP__/Public1/images/n_left_shengji.jpg"><?php echo (L("SHENGJIHUIYUAN")); ?></a></li>
            <li><a href="__APP__/Youjian" target="kuangjia"><img src="__APP__/Public1/images/mail.gif"><?php echo (L("YOUJIAN")); ?></a></li>
            <li><a href="__APP__/Liwu" target="kuangjia"><img src="__APP__/Public1/images/n_left_gift.jpg"><?php echo (L("LIWU")); ?></a></li>
            <li><a href="__APP__/Pengyou" target="kuangjia"><img src="__APP__/Public1/images/friends.gif"><?php echo (L("WODEPENGYOU")); ?></a></li>
            <li><a href="__APP__/Xiangce" target="kuangjia"><img src="__APP__/Public1/images/album.png"><?php echo (L("XIANGCE")); ?></a></li>
            <li><a href="__APP__/Rizhi" target="kuangjia"><img src="__APP__/Public1/images/n_left_rizhi.jpg"><?php echo (L("RIZHI")); ?></a></li>
            <li><a href="__APP__/Kongjian" target="kuangjia"><img src="__APP__/Public1/images/n_left_huodong.png"><?php echo (L("GERENZHUYE")); ?></a></li>
            <li><a href="__APP__/Liuyan" target="kuangjia"><img src="__APP__/Public1/images/n_left_toupiao.jpg"><?php echo (L("LIUYANBAN")); ?></a></li>
            <li><a href="__APP__/Ziliao" target="kuangjia"><img src="__APP__/Public1/images/lt.gif"><?php echo (L("ZILIAO")); ?></a></li>
            <li><a href="__APP__/Dazhaohu" target="kuangjia"><img src="__APP__/Public1/images/n_left_fenxiang.jpg"><?php echo (L("DAZHAOHU")); ?></a></li>
        </ul>
    </div>
    <div class="center_center">
    
    	<img src="__APP__/Public1/images/571.png">
		<iframe name="kuangjia" src="__APP__/Shouye" style="width:640px;min-height:770px; " id="iframepage" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" onLoad="iFrameHeight()"></iframe>
 
    </div>
    <div class="center_right">
    	<p class="ke"><?php echo (L("KEFU")); ?></p>
        <div class="kefu">
        	<a href="#"><img src="__APP__/Public1/images/avatar.png" class="kefu_1"></a>
            			<a href="haoyoudezhuye.html"><p><?php echo (L("KEFU")); ?></p></a>
            			<a href="#"><img src="__APP__/Public1/images/addfriends.gif"></a>
        </div>
        <p class="ke"><?php echo (L("TUIJIAN")); ?></p>
        
        <?php if(is_array($q1)): $i = 0; $__LIST__ = $q1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><div class="kefu">
        	<a href="__APP__/Haoyouzhuye/index/yhid/<?php echo ($user["yhid"]); ?>" target="_blank"><img src="__APP__/Public1/images/<?php echo ($user["yhtx"]); ?>" class="kefu_1"></a>
            			<a href="__APP__/Haoyouzhuye/index/yhid/<?php echo ($user["yhid"]); ?>" target="_blank"><p><?php echo ($user["yhzh"]); ?></p></a>
            			<a href="__APP__/Shouye/pengyou1/pyzh/<?php echo ($user["yhzh"]); ?>"><img src="__APP__/Public1/images/addfriends.gif"></a>
            </a>
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
            <li class="yx">hiusdjkhfguw@163.com</li>
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
            <div id="myModal" class="reveal-modal">
			<h1><?php echo (L("DAZHAOHU")); ?></h1>
            <form>
			<ul>
            	<li><input type='radio' checked='checked' name='d'/><img src="__APP__/Public1/images/pokeact_0.gif"></li>
                <li><input type='radio' name='d'/><img src="__APP__/Public1/images/pokeact_1.gif"></li>
                <li><input type='radio' name='d'/><img src="__APP__/Public1/images/pokeact_2.gif"></li>
                <li><input type='radio' name='d'/><img src="__APP__/Public1/images/pokeact_3.gif"></li>
                <li><input type='radio' name='d'/><img src="__APP__/Public1/images/pokeact_4.gif"></li>
                <li><input type='radio' name='d'/><img src="__APP__/Public1/images/pokeact_5.gif"></li>
                <li><input type='radio' name='d'/><img src="__APP__/Public1/images/pokeact_6.gif"></li>
                <li><input type='radio' name='d'/><img src="__APP__/Public1/images/pokeact_7.gif"></li>
                <li><input type='radio' name='d'/><img src="__APP__/Public1/images/pokeact_8.gif"></li>
                <li><input type='radio' name='d'/><img src="__APP__/Public1/images/pokeact_9.gif"></li>
                <li><input type='radio' name='d'/><img src="__APP__/Public1/images/pokeact_10.gif"></li>
                <li><input type='radio' name='d'/><img src="__APP__/Public1/images/pokeact_11.gif"></li>
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