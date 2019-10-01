<?php
    //write fizzbuzz "Fizz" when divides by 3
    //"Buzz" when by 5
    //"Fizzbuzz" when by 3 and 5
    $a = 21;
    $b = 4;
    if ($a % $b == 0) {
        echo "$a divides by $b";
    } else {
        echo "$a DOES not divide by $b";
    }