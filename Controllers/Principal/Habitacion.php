<?php
    class Habitacion extends Controller
    {
        public function __construct(){
            parent::__construct();
        }
        function index()
        {
            $data['title'] = 'Habitaciones';
            $data['subtitle'] = 'Habitaciones con estilo';
            $this->views->getView('Principal/Habitacion/index',$data);
           // $this->views->getView('Principal', 'index', $data);
        }
    }//VIDEO 8
?>