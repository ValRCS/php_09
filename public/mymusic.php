<?php
require_once("../config/config.php");
require_once("../src/util/util.php");
require_once("../src/templates/header.php");
//we want to store config separately and keep this file out of public git


// Create connection
$conn = mysqli_connect(SERVERNAME, USERNAME, PW, DB);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

//we do need to set up utf8 encoding to see Latvian
mysqli_set_charset($conn,"utf8");

//of course we need to be careful with user content in our queries
// $sql = "SELECT id, name, created FROM tracks";
$sql = "SELECT * FROM tracks";
$result = $conn->query($sql);

echo "<hr>";
if ($result->num_rows > 0) {
    // output data of each row
    //we can get ALL rows at once
    //we use MYSQLI_ASSOC to ask for only associate array(without numeric keys)
    $myrows = $result->fetch_all(MYSQLI_ASSOC);
    var_dump($myrows);
    echo "<hr>";
    foreach ($myrows as $key => $row) {
        echo "Processing Row No. $key <br>";
        //without extra variable, same result
        echo "<div class='my-trk'>id: " . $row["id"] 
            . " - Name: " . $row["name"] 
            . " - Artist: " . $row["artist"] 
            . " " . $row["created"]. "</div>";
        echo "<hr>";
    }
    //or we can get them row by row
    // while($row = $result->fetch_assoc()) {
    //     //for now we use hardcoded keys since we know we have id and name and created
    //     $trackText =  "<div class='my-trk'>id: " . $row["id"];
    //     $trackText .= " - Name: " . $row["name"];
    //     $trackText .= " - Artist: " . $row["artist"];
    //     $trackText .=  " " . $row["created"]. "</div>";
    //     echo $trackText;
    //     echo "<br>";
    //     //without extra variable, same result
    //     echo "<div class='my-trk'>id: " . $row["id"] 
    //         . " - Name: " . $row["name"] 
    //         . " - Artist: " . $row["artist"] 
    //         . " " . $row["created"]. "</div>";
    //     echo "<hr>";
    // }
    
} else {
    echo "0 results";
}
echo "<hr>";
//we could close before automatic close at the end of program
$conn->close();


//we can use $myrows as many as we want even after closing the database
foreach ($myrows as $row) {
    //without extra variable, same result
    echo "<div class='my-trk'>id: " . $row["id"] 
        . " - Name: " . $row["name"] 
        . " " . $row["created"]. "</div>";
    echo "<hr>";
}

//lets print a table of our results

printTable($myrows);

require_once("../src/templates/footer.php");