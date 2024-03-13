<?php
    class PrincipalModel extends Query{
       
        public function __construct() {
            parent::__construct();            
        }
        //recuperar los slider
        public function getSliders(){
           return $this->selectAll("select*from sliders");
            
        }
        //recuperar habitaciones
        public function getHabitaciones(){
            return $this->selectAll("select*from habitaciones");
            
         }
    }
?>