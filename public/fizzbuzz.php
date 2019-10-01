<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fizzbuzz</title>
    <link rel="stylesheet" href="styles/fizzbuzz.css">
</head>
<body>
<?php
    //write fizzbuzz "Fizz" when divides by 3
    //"Buzz" when by 5
    //"Fizzbuzz" when by 3 and 5
    // $a = 21;
    // $b = 4;
    // if ($a % $b == 0) {
    //     echo "$a divides by $b";
    // } else {
    //     echo "$a DOES not divide by $b";
    // }

    //print fizzbuzz rezults in an ordered list
    //so like
    // 1. Number 1
    // 2. Number 2
    // 3. Fizz
    // 4. Number 4
    // 5. Buzz
    // ...
    // 15. FizzBuzz
    echo "<ol>";
        //lets not write directly :)
        // echo "<li>Number 1</li>";
        //write a for loop !
        $fizz = 3;
        $buzz = 5;
        for ($i = 1; $i <= 100; $i++) {
            
            if ($i % $fizz == 0 && $i % $buzz == 0) {
                $innerText = "FizzBuzz";
                $class = "fizz-buzz";
            } else if ($i % $fizz == 0) {
                $innerText = "Fizz";
                $class = "fizz";
            } else if ($i % $buzz == 0) {
                $innerText = "Buzz";
                $class = "buzz";
            } else {
                $innerText = "Number $i";
                $class = "number";
            }

            echo "<li class='$class'>" . $innerText . "</li>";
            //add if and if ele here
        }

    echo "</ol>";
?>
</body>
</html>


