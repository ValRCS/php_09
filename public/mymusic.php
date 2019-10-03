<?php
require_once("../config/config.php");
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
    while($row = $result->fetch_assoc()) {
        //for now we use hardcoded keys since we know we have id and name and created
        $trackText =  "<div class='my-trk'>id: " . $row["id"];
        $trackText .= " - Name: " . $row["name"];
        $trackText .= " - Artist: " . $row["artist"];
        $trackText .=  " " . $row["created"]. "</div>";
        echo $trackText;
        //without extra variable, same result
        echo "<div class='my-trk'>id: " . $row["id"] 
            . " - Name: " . $row["name"] 
            . " - Artist: " . $row["artist"] 
            . " " . $row["created"]. "</div>";
    }
} else {
    echo "0 results";
}
echo "<hr>";
//we could close before automatic close at the end of program
$conn->close();
require_once("../src/templates/footer.php");