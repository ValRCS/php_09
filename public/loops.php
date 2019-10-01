<?php
    echo "<ul>";
    $it = 0;
    while ($it < 5) {
        echo "<li id='item-$it'>My list item $it</li>";
        $it++;
    }
    echo "</ul>";

    //do while will always execute once 
    //it will check the condition only at the end
    $a = 0;
    do {
        echo 'The number is ' . $a;
    } while ($a > 0);
    echo "<hr>";

    echo "<ol>";
    for ($i = 0; $i < 5; $i++) {
        echo "<li id='ol-item-$i'>My list item $i</li>";
    }
    echo "</ol>";