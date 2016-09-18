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
        <p class="p1"><?php echo (L("JINBI")); ?>：<?php echo ($list[0]["yhjb"]); ?></p>
        <ul style="background:none;">
        	<li style="background:#D77294;color:#FFF;"><?php echo (L("CHONGZHI")); ?></li>
        </ul>
        <form action="https://www.payssion.com/payment/create.html" method="post" id="form1">
        <input type="hidden" id="yhzh" name="yhzh" value="<?php echo ($yhzh); ?>" />
        	<ul>
            	<li><?php echo (L("XUANZECHONGZHIDUIXIANG")); ?>：</li>
                <li><input type='radio' name='a' class="yinchang" checked="checked" value="<?php echo ($yhzh); ?>" onclick="self()"/><?php echo (L("CHONGGEIZIJI")); ?></li>
                <li><input type='radio' name='a' class="dianji" onclick="getname()"/><?php echo (L("CHONGGEIHAOYOU")); ?></li>
                <li class="xianshi" style="display:none;">
                	<select name="pyzh" id="sel">
                		<?php if(is_array($a)): $i = 0; $__LIST__ = $a;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$b): $mod = ($i % 2 );++$i;?><option onclick="ggeett('<?php echo ($b["pyzh"]); ?>')" value="<?php echo ($b["pyzh"]); ?>"><?php echo ($b["pyzh"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
                </li>
            </ul>
            <input type="hidden" id="who"/>
            <ul>
            	<li><?php echo (L("XUANZECHONGZHIJINE")); ?>：</li>
                <li><input type='radio' name='b' value="100" checked="checked" />100<img src="__APP__/Public1/images/s_main_46.gif"></li>
                <li><input type='radio' name='b' value="200" />200<img src="__APP__/Public1/images/s_main_46.gif"></li>
                <li><input type='radio' name='b' value="300" />300<img src="__APP__/Public1/images/s_main_46.gif"></li>
                <li><input type='radio' name='b' value="400" />400<img src="__APP__/Public1/images/s_main_46.gif"></li>
            </ul>
            <p class="shuliang"><?php echo (L("XUANZEQITASHULIANG")); ?>:<input type="text" onkeyup="haha($(this))" id="account">(1<?php echo (L("JINBI")); ?>=1<?php echo (L("MEIYUAN")); ?>)</p>
            <div class="clear"></div>
            <input type="hidden" name="api_key" id="api_key"  />
            <input type="hidden" name="api_sig" id="api_sig"  />
            <input type="hidden" name="language" id="language" value="en"/>
            <input type="hidden" id="order_id" name="${order_id}"/>
            <input type="hidden" id="currency" name="currency"/>
            <input type="hidden" id="pm_id" name="pm_id"/>
            <input type="hidden" id="description" name="description"/>
            <input type="hidden" id="return_url" name="return_url"/>
            <input type="hidden" id="redirect_url" name="redirect_url" value="http://www.roselove68.com/Kby"/>
            <input type="hidden" id="acc" name="amount"/>
		<div style="margin-left:130px;margin-top:30px">
		<?php echo (L("XUANZEZHIFUFANGSHI")); ?>：
		<input type="radio" name="pay" value="paypal" id="paypal"  checked="checked"/><img src="__APP__/Public1/images/PAYPAL.png" width="105" height="20px">
	    	<input type="radio" name="pay" value="payssion" id="payssion"/><img src="__APP__/Public1/images/PAYSSION.png" width="105" height="20px">
	    	</div>
		<ul style="display:none;" id="payssionul">
                <li style="width:150px;"><input type='radio' name='zf' value="alfaclick_ru" checked="checked" /><img src="__APP__/Public1/images/Alfa-Click.png" width="105" height="20px"></li>
                <li style="width:150px;"><input type='radio' name='zf' value="amb_my" /><img src="__APP__/Public1/images/Am-online.png" width="105" height="20px"></li>
                <li style="width:150px;"><input type='radio' name='zf' value="banamex_mx" /><img src="__APP__/Public1/images/banamex.png" width="105" height="20px"></li><br/>
                <li style="width:150px;"><input type='radio' name='zf' value="bancochile_cl" /><img src="__APP__/Public1/images/Banco-de-Chile.png" width="105" height="20px"></li>
                <li style="width:150px;"><input type='radio' name='zf' value="bancomer_mx" /><img src="__APP__/Public1/images/bancomer.png" width="105" height="20px"></li>
                <li style="width:150px;"><input type='radio' name='zf' value="yamoneyac" /><img src="__APP__/Public1/images/Bank-Card.png" width="105" height="20px"></li><br/>
                <li style="width:150px;"><input type='radio' name='zf' value="boleto_br" /><img src="__APP__/Public1/images/Boleto.png" width="105" height="20px"></li>
                <li style="width:150px;"><input type='radio' name='zf' value="bradesco_br" /><img src="__APP__/Public1/images/bradesco.png" width="105" height="20px"></li>
                <li style="width:150px;"><input type='radio' name='zf' value="caixa_br" /><img src="__APP__/Public1/images/caixa.png" width="105" height="20px"></li><br/>
                <li style="width:150px;"><input type='radio' name='zf' value="yamoneygp" /><img src="__APP__/Public1/images/Cash.png" width="105" height="20px"></li>
                <li style="width:150px;"><input type='radio' name='zf' value="cashu" /><img src="__APP__/Public1/images/CashU.png" width="105" height="20px"></li>
                <li style="width:150px;"><input type='radio' name='zf' value="cherrycredits" /><img src="__APP__/Public1/images/cherrycredits.png" width="105" height="20px"></li><br/>
                <li style="width:150px;"><input type='radio' name='zf' value="bitcoin" /><img src="__APP__/Public1/images/cryptocurrency.png" width="105" height="20px"></li>
                <li style="width:150px;"><input type='radio' name='zf' value="epay_my" /><img src="__APP__/Public1/images/epay.png" width="105" height="20px"></li>
                <li style="width:150px;"><input type='radio' name='zf' value="euroset_ru" /><img src="__APP__/Public1/images/Euroset.png" width="105" height="20px"></li><br/>
                <li style="width:150px;"><input type='radio' name='zf' value="faktura_ru" /><img src="__APP__/Public1/images/Faktura.png" width="105" height="20px"></li>
                <li style="width:150px;"><input type='radio' name='zf' value="hsbc_br" /><img src="__APP__/Public1/images/hsbc.png" width="105" height="20px"></li>
                <li style="width:150px;"><input type='radio' name='zf' value="maybank2u_my" /><img src="__APP__/Public1/images/Maybank2u.png" width="105" height="20px"></li><br/>
                <li style="width:150px;"><input type='radio' name='zf' value="molpoints" /><img src="__APP__/Public1/images/MOLPoints.png" width="105" height="20px"></li>
                <li style="width:150px;"><input type='radio' name='zf' value="moneta_ru" /><img src="__APP__/Public1/images/Moneta.png" width="105" height="20px"></li>
                <li style="width:150px;"><input type='radio' name='zf' value="neosurf" /><img src="__APP__/Public1/images/Neosurf.png" width="105" height="20px"></li><br/>
                <li style="width:150px;"><input type='radio' name='zf' value="promsvyazbank_ru" /><img src="__APP__/Public1/images/Promsvyazbank.png" width="105" height="20px"></li>
                <li style="width:150px;"><input type='radio' name='zf' value="qiwi" /><img src="__APP__/Public1/images/QIWI.png" width="105" height="20px"></li>
                <li style="width:150px;"><input type='radio' name='zf' value="redcompra_cl" /><img src="__APP__/Public1/images/RedCompra.png" width="105" height="20px"></li><br/>
                <li style="width:150px;"><input type='radio' name='zf' value="redpagos_uy" /><img src="__APP__/Public1/images/redpagos.png" width="105" height="20px"></li>
                <li style="width:150px;"><input type='radio' name='zf' value="banktransfer_ru" /><img src="__APP__/Public1/images/Russia-Bank-transfer.png" width="105" height="20px"></li>
                <li style="width:150px;"><input type='radio' name='zf' value="russianpost_ru" /><img src="__APP__/Public1/images/Russian-Post-centres.png" width="105" height="20px"></li><br/>
                <li style="width:150px;"><input type='radio' name='zf' value="rsb_ru" /><img src="__APP__/Public1/images/Russian-Standard-Bank.png" width="105" height="20px"></li>
                <li style="width:150px;"><input type='radio' name='zf' value="santander_br" /><img src="__APP__/Public1/images/Santander.png" width="105" height="20px"></li>
                <li style="width:150px;"><input type='radio' name='zf' value="santander_mx" /><img src="__APP__/Public1/images/Santander2.png" width="105" height="20px"></li><br/>
                <li style="width:150px;"><input type='radio' name='zf' value="sberbank_ru" /><img src="__APP__/Public1/images/Sberbank.png" width="105" height="20px"></li>
                <li style="width:150px;"><input type='radio' name='zf' value="trustpay" /><img src="__APP__/Public1/images/Trustpay.png" width="105" height="20px"></li>
                <li style="width:150px;"><input type='radio' name='zf' value="webcash_my" /><img src="__APP__/Public1/images/Webcash.png" width="105" height="20px"></li><br/>
                <li style="width:150px;"><input type='radio' name='zf' value="yamoney" /><img src="__APP__/Public1/images/Yandex.Money.png" width="105" height="20px"></li>
            </ul>

            <input type="button" name="" onclick="gogo()" value="<?php echo (L("TIJIAO")); ?>" class="tijiao">
        </form>

	<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="form2" target="_blank">
	<!-- 把钱付给哪个账户，把value改为你的帐号 -->
        <input type="hidden" name="business" value="felixliu2011-facilitator@outlook.com">
	<!-- 定义按钮的类型. -->
	<input type="hidden" name="cmd" value="_xclick">
	<!-- 定义IPN的返回方式，2代表post. -->
	<input type="hidden" name="rm" value="2">
	<!-- 用户付款成功后跳转去哪个页面. -->
	<input type="hidden" name="return" value="http://127.0.0.1/Kby1">
    <input type="hidden" name="notify_url" value="http://47.90.53.90/payfor/paypalProcess">
	<!-- 很重要，自己定义的值. -->
	<input type="hidden" id="myvalue" name="custom" value="myvalue">
	<!-- 商品的名称. -->
	<input type="hidden" name="item_name" value="gold">
	<!-- 商品的价格. -->
	<input type="hidden" id="secondamount" name="amount">
	<!-- 商品的价格单位. -->
	<input type="hidden" name="currency_code" value="USD">
	</form>



    </div>
</body>
<script>

$(document).ready(function(){
   	$("#who").val($("#yhzh").val());

	
});

	$("#payssion").click(function(){
	    $("#payssionul").show();
	});
	$("#paypal").click(function(){
	    $("#payssionul").hide();
	});




	function self(){
		$("#who").val($("#yhzh").val());
	}
	function getname(){
		$("#who").val($("#sel").val());
		
	}
	function ggeett(aaa){
		$("#who").val(aaa);
	}
    function haha(aaa) {
        var account=$('#account').val();
        account=account.replace(/\D/g,'');
	if(parseInt(account)>499){
		account=499;
	}
        $('#account').val(account);
    }
    function gogo(){

	var pm_id=$("input[name='zf']:checked").val();

        var account=$('#account').val();
        var who=$("#who").val();
        var yhzh=$("#yhzh").val();
        if(account==""){
            account=$("input[name='b']:checked").val();
        }
        $('#acc').val(account);


	//jiang account dezhi fangru dierge biaodan
	if(document.getElementById("paypal").checked){
		$("#secondamount").val(account);
		//$("#form2").submit();
		var url="__APP__/paypal/abc.php";
        $.ajax({
            type: 'POST',
            url: url ,
            data:{
            	account:account,
            	who:who,
            	yhzh:yhzh

            },
            dataType:'json',
            success:function(data){
		alert(data.orderid);
		//return false;
		$("#myvalue").val(data.orderid);
		if(data.status==1){
			$("#form2").submit();
		}


	}
	});









	}else{

        var url="__APP__/Payssion/payssion-php-master/abc.php";
        $.ajax({
            type: 'POST',
            url: url ,
            data:{
            	account:account,
            	who:who,
            	yhzh:yhzh,
		pm_id:pm_id
            },
            dataType:'json',
            success:function(data){
                var order_id=data.order_id;
        		var pm_id=data.pm_id;
        		var currency=data.currency;
        		var api_key=data.api_key;
        		var description='充值';
       			var return_url='http://www.roselove68.com/Kby';

                $("#api_sig").val(data.api_sig);
                $("#api_key").val(api_key);
                //放入隐藏域
                $("#order_id").val(order_id);
                $("#custom").val(order_id);
                $("#currency").val(currency);
                $("#pm_id").val(pm_id);
                $("#description").val(description);
                $("#return_url").val(return_url);
                $("#form1").submit();
            }
        });

}


    }
</script>
</html>