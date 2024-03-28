<?php

    session_start();
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Programa.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Encuesta.php";

class EncuestaController {

    public static function ejecutarAccion(){

        $accion = @$_REQUEST["accion"];

        switch ($accion) {
            case 'Guardar':
                
                // Invocamos el metodo guardar
                EncuestaController::guardar();
                break;

            case 'Buscar':

                // Invocamos el metodo buscar
                EncuestaController::buscar();
                break;

            case 'Editar':
                
                // Invocamos el metodo editar
                EncuestaController::editar();
                break;

            case 'Eliminar':
                
                // Invocamos el metodo eliminar
                EncuestaController::eliminar();
                break;

            case 'todo':
                
                // Invocamos el metodo listar todo
                EncuestaController::listarTodo();
                break;   
                
            default:
                // mandar error
                header("Location: ../../view/error.php?msj=Acción no permitida");
                exit;
        }
    }

    public static function guardar(){
        
        // Recuperar los campos
        $fecha = @$_REQUEST["fecha"];
        $aprov = @$_REQUEST["aprov"];
        $indif = @$_REQUEST["indif"];
        $rech = @$_REQUEST["rech"];
        $tEncu = @$_REQUEST["tEncu"];
        $prog = @$_REQUEST["prog"];

        // Crear una instancia
        $p = new Encuesta();

        // Ponemos los campos como valores de las propiedades
        $p-> fecha = $fecha;
        $p-> aprovaciones = $aprov;
        $p-> indiferencias = $indif;
        $p-> rechazos = $rech;
        $p-> totalencuestados = $tEncu;
        $p-> programaid = $prog;

        if (empty($prog)) {
            $msj = "Por favor, complete todos los campos.";
            // Redireccionar a la pagina guardar enviando un mensaje
            header("Location: ../view/forms/encuestas/agregar.php?msj=$msj");
            exit;

        } else{


            // Intentar guardar la encuesta en la BD
            try {
                
                // Guardar la encuesta
                $p->save();

                //contar las encuesta
                $total = @Encuesta::count();
                $msj = "Encuesta guardada correctamente, total: $total";

                // Redireccionar a la pagina guardar enviando un mensaje
                header("Location: ../view/forms/encuestas/agregar.php?msj=$msj");
                exit;

            } 
            // Capturar algun posible error o excepcion
            catch (Exception $error) {            
                
                // Verificar si el error es de PK duplicada
                if (strstr($error->getMessage(), "Duplicate")) {

                    $msj = "La encuesta ya existe";

                } else {
                    
                    // Otro mensaje si no es error por encuesta duplicada
                    $msj = "Ha ocurrido un error al Guardar la encuesta";
                }

                // Redireccionar a la pagina con el mensaje de error
                header("Location: ../view/forms/encuestas/agregar.php?msj=$msj");
                exit;
            }
        }    
    }

    public static function buscar() {

        // Recuparar los campos enviados por el formulario
        $fecha = @$_REQUEST["date"];
        $aprov = @$_REQUEST["aprov"];
        $indif = @$_REQUEST["indif"];
        $rech = @$_REQUEST["rech"];
        $tEncu = @$_REQUEST["tEncu"];
        $prog = @$_REQUEST["prog"];

        // Intentar buscar la encuesta en la BD
        try {
            
            // Buscamos la encuesta
            $u = Encuesta::find('first', array('conditions' => array(
                'fecha = ? AND aprobaciones = ? AND indiferencias = ? 
                AND rechazos = ? AND totalencuestados = ? AND programaid = ?',
                $fecha, $aprov, $indif, $rech, $tEncu, $prog)));



            // Colocamos la encuesta en la sesion 
            $_SESSION["encuesta.find"] = serialize($u);
            $msj = "Encuesta encontrada";

            // Redireccionar la pagina al buscar, enviando un msj
            header("Location: ../view/forms/encuestas/buscar.php?msj=$msj");
            exit;

            $_SESSION["encuesta.find"] = NULL;
            header("Location: ../view/forms/encuestas/buscar.php");
            exit;
            
        }
        // Capturar algun posible error o excepcion
        catch (ActiveRecord\RecordNotFound $error) {
            
            $msj = "La encuesta no existe";
        }   catch(Exception $error) {

            $msj = "Ha ocurrido un error al Buscar la encuesta";
        }
    }

