<?php
    class Reservamodel extends Query{
       
        public function __construct() {
            parent::__construct();            
        }
        //recuperar los slider
       
        
       public function getDisponible($f_llegada, $f_salida, $habitacion){
            return $this->selectAll("
            select*from reservas
             where fecha_ingreso <= '$f_salida'
             and fecha_salida >= '$f_llegada'
             and id_habitacion = $habitacion");
        }
        
        public function getReservasHabitacion($habitacion){
            return $this->selectAll("
            select*from reservas
            where id_habitacion = $habitacion");
        }    
    }
?>