<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="__APP__/Public1/js/jquery-1.8.2.min.js"></script>
<link href="__APP__/Public1/css/rizhilist.css" rel="stylesheet" type="text/css">
<title>Roselove</title>
</head>
<body>

<div style="width:640px; height:700px;">
<div id="yonghu">
	<div class="biaoti"><?php echo (L("WODERIZHI")); ?><a href="__APP__/Rizhi/chuangjian" target="kuangjia" style="text-decoration:none;color:#fff;"><button style="margin-right:10px;"><?php echo (L("CHUANGJIANRIZHI")); ?></button></a></div>
</div>
<div class="list_nav">
	<div><a class="click" href="__APP__/Rizhi" target="kuangjia"><?php echo (L("WODERIZHI")); ?></a></div>
	<div><a href="__APP__/Pengyou"><?php echo (L("HAOYOURIZHI")); ?></a></div>
</div>

<div class="rizhi" id="itemContainer">
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><a href="__APP__/Rizhi/nr/id/<?php echo ($user["id"]); ?>" style="color:black"><p><?php echo ($user["rzbt"]); ?><span><?php echo ($user["scsj"]); ?></span></p></a><?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="xia"><?php echo ($pagestr); ?></div>
</div>

 <style>
 .rizhi p{border-bottom:1px solid #CCC;}
.rizhi span{float:right; margin-right:15px;}
 
 </style>
</body>
</html>