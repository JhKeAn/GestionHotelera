<?php
    class Blog extends Controller
    {
        public function __construct(){
            parent::__construct();
        }
        function index()
        {
            $data['title'] = 'Blog';
            $data['subtitle'] = 'Entradas';
            $this->views->getView('Principal/Blog/index',$data);
           // $this->views->getView('Principal', 'index', $data);
        }
    }//VIDEO 8
?>