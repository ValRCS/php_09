<?php
    echo "Arrays<hr>";

    $array1 = array('Apple', 'Banana', 'Orange', 'Mango');
    var_dump($array1);

    $array2 = ['Apple', 'Banana', 'Orange', 'Mango'];
    var_dump($array2);
    $array2["mykey"] = "Avocado";
    echo "<hr>";
    var_dump($array2);


    echo "<hr>";
    echo $array2[0];

    $array2[1] = "Bumbieris";

    echo "<hr>";
    echo $array2[1];

    $array2[35] = "Strawberry";
    var_dump($array2);

    echo "<hr>My array2 has " . sizeof($array2) . " elements<hr>";

    //print all keys and values in array

    foreach ($array2 as $key => $value) {
        echo "Key " . $key . " value: " . $value . "<br>";
    }
    echo "<hr>";

    // we can print just the values in our array
    foreach ($array2 as $value) {
        echo "Just the value: " . $value . "<br>";
    }

    //somewhat similar to hasOwnProperty in Javascript
    //we check if the array has a specific key
    $mykey = 4;
    if (array_key_exists($mykey, $array2)) {
        echo "Cool!" . "key exists value is: " . $array2[$mykey] . "<br>";
    } else {
        echo "Sorry $mykey was not found<br>";
    }
    $mykey = 2;
    if (array_key_exists($mykey, $array2)) {
        echo "Cool!" . "key exists value is: " . $array2[$mykey] . "<br>";
    } else {
        echo "Sorry $mykey was not found<br>";
    }
