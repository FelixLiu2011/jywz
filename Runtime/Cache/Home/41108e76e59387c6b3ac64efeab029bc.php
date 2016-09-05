<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Roselove</title>
<link rel="stylesheet" type="text/css" href="__APP__/Public1/css/style.css">
<script src="__APP__/Public1/js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript">
            $(function(){
               $(".dianji").click(function(){
                    $(".xianshi").show();
               });
			   $(".yinchang").click(function(){
                    $(".xianshi").hide();
               });
            });
        </script>




</head>

<body>
	<div class="center_center">
        
        <ul>
        	<li style="width:95px;background:#D77295;"><a href="__APP__/Shengji" style="color:white"><?php echo (L("ZAIXIANSHENGJI")); ?></a></li>
            <li style="width:130px;"><a href="__APP__/Shengji/sjsm"><?php echo (L("SHENGJISHUOMING")); ?></a></li>
        </ul>
        <form method="post" action="__APP__/Shengji/blhy">
        <p class="p2"><?php echo (L("JINBI")); ?>：<?php echo ($list[0]["yhjb"]); ?></p>
        <p style="font-size:16px; font-weight:bold; margin-top:8px;">*Choose Member type and time</p>
        <p class="p2"><?php echo (L("GAOJIHUIYUAN")); ?></p>
        <div class="shengji"><p>Pay a month 20<?php echo (L("JINBI")); ?></p><input type='radio' name='c' checked="checked" value="高级会员1个月" /></div>
        <div class="shengji"><p>Pay 3 month 50<?php echo (L("JINBI")); ?></p><input type='radio' name='c' value="高级会员3个月" /></div>
        <div class="shengji"><p>Pay 6 month 90<?php echo (L("JINBI")); ?></p><input type='radio' name='c' value="高级会员6个月" /></div>
        <div class="shengji"><p>Pay 12 month 150<?php echo (L("JINBI")); ?></p><input type='radio' name='c' value="高级会员12个月" /></div>
        <div class="clear"></div>
        <p class="p2">VIP</p>
        <div class="shengji"><p>Pay a month 99<?php echo (L("JINBI")); ?></p><input type='radio' name='c' value="vip会员1个月" /></div>
        <div class="shengji"><p>Pay 3 month 269<?php echo (L("JINBI")); ?></p><input type='radio' name='c' value="vip会员3个月" /></div>
        <div class="shengji"><p>Pay 6 month 489<?php echo (L("JINBI")); ?></p><input type='radio' name='c' value="vip会员6个月" /></div>
        <div class="shengji"><p>Pay 12 month 999<?php echo (L("JINBI")); ?></p><input type='radio' name='c' value="vip会员12个月" /></div>
        <div class="clear"></div>
        	<ul>
            	<li><?php echo (L("XUANZECHONGZHIDUIXIANG")); ?>：</li>
                <li><input type='radio' name='w' checked="checked" class="yinchang" value="zj"/><?php echo (L("CHONGGEIZIJI")); ?></li>
                <li><input type='radio' name='w' class="dianji" value="py" /><?php echo (L("CHONGGEIHAOYOU")); ?></li>
                <li class="xianshi" style="display:none;">
                	<select name="pyzh">
                		<?php if(is_array($a)): $i = 0; $__LIST__ = $a;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$b): $mod = ($i % 2 );++$i;?><option><?php echo ($b["pyzh"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
                </li>
            </ul>
            <div class="clear"></div>
            <input type="submit" name="" value="<?php echo (L("LIJISHENGJI")); ?>" class="tijiao" style="width:130px;">
        </form>                
    </div>
</body>
</html>