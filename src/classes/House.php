<?php
    class House {
        //do stuff, properties and methods follow here
        public $primaryColor = 'black';
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
    }