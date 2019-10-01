<?php
    //prefer require_once over the other 3 (include, include_once, require);
    require("../src/templates/header.php");
    require_once("../src/fbfun.php");
    makeFizzBuzz();
    echo "<hr>";
    makeFizzBuzz(1,30, 3, 7);
    echo "<hr>";
    makeFizzBuzz(2,20);
    require("../src/templates/footer.php");


