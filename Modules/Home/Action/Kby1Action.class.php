<?php
class Kby1Action extends CommAction
{
	public function index()
	{
header("Content-type:text/html;charset=utf-8");
		$zt=$_REQUEST["st"];
		$ddid=$_REQUEST["custom"];
        $status=$_REQUEST["payment_status"];
		$m=M("czb");
		$a=$m->where("ddid='$ddid'")->select();
		if($zt=='Completed')
		{
			$cgzh=$a[0]["cgzh"];
			$czje=$a[0]["czje"];
			$q=M();
			$t=$q->query("select * from yhb where yhzh='$cgzh'");
			$yljb=$t[0]['yhjb'];
			$xjb=$czje+$yljb;
			$xjb=Intval($xjb);
			$b=$q->execute("update yhb set yhjb='$xjb' where yhzh='$cgzh'");
			if($b)
			{
				$this->success("Top-up success","__APP__/Index",1);
			}
			
		}
		else
		{
            if($status=='Completed') {
                $cgzh=$a[0]["cgzh"];
                $czje=$a[0]["czje"];
                $czzt=$a[0]["czzt"];
                if($czzt == 0) {
                    $q=M();
                    $t=$q->query("select * from yhb where yhzh='$cgzh'");
                    $yljb=$t[0]['yhjb'];
                    $xjb=$czje+$yljb;
                    $xjb=Intval($xjb);
                    $q->execute("update czb set czzt=1 where ddid='$ddid'");
                    $b=$q->execute("update yhb set yhjb='$xjb' where yhzh='$cgzh'");
                    if($b)
                    {
                        $this->success("Top-up success","__APP__/Index",1);
                    }
                }elseif ($czzt == 1){
                    $this->success("Top-up success","__APP__/Index",1);
                }
            }else{
                $this->success("Top-up failure","__APP__/Index",1);
            }

		}
	}
}