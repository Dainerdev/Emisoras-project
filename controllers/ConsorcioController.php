<?php

session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Emisora.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Productora.php";

class ConsorcioController {

    public static function ejecutarAccion(){

        // Recuperamos el campo accion (boton guardar)
        $accion = @$_REQUEST["accion"];

        // Validamos si la accion es guardar

        switch ($accion) {
            case "Guardar":
                
                // Invocamos el metodo guardar
                ConsorcioController::guardar();
                break;
            
            case "Buscar":
                
                // Invocamos el metodo buscar
                ConsorcioController::buscar();
                break;

            case "Editar":
                
                // Invocamos el metodo editar
                ConsorcioController::editar();
                break;

            case "Eliminar":

                // Invocamos el metodo eliminar
                ConsorcioController::eliminar();
                break;

            case "todo":

                // Invocamos el metodo listar todo
                ConsorcioController::listarTodo();
                break;   

            default:
                // si no, mandamos error
                header("Location: ../../view/error.php?msj=Acción no permitida");
                exit;
        }
    }

    public static function guardar(){

        // Recuperar los campos
        $emi = @$_REQUEST["emi"];
        $produ = @$_REQUEST["produ"];

        // Crear una instancia de tipo Consorcio
        $u = new Consorcio();

        // Ponemos los campos como valores de las propiedades
        $u-> emisora_id = $emi;
        $u-> productora_id = $produ;

        $cons = Consorcio::find('first', array('conditions' => array('emisora_id = ? AND productora_id = ?', $emi, $produ)));

        if ($cons) {
            
            $msj = "El Consorcio que intentas guardar ya existe";

            // Redireccionar a la pagina guardar enviando un mensaje
            header("Location: ../view/forms/consorcios/agregar.php?msj=$msj");
            exit;
        }

        // Intentar guardar el consorcio en la BD
        try {
            
            // Guardar la Consorcio
            $u->save();

            //contar las Consorcio
            $total = @Consorcio::count();
            $msj = "Consorcio guardado correctamente, total: $total";

            // Redireccionar a la pagina guardar enviando un mensaje
            header("Location: ../view/forms/consorcios/agregar.php?msj=$msj");
            exit;

        } 
        // Capturar algun posible error o excepcion
        catch (Exception $error) {
            
            
            // Verificar si el error es de PK duplicada
            if (strstr($error->getMessage(), "Duplicate")) {

                $msj = "El consorcio ya existe";

            } else {
                
                // Otro mensaje si no es error por consorcio duplicado
                $msj = "Ha ocurrido un error al Guardar la consorcio";
            }

            // Redireccionar a la pagina con el mensaje de error
            header("Location: ../view/forms/consorcios/agregar.php?msj=$msj");
            exit;
        }
    }

    public static function buscar(){

        // Recuparar los campos enviados por el formulario
        $emi = @$_REQUEST["emi"];        
        $produ = @$_REQUEST["produ"];

        // Intentar buscar el consorcio en la BD
        try {
            
            // Buscamos el consorcio
            $u = Consorcio::find('first', array('conditions' => array('emisora_id = ? AND productora_id = ?', $emi, $produ)));

            if ($u) {

                // Colocamos el consorcio en la sesion 
                $_SESSION["consorcio.find"] = serialize($u);
                $msj = "Consorcio encontrado";
    
                // Redireccionar la pagina al buscar, enviando un msj
                header("Location: ../view/forms/consorcios/buscar.php?msj=$msj");
                exit;
    
                $_SESSION["consorcio.find"] = NULL;
                header("Location: ../view/forms/consorcios/buscar.php");
                exit;
                
            }
        } 
        
        // Capturar algun posible error o excepcion
        catch (Exception $error) {
            
            // Verificar si el consorcio existe mediante PK
            if (strtr($error->getMessage(), $emi)) {
                // msj si no es por no existencia
                $msj = "Ha ocurrido un error al Buscar el consorcio";

            } 
            else {
                // Otro msj si no existe
                $msj = "El consorcio no existe";
            }

            // Redureccionamos a la pagina buscar con el mensaje de error
            $_SESSION["consorcio.find"] = NULL;
            header("Location: ../view/forms/consorcios/buscar.php?msj=$msj");
        }

    }

