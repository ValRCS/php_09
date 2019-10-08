<?php
    require_once("View.php");
    class Model {
        private $view;

        public function __construct(View $newview) {
            $this->view = $newview;
            //TODO add DB init etc
        }

        public function processData($incoming = null) {
            //process incoming

            //probably consult DB for truth and change truth states
            $this->view->render("Big data object should come here");
        }
    }