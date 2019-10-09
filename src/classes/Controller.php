<?php
    require_once("Model.php");
    class Controller {
        private $model;

        public function __construct(Model $newmodel) {
            $this->model = $newmodel;
        }

        //we will start the page by routing
        public function route() {

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->postReq();
            }
            if($_SERVER['REQUEST_METHOD'] == 'GET') {
                $this->getReq();
            }

        }

        private function postReq() {
            //we process our post Requests here
            if (isset($_POST["loginbtn"])) { 
                $username = $_POST["user"];
                $pw = $_POST['pw'];
                //we pass our data to model creating a new array
                //with subarray on the fly
                $this->model->processData([
                    "operation" => "login",
                    "user" => $username,
                    "pw" => $pw
                ]);
            } else if (isset($_POST["logoutbtn"])) {
                $this->model->processData([
                    "operation" => "logout"
                ]);
            }
        }

        private function getReq() {
            //we process our get Requests here
            $this->model->processData(["operation" => "get"]);
        }
    }