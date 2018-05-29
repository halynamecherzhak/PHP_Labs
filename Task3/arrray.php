<!DOCTYPE html>
<html lang="en">
<head>
    	<meta charset="UTF-8">
    	<title>PHP Arrays</title>
    </head>
<body>
<h1> Arrays </h1>

<?php
//Task 1
echo '<mark><b> Task 1 </b></mark><br>';

function repeatDigits($array)
{
    $result = array();

    for ($i = 0; $i < count($array); $i++) {
        $j = 0;
        while ($j < $array[$i]) {
            $result[] .= $array[$i];
            $j++;
        }
    }
    echo implode($result , ' ') . '<br>';

}
repeatDigits([1, 3, 2, 4]);
repeatDigits([5, 4, 2, 4]);

//Task 2

echo '<mark><b> Task 2 </b></mark><br>';

$temperatures = array(33, 15, 17, 20, 23, 23, 28, 40, 21, 19, 31, 18, 30, 31,
    28, 23, 19,
    28, 27, 30, 39, 17, 17, 20, 19, 23, 28, 30, 34, 28);

echo 'Array without repeated numbers: ';

$result = array_unique($temperatures);
for($i=0; $i<count($result); $i++){
    echo $result[$i] . ' ';
}
echo '<br>Sorted array: ';
sort($result);

for($i=0; $i < count($result); $i++){
    echo $result[$i] . ' ';
}

echo '<br>Three min elements: ';

for ($i =0;$i<3;$i++) {
    echo $result[$i] . ' ';
}

echo '<br>Three max elements: ';

print_r(array_slice($result,count($result )-3));
echo '<br>Average ' . $temperatures[count($temperatures)/2];
echo '<br>Three average  elements: ';

        echo $temperatures[count($temperatures)/2 -1] . ' '.
             $temperatures[count($temperatures)/2] . ' '.
             $temperatures[count($temperatures)/2 + 1] . '<br>';

//Task 3

echo '<mark><b> Task 3 </b></mark><br>';

$books = [
    [
        'name' => 'Learning php, mysql & JavaScript',
        'author' => 'Robin Nixon',
        'price' => 30,
        'tags' => ['php', 'javascript', 'mysql']
    ],
    [
        'name' => 'Php for the Web: Visual QuickStart Guide',
        'author' => 'Larry Ullman',
        'price' => 25,
        'tags' => ['php']
    ],
    [
        'name' => 'pHp and MySqL for Dynamic Web Sites',
        'author' => 'Larry Ullman',
        'price' => 14.39,
        'tags' => ['php', 'mysql']
    ],
    [
        'name' => 'Modern PhP: New Features and Good Practices',
        'author' => 'Josh Lockhart',
        'price' => 24,
        'tags' => ['php']
    ],
    [
        'name' => 'JavaScript and JQuery: Interactive Front-End Web Development',
        'author' => 'Jon Duckett',
        'price' => 20,
        'tags' => ['javascript', 'jquery']
    ],
    [
        'name' => 'Miss Peregrine\'s Home for Peculiar Children',
        'author' => 'Ransom Riggs',
        'price' => 8.18
    ]
];

$sortArray = array();

foreach($books as $book){
    foreach($book as $key=>$value){
        if(!isset($sortArray[$key])){
            $sortArray[$key] = array();
        }
        $sortArray[$key][] = $value;
    }
}

$orderBy = 'price';
array_multisort($sortArray[$orderBy],SORT_DESC,$books);
echo 'Sorted array by price: ' . '<br>';

function printBookArray($books){
    foreach($books as $book){
        foreach($book as $itemKey=>$itemValue) {
            echo ucfirst($itemKey) . ': ';
            if (!is_array($itemValue)){
                echo $itemValue;
            }else{
                foreach ($itemValue as $item) {
                    echo $item . ', ';
                }
            }
            echo '<br>';
        }
    }
}

printBookArray($books);
echo '<br><mark><b> Task 3 Filtered array</b></mark><br>';
printBookArray(array_filter($books, function ($book){
    return in_array('php', $book['tags'], true);
}));

echo '<br><mark><b></b></mark><br>';

//Task 4

echo '<br><mark><b> Task 4 </b></mark><br>';

function findIndexOfElement($array){
    if (count($array) > 2) {
        $leftSum = $array[0];
        $rightSum = array_sum($array) - $array[0] - $array[1];
        for($i = 1; $i < count($array) - 1; $i++){
            if ($leftSum === $rightSum){
                return $i;
            }else {
                $leftSum += $array[$i];
                $rightSum -= $array[$i+1];
            }
        }
        return -1;
    }
    else{
        throw new ArgumentCountError('BadArray');
    }
 }
echo 'Index of Element:' . findIndexOfElement( [1,2,3,4,3,2,1] ) . '<br>';
echo 'Index of Element:' . findIndexOfElement( [20,10,-80,10,10,15,35] ) . '<br>';
echo 'Index of Element:' . findIndexOfElement( [10,-80,10,10,15,35] ) . '<br>';
//Task 5

echo '<br><mark><b> Task 5 </b></mark><br>';

function findUniqueElementInArray($array)
{
    $frequency = [];
    for ($i = 0; $i < count($array); $i++) {
        $count = 1;
        for ($j = $i + 1; $j < count($array); $j++) {
            if ($array[$i] == $array[$j]) {
                $count++;
                $frequency[$j] = 0;
            }
        }

        if ($frequency[$i] !== 0) {
            $frequency[$i] = $count;
        }
    }
    for ($i = 0; $i < count($array); $i++) {
        if ($frequency[$i] == 1) {
            return $array[$i];
        }
    }
    return 0;
}
echo 'Unique element in the array is: ' . findUniqueElementInArray([3,1,5,3,7,4,1,5,7]) . '<br>';
echo 'Unique element in the array is: ' . findUniqueElementInArray([ 0, 0, 0.55, 0, 0 ]) . '<br>';
echo 'Unique element in the array is: ' . findUniqueElementInArray([ 1, 1, 1, 2, 1, 1 ]) . '<br>';
?>
</body>
</html>

