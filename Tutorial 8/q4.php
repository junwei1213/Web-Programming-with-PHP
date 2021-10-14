<html>

</head>

<body>
<?php
$orange = array("red", "yellow");
$green = array("yellow", "blue");

echo "Question (a) : ";
$result=array_intersect($orange,$green);
foreach($result as $item)
echo $item;
echo "<br>";

echo "Question (b) : ";
$result=array_diff($orange,$green);
foreach($result as $item)
echo $item,"";
echo "<br>";
?>
