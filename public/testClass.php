<?php
    require_once("../src/Classes/House.php");
    echo "Testing Classes";
    
    //we create new instances(object) of the House

    $myhouse = new House();
    $house2 = new House();

    //we can access public properties with -> 
    echo "My house " . $myhouse->primaryColor;
    echo "<hr>";

    //we can modify public properties directly even though it against OOP principles
    echo "Other house " . $house2->primaryColor;
    echo "<hr>";
    $house2->primaryColor = "Green";
    echo $house2->primaryColor;
    echo "<hr>";
    echo "My house " . $myhouse->primaryColor;
    echo "<hr>";