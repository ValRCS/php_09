<?php
    function makeFizzBuzz($beg = 1, $end = 100, $fizz = 3, $buzz = 5) {
        echo "<ol>";
        for ($i = $beg; $i <= $end; $i++) {
            
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
        
    }