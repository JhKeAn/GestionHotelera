<?php 
    class Controller{
        protected $model,$views ;
        public function __construct()
        {
            $this->views = new Views();
            $this->cargarModel();
        }
        public function cargarModel(){     
        $isAdmin = strpos($_SERVER['REQUEST_URI'],'/'. ADMIN)!== false;
        $Nombremodel = get_class($this). 'Model';
        $ruta = ($isAdmin) ? 'models/admin/' . $Nombremodel . '.php' : 'models/principal/' . $Nombremodel . '.php';
        if (file_exists($ruta)) 
        {
            require_once $ruta;
            $this->model=new $Nombremodel();
        }
    }
}
?>