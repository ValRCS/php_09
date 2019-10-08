<?php
    require_once("Model.php");
    class Controller {
        private $model;

        public function __construct(Model $newmodel) {
            $this->model = $newmodel;
        }

        public function route() {
            //TODO add POST and GET processing
            $this->model->processData();
        }
    }