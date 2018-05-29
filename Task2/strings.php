<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Strings</title>

</head>
<body>
<h1> Functions / Strings / Regex </h1>

<?php

// Task 1

echo '<mark><b> Task 1 </b></mark><br>';

function deleteWhitespaces($string){

    $parts = explode('_', $string);

    $text = $parts[0];

    for($i = 1; $i < count($parts); $i++){

        $text .= ucfirst($parts[$i]);
    }

    return $text;
}
$string = 'var_test_text';
echo deleteWhitespaces($string) . '<br>';

//Task 2

echo '<mark><b> Task 2 </b></mark><br>';

function reverseString($str){
    $rev_string = '';

    foreach (explode(' ', $str) as $word) {
        $rev_string .= implode(array_reverse(preg_split('//u', $word, -1, PREG_SPLIT_NO_EMPTY))) . ' ';
    }

    echo $rev_string . '<br>';
}

reverseString('ФЫВА олдж');

//Task 3

echo '<mark><b> Task 3 </b></mark><br>';

$a = [342, 55, 33, 123, 66, 63, 9];

$length = count($a);

$result = '';

for($i = 0;$i < $length; $i++){
    if(preg_match('/3/',$a[$i])){
        $result .= $a[$i] . ';';
    }
}
echo 'Number which include 3: ' . $result . '<br>';

//Task 4(a)

echo '<mark><b> Task 4(a) </b></mark><br>';

$a = [342, 55, 33, 123, 66, 63, 9];

$count = 0;
for ($i = 0; $i < count($a); $i++) {

        $digits = str_split($a[$i]);
        for ($j = 0; $j < count($digits); $j++) {

            if ($digits[$j] == 3) {

                $count ++;
            }
        }
}
echo 'Count of 3 in array : ' . $count . '<br>';

//Task 4(b)

echo '<mark><b> Task 4(b) </b></mark><br>';

function countOfNumberInArray($arr){
    $count = 0;
    foreach ($arr as $item){
        $count += substr_count($item, '3');
    }
    return $count;
}

echo 'Count of 3 in array : ' . countOfNumberInArray($a);

//Bonus task 1

echo '<br><mark><b> Bonus task 1 </b></mark><br>';

function createBandName($name){
    if ($name[0] === $name[strlen($name) - 1]){
        echo ucfirst(substr_replace($name, $name, strlen($name) - 1)) . '<br>';
    }
    else{
        echo 'The ' . ucfirst($name) . '<br>';
    }
}

createBandName('alaska');
createBandName('dolphin');
createBandName('europe');

//Bonus task 2

echo '<mark><b> Bonus task 2 </b></mark><br>';

function strMap($str)
{
    $mapper = array("A" => "T", "T" => "A",
        "C" => "G", "G" => "C");

    echo strtr($str, $mapper) . '<br>';
}

strMap("TAACG");
strMap("GTAT");
?>
</body>
</html>
