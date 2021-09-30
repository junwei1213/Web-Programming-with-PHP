<?php
if(isset($_POST['submit'])){
$String=$_POST['number'];
$Array = explode(",",$_POST['number']);
//explode — Split a string by a string

$primes = array();
$primeFlag = 0;

foreach($Array as $n){
//iterate over array

    $n = trim(abs($n));
        //trim — Strip whitespace (or other characters) from the beginning and end of a string
        // abs - absolute values of each number
        // echo abs(-4.2); | Ans : 4.2 (double/float)

    for($i = 2; $i < $n; $i++){
        $primeFlag = 0;
        if (($n%$i) == 0){
            break;
        }
        $primeFlag = 1;
    }

    if ($primeFlag == 1){
        array_push($primes, $n);
    }
}

if(count($primes) > 0){
    $primes = array_unique($primes);
    //array_unique - remove duplicate from array

    sort($primes);
    //sort — Sort an array in ascending order

    $pieces = implode(",",$primes);
    //implode — Join array elements with a string

    echo $pieces. " is prime <br>";
}else{
    echo "No Prime numbers found";
}
}
?>

<form action="" method="POST">
Please enter some integer numbers: <br>
<input type="text" name="number">
<input type="submit" name="submit" value="submit">
</form>