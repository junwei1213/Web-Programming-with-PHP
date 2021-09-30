<?php 
if(isset($_POST['submit']))
{
//retrieve number form POST submission
//convert to array by splittiing on comma
	$numStr=$_POST['num'];
	$numArr=explode(",",$_POST['num']);
	$primes=array();
	$primeFlag=0;

	//iterate over array
	//get absolute values of each number
	foreach($numArr as $n)
	{
	$n=trim(abs($n));
	//test each number for prime-ness:
	//check the number by dividing it
	//by all the numbers between 2 and itself
	//if not perfectly divisible by any,
	//number is prime
		for($i=2;$i<$n;$i++)
		{
			$primeFlag=0;
			if(($n%$i)==0)
			{
			break;	
			}
			$primeFlag=1;
		}	
		//if prime add to output array
		if($primeFlag==1)
		{
		array_push($primes,$n);	
		}
	}

	//check if any primes number were found then sort and remove duplicate from array and prit
	if(count($primes)>0)
	{
		$primes=array_unique($primes);
		sort($primes);
		$piece = implode(",",$primes);
		echo "The following numbers are prime : " .$piece ;	
	}
	else
	{
	echo "No Prime numbers found";	
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>check prime number</title>
</head>
<body>
	<form method="post">
			
		<table>
			<caption><h3>Project : Prime Number Tester</h3></caption>
			<tr>
				<td>Enter a list of numbers, Seperated by Commas</td>
				<td><input type="text" name="num"></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="submit" value="submit">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
