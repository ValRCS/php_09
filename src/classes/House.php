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
        public function __construct() {
            //we write what we want done whenever we create a new object
            echo "Cool you created a new class instance - that is object <br>";

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