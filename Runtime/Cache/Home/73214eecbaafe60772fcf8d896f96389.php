<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Roselove</title>
<link rel="stylesheet" type="text/css" href="__APP__/Public1/css/style.css">

</head>

<body>
    
    <div class="center_center">
    	<div class="pengyou">
			<p style="display:inline-block;"><?php echo (L("ZUIXINZHAOPIAN")); ?></p>
            <a href="__APP__/Xiangce"><?php echo (L("GENGDUO")); ?></a>           
        </div>
        <?php if(is_array($a)): $i = 0; $__LIST__ = $a;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$b): $mod = ($i % 2 );++$i;?><div class="hyzp_1"><a href="__APP__/Xiangce/zhaopian1/id/<?php echo ($b["id"]); ?>"><img src="__APP__/Public1/images/<?php echo ($b["xctp"]); ?>"></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="clear"></div>
        <div class="pengyou">
			<p style="display:inline-block;"><?php echo (L("ZUIXINRIZHI")); ?></p>
            <a href="__APP__/Rizhi"><?php echo (L("GENGDUO")); ?></a>
            <div class="rizhi_2"><a href="__APP__/Rizhi/nr/id/<?php echo ($c[0]['id']); ?>"><?php echo ($c[0]["rzbt"]); ?></a></div>
        </div>
        <div class="clear"></div>
        <div class="pengyou">
			<p style="display:inline-block;"><?php echo (L("ZUIXINLIUYAN")); ?></p>
            <a href="__APP__/Liuyan"><?php echo (L("GENGDUO")); ?></a>
            <div class="rizhi_2"><a href="__APP__/Liuyan/lynr/id/<?php echo ($e[0]['id']); ?>"><?php if($e[0]['lyzh'] == ''): else: echo (L("LAIZI")); ?> <?php echo ($e[0]["lyzh"]); echo (L("DELIUYAN")); endif; ?></a></div>
        </div>       
    </div>
</body>
</html>