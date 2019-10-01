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
    //prefer require_once over the other 3 (include, include_once, require);
    require_once("fbfun.php");
    makeFizzBuzz();
    echo "<hr>";
    makeFizzBuzz(1,30, 3, 7);
    echo "<hr>";
    makeFizzBuzz(2,20);
?>
</body>
</html>


