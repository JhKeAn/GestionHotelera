<?php
    class Servicio extends Controller
    {
        public function __construct(){
            parent::__construct();
        }
        function index()
        {
            $data['title'] = 'Servicio';
            $data['subtitle'] = 'Nuestro servicio';
            $this->views->getView('Principal/Servicio/index',$data);
           // $this->views->getView('Principal', 'index', $data);
        }
    }//VIDEO 8
?>