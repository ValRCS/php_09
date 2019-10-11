<?php
    namespace RCS\Classes;

    // require_once("View.php");
    require_once(__DIR__."/../../config/cfg.php");
    class Model {
        private $view;
        private $db;

        public function __construct(View $newview) {
            $this->view = $newview;
            $this->db = $this->createDB(CFG);
        }

        public function processData($incoming = null) {
            //process incoming
            $data = []; //empty array init
            switch ($incoming['operation']) {
                case "login":
                    $data = $this->processLogin($incoming);
                    header("Location: index.php");
                break;
                case "logout":
                    $data = $this->processLogout($incoming);
                    break;
                case "get":
                    $data = $this->processGet($incoming);
                    break;
                case "addsong":
                    $this->addSong($incoming);
                    header("Location: index.php");
                    break;
                case "deletesong":
                    $this->deleteSong($incoming["songid"], $_SESSION["id"]);
                    header("Location: index.php");
                    break;

            }
            //probably consult DB for truth and change truth states

            $this->view->render($data);
        }

        private function deleteSong($songid, $userid) {
            $stmt = $this->db->prepare("DELETE FROM `tracks` 
                WHERE `tracks`.`id` = (?)
                AND user_id = (?)");
            // $_POST["delbtn"] should return the value of the button
            $stmt->bind_param("ss", $songid, $userid); 
            $stmt->execute();
        }

        private function addSong($incoming) {
            $stmt = $this->db->prepare("INSERT INTO `tracks` 
                (`name`, `artist`, `album`, `user_id`) 
                VALUES (?,?,?,?)");
            //TODO change $_POST to $incoming arr values
            $stmt->bind_param("ssss", 
                $_POST["newtrack"], 
                $_POST["newartist"], 
                $_POST["newalbum"], 
                $_POST["addsong"]); 
            $stmt->execute();
        }

        private function createDB($cfg) {
            // var_dump($cfg);
            // die("for now");
            $conn = mysqli_connect($cfg['server'], $cfg['user'], $cfg['pw'], $cfg['db']);
            //TODO use PDO connection if you plan on using different DBs
            // https://www.php.net/manual/en/book.pdo.php

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            // echo "Connected successfully";
        
            mysqli_set_charset($conn,"utf8");
            return $conn;
        }

        private function processGet($incoming) {
            if (isset($_SESSION["myname"])) {
                $data = [
                    "state" => "loggedin",
                    "user" => $_SESSION["myname"],
                    "id" => $_SESSION["id"],
                    //this will be added by db tomorrow
                    // "tracks" => [
                    //     [
                    //         "id" => 1,
                    //         "name" => "Ziemeļmeita",
                    //         "artist" => "Jumprava",
                    //         "album" => "Best Hits",
                    //         "created" => "2019-10-02 12:18:40"
                    //     ]
                    // ]
                    "tracks" => $this->getSongs($_SESSION["id"])
                ];
            } else {
                $data = [
                    "state" => "loggedout"
                ];
            }

            return $data;
        }
        
        private function getSongs(  $userid = 0, 
                                    $songfilter = "", 
                                    $artistfilter = "",
                                    $albumfilter = "") {
            //generic get all statement   
            if ($userid) {
                $statement = $this->db->prepare("SELECT * 
                    FROM tracks 
                    WHERE user_id = (?)
                    AND name LIKE (?);");
                $songfilter = "%".$songfilter."%";
                $statement->bind_param("ss", $userid, $songfilter );

                
            }  else {
                //covering case without user id
                $statement = $this->db->prepare("SELECT * FROM tracks");
            }                  

            $statement->execute();
            $result = $statement->get_result(); 
            if ($result->num_rows > 0) {
                $myrows = $result->fetch_all(MYSQLI_ASSOC);   
            } else {
                $myrows = [];
            }
            return $myrows;                           

        }

        private function processLogout() {
            if (isset($_COOKIE['TestCookie'])) {
                unset($_COOKIE['TestCookie']);
                setcookie('TestCookie', '', time() - 3600, '/'); // empty value and old timestamp
            }
            $_SESSION['myname'] = null;

            return [
                "state" => "loggedout"
            ];
        }

        private function processLogin($arr) {
            $data = [];
            $conn = $this->db;
            // echo "Processing Login";
            // echo $arr['user'] . "pw" . $arr['pw'];
            $username = $arr['user'];
            $pw = $arr['pw'];

            $stmt = $conn->prepare("SELECT id, username, pwhash FROM users WHERE username = ?");
            $stmt->bind_param("s", $username); // "sss" means the values are 3 strings (another type is "d" or "f")
            // set parameters and execute
            $stmt->execute();
            $res = $stmt->get_result(); //here we know the result for specific user

                        //now we can branch depending on what we got
            //check if user exists at all
            if ($res->num_rows < 1) {
                //but we do not tell users that they do not exist
                //just generic bad login
                // echo "Bad Login";
                // die("No more!");
                return ["state" => "nouser"]; //we return early with nothing
            }

            //here we get a single row since user names are 
            // guaranteed to be unique in the database we set the constraint!
            $row = $res->fetch_assoc();
            // var_dump($row);

            if (password_verify ($pw , $row['pwhash'])) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['myname'] = $username;
                // echo $username."is logged in<br>";
                //we check if we checkbox with name attribue remember is set
                if (isset($_POST['remember'])) {
                    echo "Saving Loggin";
                    //TODO think about safety!
                    setcookie("TestCookie", $_SESSION['myname'], time()+3600);
                }
            } else {
                //we keep the error message identical to the one on bad user
                // echo "Bad Login";
                // die("No more!");
                return ["state" => "badpw"];
            }
            return [
                "state" => "loggedin", 
                "user" => $username, 
                "id" => $row['id']
            ];
        }
    }