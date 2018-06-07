<!DOCTYPE html>
<html lang="en">
<head>
    	<meta charset="UTF-8">
    	<title>PHP Basics</title>
    </head>
<body>
<h1> Basics / Control flow </h1>
<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/11/2018
 * Time: 9:55 AM
 */

//Task 1

echo '<mark><b> Task 1 </b></mark><br>';

$text1 = 'Hello';
$text2 = 'World';

echo $text1 . ' ' . $text2;

//Task 2(a)

echo '<br><mark><b> Task 2(a) </b></mark><br>';

$var = 'hello';

echo $var[0] . ' ' . $var[1] . ' ' . $var[4];

//Task 2(b)

echo '<br><mark><b> Task 2(b) </b></mark><br>';

echo $var[strpos($var, 'h')] . ' ' .
     $var[strpos($var, 'e')] . ' ' .
     $var[strpos($var, 'o')];

// Task 3

echo '<br><mark><b> Task 3 </b></mark><br>';

function checkValue( $a){
    echo ((($a > 0) AND ($a < 5)) ? 'True' : 'False') . '<br>';
}

checkValue(-5);
checkValue(0);
checkValue(-3);
checkValue(2);

//Task4(a)

echo '<mark><b> Task 4(a) </b></mark><br>';

function checkMinValue($min){

    echo 'Random number is: '. $min . '<br>';

    switch (intval($min / 15)):
        case 0:
            echo 'First';
            break;
        case 1:
            echo  'Second';
            break;
        case 2:
            echo 'Third';
            break;
        case 3:
            echo 'Fourth';
            break;
        default:
            echo 'Bad value';
            endswitch;
    echo '<br>';
}

checkMinValue(rand(0, 59));
checkMinValue(rand(0, 59));
checkMinValue(rand(0, 59));
checkMinValue(rand(0, 59));

//Task 4(b)

echo '<br><mark><b> Task 4(b) </b></mark><br>';

$min = rand(0,59);
$res = intval($min / 15);

echo 'Random number is: '. $min . '<br>';

echo ($res == 0 ? 'First' : ($res == 1 ? 'Second' : ($res == 2 ? 'Third' :
        ($res == 3 ? 'Fourth' : 'Bad value')))) . '<br>';

//Task 5

echo '<br><mark><b> Task 5 </b></mark><br>';

function checkYear($year){

    echo 'Random year is: ' . $year . '<br>';

    echo ((($year % 4 == 0 and $year % 100 != 0) or $year % 400 == 0) ?
        'High' : 'Simple') . '<br>';
}

checkYear(2016);
checkYear(5000);
checkYear(2000);
checkYear(2018);

//Task 6

echo '<br><mark><b> Task 6 </b></mark><br>';

function sumOfNumber($str){

    if (strlen($str) % 2 == 0){
        $strArray = str_split($str, strlen($str)/2);

        $firstSum = array_sum(str_split($strArray[0]));
        $secondSum = array_sum(str_split($strArray[1]));

        echo ($firstSum == $secondSum ? 'equals' : 'not equals') . '<br>';
    }
    else{

        echo 'Bad Value';
    }
}

sumOfNumber('123456');
sumOfNumber('385934');
sumOfNumber('1221');

//Bonus Tasks

echo '<br><mark><b> Bonus Task </b></mark><br>';

function calculateSumOfCharacter($string){
    $sum = 0;

    if(preg_match('/^[a-zA-Z]+$/', $string)){

        $splitSting = str_split(strtoupper($string));
        foreach ($splitSting as $char){

            $sum += ord($char);
        }
    }
    return $sum;
}

function compareStrings($string1, $string2) {
    if (calculateSumOfCharacter($string1) === calculateSumOfCharacter($string2)){

        echo '"'.$string1 . '"' . ',' . '"' . $string2 . '"' . ' -> equal<br>';
    }
    else {

        echo '"'.$string1 . '"' . ',' . '"' . $string2 . '"' . ' -> not equal<br>';
    }
}

compareStrings('AD', 'BC');//
compareStrings('AD', 'DD');
compareStrings('gf', 'FG');
compareStrings('zz1', '');
compareStrings("ZzZz", "ffPFF");
compareStrings("kl", "lz");
compareStrings(null, "" );
?>
</body>
</html>

