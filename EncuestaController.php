<?php

function addEncuesta(){
    if(isset($_POST['titulo'])&& !empty($_POST['titulo']) && (isset($_POST['descripcion'])&& !empty($_POST['descripcion']) &&
      (isset($_POST['multiple'])&& !empty($_POST['multiple'])){  //Evito errores de carga
        $tituloN = $_POST['titulo'];
        $descripcionN = $_POST['descripcion'];
        $multipleN = $_POST['multiple'];
        if($this->LoginController->isAdmin()){
            if(empty($this->EncuestaModel->getEncuestaByTitulo($tituloN))){ //No existe 
                $this->EncuestaModel->AddEncuesta($tituloN,$descripcionN,$multipleN);
                if($this->EncuestaModel->getMultipleById($id)==True){        //Es multiple
                    $opcion1 = 'Si';
                    $opcion2 = 'No';
                    $this->OpcionesModel->AddOpcion($id_encuesta, $opcion1);
                    $this->OpcionesModel->AddOpcion($id_encuesta, $opcion2);
                }
            }else{
                $this->EncuestaView->$ShowError('Ya existe una encuesta con este titulo');
                //Existe una encuesta con este titulo
            }
        }
        else{
            $this-> EncuestaView->$ShowError('El usuario no puede realizar esta accion');
            //El usuario no esta logeado o no es admin
        }
    }else{
        $this-> EncuestaView->$ShowError('Datos incompletos');
        //Datos incompletos
    }
}

function generarTabla($params = null){
        $id = $params[:ID];
        $encuesta = $this->EncuestaModel->getEncuestaById($id);
        $respuestas = $this->RespuestaModel->getRespuestaByIdEncuesta($id);
        $respuestaList = [];
        if(!empty($encuesta)){
            $tituloEncuesta = $encuesta -> $titulo;
            if(!empty($respuestas)){
               $opciones = $this->OpcionModel->getOpcionesByIdEncuesta($id);
                foreach($opciones as $opcion){
                    $nombreOpcion = $opcion -> $texto;
                    $respuestasByIdOpcion = $this -> respuestaModel-> getRespuestasByIdOption($opcion->$id);
                    $contador = 0;
                    for($respuestasByIdOpcion as $respuesta){
                        $contador++;
                    }
                    array_push($respuestaList, $nombreOpcion);  //Nombre de la opcion
                    array_push($respuestaList, $contador);  //Total de respuestas de la opcion
                }
                $totalRespuestas = count($respuestaList);
            }
            else{
                $this-> EncuestaView->$ShowError('La encuesta no tiene respuestas asociadas');
                //La encuesta no tiene respuestas asociadas
            }
        }else{
            $this-> EncuestaView->$ShowError('La encuesta no existe');
            //La encuesta no existe
        }
        
        $this->EncuestaView->ShowTable($tituloEncuesta, $respuestaList, $totalRespuestas);

    
}


function votarEncuesta($id){
    $encuesta = $this->EncuestaModel->getEncuestaByID($id);
    $isLogged = $this->LoginController->isLogged();
    if($isLogged){
        if(){

        }
    }
    $this-> EncuestaView->$ShowError('El usuario no esta logeado');
}