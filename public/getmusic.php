<?php
require_once("../config/config.php");
require_once("../src/util/util.php");
require_once("../src/templates/header.php");
?>
<form action="getmusic.php" method="post">
    <label for="newtrack">Track</label>
    <input type="text" name="newtrack" id="new-track">
    <label for="newartist">Artist</label>
    <input type="text" name="newartist" id="new-artist">
    <label for="newalbum">Album</label>
    <input type="text" name="newalbum" id="new-album">
    <button type="submit">ADD NEW SONG</button>
</form>


<?php
$conn = mysqli_connect(SERVERNAME, USERNAME, PW, DB);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

mysqli_set_charset($conn,"utf8");


//we will process POST request here
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $stmt = $conn->prepare("INSERT INTO `tracks` (`name`, `artist`, `album`) VALUES (?,?,?)");
    $stmt->bind_param("sss", $_POST["newtrack"], $_POST["newartist"], $_POST["newalbum"]); 
    $stmt->execute();
}

//of course we need to be careful with user content in our queries
// $sql = "SELECT id, name, created FROM tracks";
//TODO prepare statement and sanitize inputs! remember Bobby Tables!
if (array_key_exists("artist", $_GET) && $_GET["artist"]) {
   // prepare and bind
    $getstmt = $conn->prepare("SELECT * FROM tracks WHERE artist LIKE (?)");
    $mysearchterm = "%" . $_GET["artist"] . "%"; //so we can look for all groups starting with our name
    $getstmt->bind_param("s", $mysearchterm); 
} else if (array_key_exists("track", $_GET) && $_GET["track"]) {
    $getstmt = $conn->prepare("SELECT * FROM tracks WHERE name LIKE (?)");
    $mysearchterm = "%" . $_GET["track"] . "%"; //so we can look for all groups starting with our name
    $getstmt->bind_param("s", $mysearchterm); 
} else {
    $getstmt = $conn->prepare("SELECT * FROM tracks");
}

$getstmt->execute();
$result = $getstmt->get_result();

if ($result->num_rows > 0) {
      $myrows = $result->fetch_all(MYSQLI_ASSOC);
      $conn->close(); //we do not need db anymore since we saved all results
      printTable($myrows);
}
?>
<form action="getmusic.php" method="get">
    <label for="track">Track</label>
    <input type="text" name="track" id="track-inp">
    <label for="artist">Artist</label>
    <input type="text" name="artist" id="artist-inp">
    <button type="submit">SUBMIT</button>
</form>
<?php
require_once("../src/templates/footer.php");