<?php
    require_once("House.php");
    //using extends we create a new class 
    // with all the methods and properties of class we are extending
    class LuxuryHouse extends House {
        //we got all the methods and properties from House already
        public $hasHeliPad;

        //if we create a constructor we will have to call parent constructor by hand
        public function __construct($primColor = "funky", $hasNewPool = true, $hasHeliPad = true) {
            echo "Created a luxury house<br>";
            //we need to call parent constructor
            parent::__construct($primColor, $hasNewPool);

            $this->hasHeliPad = $hasHeliPad;
            if ($this->hasHeliPad) {
                echo "Cool you have a heli pad as well! <br>";
            }
        }

        public function launchHeli() {
            echo "Heli has launched!<br>";
        }
    }