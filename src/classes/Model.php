<?php
    require_once("View.php");
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
                break;
                case "get":
                    $data = $this->processGet($incoming);
                break;
            }
            //probably consult DB for truth and change truth states

            $this->view->render($data);
        }

        private function createDB($cfg) {
            // var_dump($cfg);
            // die("for now");
            $conn = mysqli_connect($cfg['server'], $cfg['user'], $cfg['pw'], $cfg['db']);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            // echo "Connected successfully";
        
            mysqli_set_charset($conn,"utf8");
            return $conn;
        }

        private function processGet($incoming) {
            $data = [
                "user" => "",
                "tracks" => [
                    [
                        "id" => 1,
                        "track" => "Ziemeļmeita",
                        "artist" => "Jumprava"
                    ]
                ]
            ];
            return $data;
        }

        private function processLogin($incoming) {
            $data = [];
            echo "Processing Login";
            echo $incoming['user'] . "pw" . $incoming['pw'];
            die("For now");
            return $data;
        }
    }