<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Roselove</title>
<link rel="stylesheet" type="text/css" href="__APP__/Public1/css/style.css">

</head>

<body>
	<div class="center_center">
		<ul>
        	<li style="background:#D77295;"><a href="__APP__/Liwu" style="color:white"><?php echo (L("SONGLIWU")); ?></a></li>
            <li style="width:95px;"><a href="__APP__/Liwu/sdlw"><?php echo (L("SHOUDAODELIWU")); ?></a></li>
            <li><a href="__APP__/Liwu/sclw"><?php echo (L("SONGCHUDELIWU")); ?></a></li>
        </ul>
        <div class="liwu">
            <ul>
                <li class="xuni" style="width:95px;margin-left:15px;"><a href="__APP__/Liwu"><?php echo (L("XVNILIWU")); ?></a></li>
                <li style="width:95px;"><a href="__APP__/Liwu/zslw"><?php echo (L("ZHENSHILIWU")); ?></a></li>
            </ul>
        </div>
        <div class="center_3">
        	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><div class="liwu_1">
            	<a href="__APP__/Liwu/lwxq/id/<?php echo ($user["id"]); ?>"><div class="liwu_2"><img src="__APP__/Public/images/<?php echo ($user["lwtp"]); ?>"></div></a>
                <p style="margin-left:0px;text-align:center;"><?php echo ($user["lwmc"]); ?></p>
                <img src="__APP__/Public1/images/s_main_46.gif"><span><?php echo ($user["lwjg"]); ?>.00</span>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
            
            
            <div class="center_4">
            <ul>
            	<li class="kuan" style="margin:auto;border:1px solid white;width:100%;text-align:center;"><a href="#"><?php echo ($pagestr); ?></a></li>
            </ul>          
            </div>
        </div>       
    </div>
</body>
</html>