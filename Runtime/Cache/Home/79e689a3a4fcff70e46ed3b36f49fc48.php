<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Roselove</title>
<link rel="stylesheet" type="text/css" href="__APP__/Public1/css/style.css">
</head>

<body>
<div class="center_center">
		<ul>
        	<li style="background:#D77295;"><a href="__APP__/Shouye" style="color:white"><?php echo (L("YONGHULIEBIAO")); ?></a></li>
            <li><a href="__APP__/Rizhi"><?php echo (L("RIZHI")); ?></a></li>
            <li><a href="__APP__/Xiangce"><?php echo (L("XIANGCE")); ?></a></li>
        </ul>
        <div class="center_3">
        	<?php if(is_array($q1)): $i = 0; $__LIST__ = $q1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><div class="center_2">
            	<a href="__APP__/Haoyouzhuye/index/yhid/<?php echo ($user["yhid"]); ?>" target="_blank"><img src="__APP__/Public1/images/<?php echo ($user["yhtx"]); ?>" class="dx"></a>
                <a href="__APP__/Haoyouzhuye/index/yhid/<?php echo ($user["yhid"]); ?>" ><p><?php echo ($user["yhzh"]); if($user["yhhy"] == 1): ?><img src="__APP__/Public1/images/user_vip.jpg" style="width:16px; height:9px"/><?php else: endif; ?></p></a>
                <a href="__APP__/Shouye/pengyou/pyzh/<?php echo ($user["yhzh"]); ?>"><img src="__APP__/Public1/images/jj.jpg" class="gd"><?php echo (L("JIAHAOYOU")); ?></a>
                <p style="width:130px;margin-left:2px;"><?php echo (L("SUOZAIDI")); ?>：<?php if($user["gjdq"] == ''): echo (L("WEISHEZHI")); else: echo ($user["gjdq"]); endif; ?></p>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
            
            <div class="center_4">
            <ul>
            	<li class="kuan" style="float:left;width:100%;border:none"><a href="#"><?php echo ($pagestr); ?></a></li>
            </ul>          
            </div>
        </div>       
    </div>
</body>
</html>