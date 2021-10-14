<form action=" " method="POST">
    <label>Enter Sales Amount :</label>
    <br>
    <input type="number" name="value">
    <input type="submit" name="submit">
    <input type="submit" name="reset" value="Reset">
</form>

<?php
//To create session from range1 until range9;
session_start();
$range1 = $_SESSION['range1'];
$range2 = $_SESSION['range2'];
$range3 = $_SESSION['range3'];
$range4 = $_SESSION['range4'];
$range5 = $_SESSION['range5'];
$range6 = $_SESSION['range6'];
$range7 = $_SESSION['range7'];
$range8 = $_SESSION['range8'];
$range9 = $_SESSION['range9'];


if(isset($_POST['reset'])){
    //To destroy session range1 until range9;
    session_destroy();
    session_start();
    $_SESSION['range1']=0;
    $_SESSION['range2']=0;
    $_SESSION['range3']=0;
    $_SESSION['range4']=0;
    $_SESSION['range5']=0;
    $_SESSION['range6']=0;
    $_SESSION['range7']=0;
    $_SESSION['range8']=0;
    $_SESSION['range9']=0;
}

if(isset($_POST['submit'])){
    $value = 200 + ($_POST['value']*0.09);
    if($value < 300 && $value >= 200)
    $range1 += 1;
    if($value < 400 && $value >= 300)
    $range2 += 1;
    if($value < 500 && $value >= 400)
    $range3 += 1;
    if($value < 600 && $value >= 500)
    $range4 += 1;
    if($value < 700 && $value >= 600)
    $range5 += 1;
    if($value < 800 && $value >= 700)
    $range6 += 1;
    if($value < 900 && $value >= 800)
    $range7 += 1;
    if($value < 1000 && $value >= 900)
    $range8 += 1;
    if($value > 1000)
    $range9 += 1;

//Define the session from range1 until range9;

$_SESSION['range1'] = $range1;
$_SESSION['range2'] = $range2;
$_SESSION['range4'] = $range4;
$_SESSION['range5'] = $range5;
$_SESSION['range3'] = $range3;
$_SESSION['range6'] = $range6;
$_SESSION['range7'] = $range7;
$_SESSION['range8'] = $range8;
$_SESSION['range9'] = $range9;

echo "Number of people who earned salaries in the following ranges : </br>";
echo "$200 - $299 :".$range1."<br>";
echo "$300 - $399 :".$range2."<br>";
echo "$400 - $499 :".$range3."<br>";
echo "$500 - $599 :".$range4."<br>";
echo "$600 - $699 :".$range5."<br>";
echo "$700 - $799 :".$range6."<br>";
echo "$800 - $899 :".$range7."<br>";
echo "$900 - $999 :".$range8."<br>";
echo " over $1000 :".$range9;
}?>
