<?php
require_once("../config/config.php");
require_once("../src/templates/header.php");
?>
<h1>Enter some data about yourself</h1>
<form action="processGet.php" method="get">
    <input type="text" name="username" id="user-inp">
    <input type="text" name="likes" id="user-likes">
    <button type="submit">SUBMIT</button>
</form>



<?php
require_once("../src/templates/footer.php");