<?php
    class House {
        //do stuff, properties and methods follow here
        private $primaryColor = 'black';
        public $secondaryColors = [
            'bathroom' => 'white',
            'bedroom' => 'light pink',
            'kitchen' => 'light blue'
        ];
        public $hasPool = false;
        public $extra;

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