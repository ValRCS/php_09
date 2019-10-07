<?php
    session_start();

    require_once("../config/config.php");
    $conn = mysqli_connect(SERVERNAME, USERNAME, PW, DB);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // echo "Connected successfully";

    mysqli_set_charset($conn,"utf8");
?>


<form action='registeract.php' method='post'>
<input name='username' required placeholder='Input your desired username'>
<input name='lastname' placeholder='Optional Last Name'>
<input type="email" name='email' placeholder='Optional e-mail'>
<input type="password" name="pw" required placeholder="Your new password">
<input type="password" name="pw2" required placeholder="Repeat your password">
<button type="submit">REGISTER</button>
</form>