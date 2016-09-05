<?php

require_once 'conn.php';

$czzh=$_REQUEST["yhzh"];

$cgzh=$_REQUEST["who"];

$account=$_REQUEST['account'];


$order_id=time();

$sql="insert into czb(czzh,cgzh,czje,ddid) values ('$czzh','$cgzh','$account','$order_id')";
$db->tsg($sql);

$arr = array('status' => 1,'orderid' => $order_id);
echo json_encode($arr);
