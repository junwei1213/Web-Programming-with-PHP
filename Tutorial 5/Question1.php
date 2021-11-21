<?php

$num = array(78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73);
$length = count($num);
$total = array_sum($num);

$avg = $total / $length;

echo "Average = $avg";

	rsort($num);
	$high = array_slice($num,0,5);
	$low = array_slice($num,-5,5);
	
	echo "<br />Five lowest markss: ";
	foreach($low as $l)
	{
		echo $l . ", ";
	}

	echo "<br />Five highest markss: ";
	foreach($high as $h)
	{
		echo $h . ", ";
	}

?>
