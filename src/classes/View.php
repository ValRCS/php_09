<?php
    class View {
        public function render($data = null) {
            $html = $this->getHeader();
            //TODO use $data when generating our HTML
            $html .= "<h1>Generating bunch of HTML</h1>";
            $html .= $this->getLogin($data);
            $html .= $this->getMain($data);
            $html .= $this->getFooter();
            
            echo $html;
        }

        private function getLogin($data) {
            $html = "hmmm";
            if ($data['state'] == "loggedin" ) {
                $html = "You are logged in " . $data['user'] . "<br>";
                $html .= "You user id is " . $data['id'];
                $html .= "<form action='index.php' method='post'>";
                $html .= "<button name='logoutbtn' type='submit'>LOGOUT</button>";
                $html .= "</form><hr>";
            } else {
                $html = <<<EOT
                <hr>
                <form action='index.php' method='post'>
                <label for='user-inp'>USERNAME</label>
                <input name='user' id='user-inp'>
                <label for='pw-inp'>PASSWORD</label>
                <input name='pw' type='password' id='pw-inp'>
                <button name='loginbtn' type='submit'>LOGIN</button>
                <button name='logoutbtn' type='submit'>LOGOUT</button>
                <input type='checkbox' name='remember' id='remember-chk'>
                <label for='remember-chk'>Remember me (uses Cookie insert GDPR warning here)</label>           
                </form> 
                <hr>                               
                <form action='index.php' method='post'>
<input name='username' required placeholder='Input your desired username'>
<input name='lastname' placeholder='Optional Last Name'>
<input type="email" name='email' placeholder='Optional e-mail'>
<input type="password" name="pw" required placeholder="Your new password">
<input type="password" name="pw2" required placeholder="Repeat your password">
<button type="submit">REGISTER</button>
</form>
<hr>
EOT;
            }
            return $html;
        }

        private function getHeader() {
            // $html = "<!DOCTYPE html>";
            // $html .= "more html but i am lazy so i will use heredoc";
            //https://www.php.net/manual/en/language.types.string.php#language.types.string.syntax.heredoc
            $pagetitle = "My music page"; //TODO get title from config
            $stylefile = "style.css" ; //TODO get style from config
            $html = <<<MYLIMITER
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>$pagetitle</title>
    <link rel="stylesheet" href="styles/$stylefile">
</head>
<body>
MYLIMITER;
            return $html;
        }

        private function getMain($data) {
            $html = "";
            if ($data['state'] == "loggedin" ) {
                $html = "<main>Cool you are logged getting your songs";
                $html .= "<div> Songs will go here</div>";
                $html .= $this->getSongs($data['tracks']); //we process song rows here
                $html .= "</main>";
            } else {
                $html = "Sorry no songs for logged out users";
            }

            return $html;
        }

        //we get songs by default default an empty array
        private function getSongs($myrows = []) {
            $html = "";
            if (count($myrows) == 0) {
                $html .= "<hr>No results<hr>";
                return $html;
            }
            $html .= "<div class='table-cont'>";
            foreach ($myrows as $key => $row) {
                //special case using first row we create our table head with column names
                if ($key == 0) {
                    $html .= "<div class='table-head'>";
                    foreach ($row as $colname => $unusedcolvalue) {
                        $html .= "<span class='col-name'>" . $colname . "</span>";
                    }
                    $html .= "</div>";
                }
                $html .= "<div class='row-cont'>";
                // foreach ($row as $unusedcolkey => $colvalue) {
                foreach ($row as  $cellkey => $cellvalue) {
                    $html .= "<form action='updatemusicrow.php' method='post'>";
                    if ($cellkey == "name" || $cellkey == "artist" || $cellkey == "album") {
                        
                        $html .= "<span>";
                        
                        $html .= "<input name='". $cellkey . "' value='" . $cellvalue . "'>";
                        $html .= "</span>";
                    } else {
                        $html .= "<span>" . $cellvalue . "</span>";
                    }
     
    
                }
    
                $html .= "<span class='del-cont'>";
                $html .= "<button name='updbtn' value='" . $row['id'] . "' type='submit'>UPDATE</button>";
                $html .= "</span>";
                $html .= "<span class='del-cont'>";
                $html .= "<button name='delbtn' value='" . $row['id'] . "' type='submit'>DELETE</button>";
                $html .= "</span>";
    
                $html .= "</form>";
                $html .= "</div>";
            }
            $html .= "</div>";

            return $html;
        }

        private function getFooter() {
            $year = "2019"; //TODO get year dynamically
            $html = "<footer>(C)$year</footer>";
            $html .= "</body>";
            $html .= "</html>";
            return $html;
        }
    }