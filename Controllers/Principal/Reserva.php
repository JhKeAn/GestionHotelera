<?php
    class Reserva extends Controller
    {
        public function __construct(){
            parent::__construct();
        }
        public function verify(){
            if(isset($_GET['fechallegada']) && isset($_GET['fechasalida']) && isset($_GET['habitacion']))         
            $f_llegada = strClean($_GET['fechallegada']);
           $f_salida = strClean($_GET['fechasalida']);
           $habitacion = strClean($_GET['habitacion']);
            if(empty( $f_llegada)||empty( $f_salida)||empty( $habitacion)){
                header('Location: ' . RUTA_PRINCIPAL . '?respuesta=warning');
            }else{
                $data['reserva']=$this->model->getDisponible( $f_llegada,$f_salida,$habitacion);
                $data['title'] = 'reservas';
                $data['subtitle'] = 'verificar';
                $data['disponible'] = 
                [
                    'fechallegada' => $f_llegada,
                    'fechasalida' => $f_salida,
                    'habitacion' => $habitacion
                ];
                $this->views->getView('Principal/Reservas',$data);
            }
            
           

          /*  $data=$this->model->getDisponible($f_llegada,$f_salida,$habitacion);
            print_r($data);*/
        }

        public function listar($datos){
            $array = explode(',',$datos);
            $f_llegada = (!empty($array[0])) ? $array[0] : null;
            $f_salida = (!empty($array[1])) ? $array[1] : null;
            $habitacion = (!empty($array[2])) ? $array[2] : null;
            $result= [];
            if($f_llegada != null && $f_llegada != null && $habitacion != null)
            {
                $reservas=$this->model->getReservasHabitacion($habitacion);               
                for ($i=0; $i < count($reservas); $i++) { 
                    $datos['id'] = $reservas[$i]['id'];
                    $datos['title'] = 'ocupado';
                    $datos['start'] = $reservas[$i]['fecha_ingreso'];
                    $datos['end'] = $reservas[$i]['fecha_salida'];
                    array_push($result,$datos);
                }
                $data['id'] = $habitacion;
                $data['title'] = 'ocupado';
                $data['start'] = $f_llegada;
                $data['end'] = $f_salida;    
                array_push($result,$data);
                echo json_encode($result,JSON_UNESCAPED_UNICODE);
            }
            die();
        }
    }//VIDEO 8
?>