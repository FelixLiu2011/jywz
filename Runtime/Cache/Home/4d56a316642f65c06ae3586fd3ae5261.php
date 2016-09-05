<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Roselove</title>
<link rel="stylesheet" type="text/css" href="__APP__/Public1/css/style.css">

</head>

<body>
	<div class="center_center">
    	<div class="pengyou">
        	<img src="__APP__/Public1/images/n_left_group.jpg"><?php echo (L("PENGYOUQUAN")); ?>
            <a href="__APP__/Pengyou/tianjia" style="width:95px;"><?php echo (L("TIANJIAHAOYOU")); ?></a>
        </div>
		<ul>
        	<li style="width:95px;"><a href="__APP__/Pengyou"><?php echo (L("HAOYOULIEBIAO")); ?></a></li>
        </ul>
		<div class="center_3">
			
        	<?php if(is_array($q1)): $i = 0; $__LIST__ = $q1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><div class="center_2">
            	<a href="__APP__/Haoyouzhuye/index/yhid/<?php echo ($user["yhid"]); ?>" target="_blank"><img src="__APP__/Public1/images/<?php echo ($user["yhtx"]); ?>" class="dx"></a>
                <a href="__APP__/Haoyouzhuye/index/yhid/<?php echo ($user["yhid"]); ?>" target="_blank"><p><?php echo ($user["yhzh"]); ?></p></a>
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