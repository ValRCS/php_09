<?php
    class House {
        //public properties that anyone can modify
        public $secondaryColors = [
            'bathroom' => 'white',
            'bedroom' => 'light pink',
            'kitchen' => 'light blue'
        ];
        public $hasPool = false;
        public $extra;

        //private properties that only can be modified inside class instance
        private $primaryColor = 'black';

        //constructor method called once upon object creation
        public function __construct($primColor = "funky", $hasNewPool = false) {
            //we write what we want done whenever we create a new object
            echo "Cool you created a new class instance - that is object <br>";
            $this->primaryColor = $primColor;
            echo "Your primary color is " . $this->primaryColor . "<br>";
            $this->hasPool = $hasNewPool;
            if ($this->hasPool) {
                echo "Cool you have a pool<br>";
            } else {
                echo "Sorry your house has no pool <br>";
            }
        }

        public function greetMe($name) {
            echo "Hello " . $name . "<br>";
        }

        public function showColor() {
            echo "Your house color is " . $this->primaryColor ."<br>";
        }

        //getter example 
        public function getColor() {
            return $this->primaryColor;
        }

        //setter example
        public function setColor($newcolor) {
            $this->primaryColor = $newcolor;
            $this->showColor();
        }


    }