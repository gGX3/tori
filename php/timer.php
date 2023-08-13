<?php	
session_start();
$mytime = 20;
if(!isset($_SESSION['time'])){
	$_SESSION['time'] = time();
}else{
	$diff = time()-$_SESSION['time'];
	$diff = $mytime-$diff;

	$hours = floor($diff/60);
	$minute = (int)($diff/60);
	$second = $diff%60;

	$show = $hours .":". $minute .":". $second;

	if($diff == 0 || $diff<0){
		echo "timeout";
    }else{
			echo $show;
         }

}


?>