    public static function editar() {

        // Recuparar los campos enviados por el formulario
        $id = @$_REQUEST["id"];

        // Obtenemos el usuario consultado anteriormente
        $u = $_SESSION["encuesta.find"];

        // Lo deserealizamos y reconvertimos en objeto tipo Emisora
        $u = unserialize($u);

        // Validamos que la emisora consultada sea la misma que se desea editar
        if ($u-> id != $id) {
            $msj = "El ID no corresponde con la Encuesta consultada";
            header("Locate: ../view/encuestas/forms/buscar.php?msj=$msj");
            exit;
        }

        // Recuperamos los campos cambiados en el formulario
        $fecha = @$_REQUEST["fecha"];
        $aprov = @$_REQUEST["aprov"];
        $indif = @$_REQUEST["indif"];
        $rech = @$_REQUEST["rech"];
        $tEncu = @$_REQUEST["tEncu"];
        $prog = @$_REQUEST["prog"];

        // Los colocamos en el usuario consultado
        $u-> fecha = $fecha;
        $u-> aprovaciones = $aprov;
        $u-> indiferencias = $indif;
        $u-> rechazos = $rech;
        $u-> totalenuestados = $tEncu;
        $u-> programaid = $prog;


        // Intentar guardar los cambios de la encuesta en la BD
        try {
            
            // Guardar la encuesta
            $u-> save();

            // Volvemos a serializar la encuesta editada y la guardamos en la sesion
            $_SESSION["encuesta.find"] = serialize($u);
            $msj = "Encuesta editada";

            // Redireccionar la pagina al buscar, enviando un msj
            header("Location: ../view/forms/encuestas/buscar.php?msj=$msj");
            exit;
        } 

        // Capturar algun posible error o excepcion
        catch (Exception $error) {
            
            // Verificar si la encuesta existe mediante PK
            if (strtr($error->getMessage(), $id)) {
                $msj = "La encuesta con ID: $id no existe";
            } else {
                
                // Otro msj si no es por no existencia
                $msj = "Ha ocurrido un error al Editar la encuesta";
            }

            // Redureccionamos a la pagina buscar con el mensaje de error
            $_SESSION["encuesta.find"] = NULL;
            header("Location: ../view/forms/encuestas/buscar.php?msj=$msj");
            exit;
        }
    }

    public static function eliminar() {

        // Recuparar los campos enviados por el formulario
        $id = @$_REQUEST["id"];

        // Obtenemos el usuario consultado anteriormente
        $u = $_SESSION["encuesta.find"];

        // Lo deserealizamos y reconvertimos en objeto tipo encuesta
        $u = unserialize($u);

        // Validamos que la encuesta consultada sea la misma que se desea editar
        if ($u->id != $id) {
            $msj = "El ID no corresponde con la Encuesta consultada";
            header("Locate: ../view/forms/encuestas/buscar.php?msj=$msj");
            exit;
        }

        // Intentar eliminar la encuesta de la BD
        try {
            
            // Eliminar la encuesta
            $u-> delete();

            // Quitamos de la sesion la encuesta consultado
            $_SESSION["encuesta.find"] = NULL;

            // Contamos las encuesta de la BD
            $total = Encuesta::count();
            $msj = "Encuesta eliminada, Total: $total";

            // Redireccionar la pagina al buscar, enviando un msj
            header("Location: ../view/forms/encuestas/buscar.php?msj=$msj");
            exit;
        } 

        // Capturar algun posible error o excepcion
        catch (Exception $error) {
            
            // Verificar si la encuesta existe mediante PK
            if (strtr($error->getMessage(), $id)) {
                $msj = "La encuesta con Nombre: $id no existe";
            } else {
                
                // Otro msj si no es por no existencia
                $msj = "Ha ocurrido un error al Eliminar la encuesta";
            }

            // Redureccionamos a la pagina buscar con el mensaje de error
            $_SESSION["encuesta.find"] = NULL;
            header("Location: ../view/forms/encuestas/buscar.php?msj=$msj");
            exit;
        }
    }

    public static function listarTodo() {

        try {     

            // Obtenemos todas la encuesta
            $encuestas = Encuesta::all();

            if ($encuestas == NULL) {
                $_SESSION["encuestas.all"];
                $msj = "Total Encuesta: 0";
            } else {
                $total = count($encuestas);

                // Convertimos a texto (serializamos)
                $encuestas = serialize($encuestas);

                /*  Colocamos la lista de encuestas en la sesion para poder
                    recuperarla en la pagina de reporte de encuestas
                */
                $_SESSION["encuestas.all"] = $encuestas;
            }

            // Redireccionamos a la pagina de reportes
            $msj = "Total Encuestas: $total";
            header("Location: ../view/forms/encuestas/listarEncuestas.php?msj=$msj");
        }   catch (Exception $error) {

            $_SESSION["encuestas.all"] = NULL;
            header("Location: ../view/forms/encuestas/listarEncuestas.php?msj=Total Productora: 0");
        }
    }

}

EncuestaController::ejecutarAccion();