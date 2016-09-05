<?php if (!defined('THINK_PATH')) exit();?>﻿<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="__APP__/Public1/js/jquery-1.8.2.min.js"></script>
<link href="__APP__/Public1/css/myxiangce.css" rel="stylesheet" type="text/css">
<link href="__APP__/Public1/css/rizhilist.css" rel="stylesheet" type="text/css">
<title>Roselove</title>
</head>
<body>

<div style="width:640px; height:700px;">
<div class="biaoti">
		<?php echo (L("WODEXIANGCE")); ?>		<a href="__APP__/Xiangce/xinjian" target="kuangjia" style="text-decoration:none;color:#fff;"><button><?php echo (L("XINJIANXIANGCE")); ?></button></a>
		
</div>
<div class="list_nav">
	<div><a class="click" href="__APP__/Xiangce" target="kuangjia"><?php echo (L("WODEXIANGCE")); ?></a></div>
	<div><a href="__APP__/Pengyou" ><?php echo (L("HAOYOUXIANGCE")); ?></a></div>
</div>
<div class="xiangce_list">
		<div id="yonghu">
	
</div>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><div class="fengmian" >
	<a href="__APP__/Xiangce/zhaopian/id/<?php echo ($user["id"]); ?>" >
		<?php if($user["xcfm"] == ''): ?><img src="__APP__/Public1/images/c1_02.jpg" width="130" />
		<?php else: ?>
		<img src="__APP__/Public1/images/<?php echo ($user["xcfm"]); ?>" width="130" /><?php endif; ?>
	</a>
    
    <p class="fengmian_1"><a href="__APP__/Xiangce/zhaopian/id/<?php echo ($user["id"]); ?>"><?php echo ($user["xcmc"]); ?></a></p>
    <p><?php echo (L("ZHAOPIANSHULIANG")); ?>：<?php echo ($user["count"]); ?></p>
    <p><?php echo (L("GENGXINYU")); ?>：<?php echo ($user["scsj"]); ?></p>
    <p><?php echo (L("CHUANGJIANYU")); ?>：<?php echo ($user["tjsj"]); ?></p>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
<div class="xia"><?php echo ($pagestr); ?></div>
  </div>
<style>
	.fenye {margin-top:20px;}
	.yeshu {padding:4px 10px;border:1px solid #aaa;color:#333;cursor:pointer;text-decoration:none;}
</style>


</div>
</body>
</html>