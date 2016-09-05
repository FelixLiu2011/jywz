<?php

require_once 'conn.php';

$czzh=$_REQUEST["yhzh"];

$cgzh=$_REQUEST["who"];

$account=$_REQUEST['account'];

$pm_id=$_REQUEST['pm_id'];	

$order_id=time();

$sql="insert into czb(czzh,cgzh,czje,ddid) values ('$czzh','$cgzh','$account','$order_id')";
$db->tsg($sql);

$msg = implode("|", array('2883f09148b3c151', $pm_id, $account, 'USD',$order_id, '4d752511795e119711ecd6f67ab520f6'));

$api_sig = md5($msg);

$arr = array('order_id' => $order_id ,'api_key' => '2883f09148b3c151','currency' => 'USD','pm_id' =>$pm_id,'api_sig' => $api_sig);

echo json_encode($arr);