    public static function editar(){

        // Recuparar los campos enviados por el formulario
        $emi = @$_REQUEST["emi"];

        // Obtenemos el usuario consultado anteriormente
        $u = $_SESSION["consorcio.find"];

        // Lo deserealizamos y reconvertimos en objeto tipo consorcio
        $u = unserialize($u);

        // Validamos que el consorcio consultada sea la misma que se desea editar
        if ($u->emisora_id != $emi) {
            $msj = "El nombre no corresponde con el Consorcio consultado";
            header("Locate: ../view/consorcios/forms/buscar.php?msj=$msj");
            exit;
        }

        // Recuperamos los campos cambiados en el formulario
        $emi = @$_REQUEST["emi"];
        $produ = @$_REQUEST["produ"];

        // Los colocamos en el usuario consultado
        $u-> emisora_id = $emi;
        $u-> productora_id = $produ;

        $cons = Consorcio::find('first', array('conditions' => array('emisora_id = ? AND productora_id = ?', $emi, $produ)));

        if ($cons) {
            
            $msj = "El Consorcio que intentas editar ya existe";

            // Redireccionar a la pagina editar enviando un mensaje
            header("Location: ../view/forms/consorcios/buscar.php?msj=$msj");
            exit;
        }

        // Intentar guardar los cambios de el consorcio en la BD
        try {
            
            // Guardar el consorcio
            $u-> save();

            // Volvemos a serializar el consorcio editada y lo guardamos en la sesion
            $_SESSION["consorcio.find"] = serialize($u);
            $msj = "Consorcio editado";

            // Redireccionar la pagina al buscar, enviando un msj
            header("Location: ../view/forms/consorcios/buscar.php?msj=$msj");
            exit;

        } 
        
        // Capturar algun posible error o excepcion
        catch (Exception $error) {
            
            // Verificar si el consorcio existe mediante PK
            if (strtr($error->getMessage(), $emi)) {
                $msj = "El consorcio con Emisora: $emi no existe";
            } else {
                
                // Otro msj si no es por no existencia
                $msj = "Ha ocurrido un error al Editar el consorcio";
            }

            // Redureccionamos a la pagina buscar con el mensaje de error
            $_SESSION["consorcio.find"] = NULL;
            header("Location: ../view/forms/consorcios/buscar.php?msj=$msj");
            exit;
        }

    }

    public static function eliminar(){

        // Recuparar los campos enviados por el formulario
        $emi = @$_REQUEST["emi"];

        // Obtenemos el usuario consultado anteriormente
        $u = $_SESSION["consorcio.find"];

        // Lo deserealizamos y reconvertimos en objeto tipo consorcio
        $u = unserialize($u);

        // Validamos que el consorcio consultada sea la misma que se desea editar
        if ($u->emisora_id != $emi) {
            $msj = "El nombre no corresponde con el consorcio consultado";
            header("Locate: ../view/forms/consorcios/buscar.php?msj=$msj");
            exit;
        }

        // Intentar eliminar el consorcio de la BD
        try {
            
            // Guardar el consorcio
            $u-> delete();

            // Quitamos de la sesion el consorcio consultado
            $_SESSION["consorcio.find"] = NULL;

            // Contamos los consorcios de la BD
            $total = Consorcio::count();
            $msj = "Consorcio eliminado, Total: $total";

            // Redireccionar la pagina al buscar, enviando un msj
            header("Location: ../view/forms/consorcios/buscar.php?msj=$msj");
            exit;

        } 
        
        // Capturar algun posible error o excepcion
        catch (Exception $error) {
            
            // Verificar si el consorcio existe mediante PK
            if (strtr($error->getMessage(), $emi)) {
                $msj = "El consorcio con Emisora: $emi no existe";
            } else {
                
                // Otro msj si no es por no existencia
                $msj = "Ha ocurrido un error al Eliminar el consorcio";
            }

            // Redureccionamos a la pagina buscar con el mensaje de error
            $_SESSION["consorcio.find"] = NULL;
            header("Location: ../view/forms/consorcios/buscar.php?msj=$msj");
            exit;
        }

    }

    public static function listarTodo(){

        try {  
                      
            // Obtenemos todos los consorcios
            $consorcios = Consorcio::all();

            if ($consorcios == NULL) {

                $_SESSION["consorcios.all"];
                $msj = "Total Consorcios: 0";
            } else {
                $total = count($consorcios) -1;

                // Convertimos a texto (serializamos)
                $consorcios = serialize($consorcios);

                /*  Colocamos la lista de consorcios en la sesion para poder
                    recuperarla en la pagina de reporte de consorcios
                */
                $_SESSION["consorcios.all"] = $consorcios;
            }

            // Redireccionamos a la pagina de reportes
            $msj = "Total Consorcios: $total";
            header("Location: ../view/forms/consorcios/listarConsorcios.php?msj=$msj");

        } catch (Exception $error) {
            $_SESSION["consorcios.all"] = NULL;
            header("Location: ../view/forms/consorcios/listarConsorcios.php?msj=Total Consorcios: 0");

        }
    }

}

// Iniciamos el procesamiento de la accion
ConsorcioController::ejecutarAccion();