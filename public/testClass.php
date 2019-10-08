<?php
    require_once("../src/Classes/House.php");
    echo "Testing Classes";
    
    //we create new instances(object) of the House

    $myhouse = new House();
    $house2 = new House();

    //we can access public properties with -> 
    echo "My house " . $myhouse->getColor();
    echo "<hr>";

    //we can modify public properties directly even though it against OOP principles
    echo "Other house " . $house2->getColor();
    echo "<hr>";

    //fix this line so we can change a private property using a method
    // $house2->primaryColor = "Green";
    $house2->setColor("coolnewcolor");

    echo $house2->getColor();
    echo "<hr>";
    echo "My house " . $myhouse->getColor();
    echo "<hr>";
    $myhouse->greetMe("Valdis");
    $myhouse->showColor();
    $house2->showColor();
    $myhouse->setColor("blue");
    $house2->setColor("red");
    $house2->setColor("violet");
    // $myhouse->showColor();
    // $house2->showColor();
    echo "My house color is " . $myhouse->getColor() . "<br>";
