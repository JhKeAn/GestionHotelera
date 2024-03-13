<?php
    require_once 'Config/config.php';
    require_once 'Helpers/funciones.php';
    //CAPTURA LA URL ACTUAL
    //$CurrentPageUrl = $_SERVER['REQUEST_URI'];
    //VERIFICAR SI EXISTE LA RUTA ADMIN
    $isAdmin = strpos($_SERVER['REQUEST_URI'],'/'. ADMIN)!== false;
    //COMPROBAR SI EXISTE GET PARA CREAR URLS AMIGABLES :V
    $ruta = empty($_GET['url']) ? 'principal/index' : $_GET['url'] ;
    //CREAR URL ARRAY A PARTIR DE LA RUTA
    $array = explode('/', $ruta);
    //VALIDAR SI NOS ECONTRAMOS EN LA RUTA ADMIN
    if ($isAdmin && (count($array)== 1 || (count($array)== 2 && empty($array[1]))) 
        && $array[0] == ADMIN) 
    {
        $controller = 'Admin';
        $metodo = 'login';
    }
    else 
    {
        $indiceUrl = ($isAdmin)? 1 : 0;
        $controller = ucfirst($array[$indiceUrl]);
        $metodo = 'index';
    }
    //VALIDAR METODOS
   
    $metodoIndice = ($isAdmin)? 2 : 1;
    if(!empty($array[$metodoIndice]) && $array[$metodoIndice] != '')
    {
        $metodo = $array[$metodoIndice];
    }
    //VALIDAR PARAMETROS
    $parametro = '';
    $parametroIndice = ($isAdmin)? 3 : 1;
    if (!empty($array[$parametroIndice]) && $array[$parametroIndice] != '')
    {
        for ($i = $parametroIndice; $i < count($array) ; $i++)
        {
            $parametro = $array[$i] . ','; 
        }
        $parametro = trim($parametro, ',');
    }
    //LLAMAR AUTOLOAD
    require_once 'config/app/AutoLoad.php';
    //VALIDAR DIRECTORIO DE CONTROLADORES
    $dirController = ($isAdmin) ? 'Controllers/Admin/' . $controller . '.php':  'Controllers/Principal/' . $controller . '.php';
    if (file_exists($dirController))
    {
        require_once $dirController;
        $controller = new $controller();
        if (method_exists($controller,$metodo))
        {
            $controller->$metodo($parametro);
        }
    }
    else 
    {
        echo('metodo no existe ctmre');
    }
?>