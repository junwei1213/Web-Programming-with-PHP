<html>

</head>

<body>
<?php
$alphabet = array('a', 'b', 'c', 'd', 'e', 'f', 'g');
echo "Question (a) : ";
array_shift($alphabet);
foreach($alphabet as $item)
echo $item," ,";
echo "<br>";

echo "Question (b) : ";
array_pop($alphabet);
foreach($alphabet as $item)
echo $item," ,";
echo "<br>";

echo "Question (c) : ";
array_push($alphabet,'h');
foreach($alphabet as $item)
echo $item," ,";
echo "<br>";

echo "Question (d) : ";
array_unshift($alphabet,'z');
foreach($alphabet as $item)
echo $item," ,";


?>
 </body>
</html>