<?php
    class Principal extends Controller
    {
        public function __construct(){
            parent::__construct();
        }
        function index()
        {
            $data['title'] = 'Pagina Principal';         
            //TRAER SLIDER
            $data['sliders'] = $this->model->getSliders();
            //TRAER habitaciones
            $data['habitaciones'] = $this->model->getHabitaciones();
            $this->views->getView('index',$data);
        }
       
    }//VIDEO 19 GAAAA
?>