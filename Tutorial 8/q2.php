<?php

$letters = array('a', 'b', 'b', 'd', 'd', 'd', 'g');

echo "Remove all the duplicate element and print out : <br>";
print_r($uniques = array_unique($letters));
echo "<br><br>";
echo "Randomize the order of the array and print out: <br>"; 
shuffle($letters);
print_r($letters);
echo "<br><br>";
echo "Reverse the order of array's element and print out: <br>";
print_r(array_reverse($letters));
echo "<br><br>";
echo "Search for element “d” using in_array function and returns true if found.";
if (in_array('d',$letters, TRUE)){
    echo "True";
}
else{
    echo "False";    
}


