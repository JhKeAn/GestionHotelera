<?php
    class Contacto extends Controller
    {
        public function __construct(){
            parent::__construct();
        }
        function index()
        {
            $data['title'] = 'Contacto';
            $data['subtitle'] = 'Contactenos';
            $this->views->getView('Principal/Contacto/index',$data);
           // $this->views->getView('Principal', 'index', $data);
        }
    }//VIDEO 8
?>