<?php
require_once("../config/config.php");
$conn = mysqli_connect(SERVERNAME, USERNAME, PW, DB);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

mysqli_set_charset($conn,"utf8");

//we will process POST request here
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST["delbtn"])) {
        $stmt = $conn->prepare("DELETE FROM `tracks` WHERE `tracks`.`id` = (?)");
        // $_POST["delbtn"] should return the value of the button
        $stmt->bind_param("s", $_POST["delbtn"]); 
        $stmt->execute();

        // echo "Deleted post with id: " . $_POST["delbtn"];
        //redirect ONLY works if no HTML body has been sent

    }

    if (isset($_POST["updbtn"])) {
        $stmt = $conn->prepare("UPDATE `tracks` SET `name` = (?), `artist` = (?), `album` = (?) WHERE `tracks`.`id` = (?)");
        $stmt->bind_param("ssss", $_POST["name"], $_POST["artist"], $_POST["album"], $_POST["updbtn"]); 
        $stmt->execute();

    }

    //we decide whether any delete buttons were pressed
    // foreach ($_POST as $key => $value) {
    //     $stmt = $conn->prepare("UPDATE `tracks` SET `name` = (?) WHERE `tracks`.`id` = (?)");
    //     // $stmt = $conn->prepare("DELETE FROM `tracks` WHERE `tracks`.`id` = (?)");
    //     // $_POST["delbtn"] should return the value of the button
    //     $stmt->bind_param("ss", $value, $key); 
    //     $stmt->execute();

        
    //     break;
    // }
 
    // echo "Deleted post with id: " . $_POST["delbtn"];
    //redirect ONLY works if no HTML body has been sent
    header('Location: /getmusic.php');
}
