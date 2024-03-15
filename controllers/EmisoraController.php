<?php

session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Emisora.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Transmision.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/EmitirPrograma.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/EmitirResumen.php";

class EmisoraController {

    public static function ejecutarAccion(){

        // Recuperamos el campo accion (boton guardar)
        $accion = @$_REQUEST["accion"];

        // Validamos si la accion es guardar

        switch ($accion) {
            case "Guardar":
                
                // Invocamos el metodo guardar
                EmisoraController::guardar();
                break;
            
            case "Buscar":
                
                // Invocamos el metodo buscar
                EmisoraController::buscar();
                break;

            case "Buscar":
                
                // Invocamos el metodo editar
                EmisoraController::editar();
                break;

            default:
                // si no, mandamos error
                header("Location: ../view/error.php?msj=Accion no permitida");
                exit;
        }
    }

    public static function guardar(){

        // Recuperar los campos
        $nombre = @$_REQUEST["nombre"];
        $frec = @$_REQUEST["frec"];
        $trasm = @$_REQUEST["trans"];

        // Crear una instancia de tipo Emisora
        $u = new Emisora();

        // Ponemos los campos como valores de las propiedades
        $u-> nombre = $nombre;
        $u-> frecuencia = $frec;
        $u-> transmision_id = $trasm;

        // Intentar guardar la emisora en la BD
        try {
            
            // Guardar la emisora
            $u->save();

            //contar las emisoras
            $total = @Emisora::count();
            $msj = "Emisora guardada correctamente, total: $total";

            // Redireccionar a la pagina guardar enviando un mensaje
            header("Location: ../view/emisoras/agregar.php?msj=$msj");
            exit;

        } 
        // Capturar algun posible error o excepcion
        catch (Exception $error) {
            
            // Verificar si el error es de PK duplicada
            if (strstr($error->getMessage(), "Duplicate")) {
                $msj = "La emisora $nombre ya existe";
            } else {
                
                // Otro mensaje si no es error por emisora duplicada
                $msj = "Ha ocurrido un error al Guardar la emisora";
            }

            // Redireccionar a la pagina con el mensaje de error
            header("Location: ../view/emisoras/agregar.php?msj=$msj");
            exit;
        }
    }

    public static function buscar(){

        // Recuparar los campos enviados por el formulario
        $nombre = @$_REQUEST["nombre"];

        // Intentar buscar la emisora en la BD
        try {
            
            // Buscamos la emisora
            $u = Emisora::find($nombre);

            // Colocamos la emisora en la sesion 
            $_SESSION["emisora.find"] = serialize($u);
            $msj = "Emisora encontrada";

            // Redireccionar la pagina al buscar, enviando un msj
            header("Location: ../view/emisoras/buscar.php?msj=$msj");
            exit;

        } 
        
        // Capturar algun posible error o excepcion
        catch (Exception $error) {
            
            // Verificar si la emisora existe mediante PK
            if (strtr($error->getMessage(), $nombre)) {
                $msj = "La emisora con Nombre: $nombre no existe";
            } else {
                
                // Otro msj si no es por no existencia
                $msj = "Ha ocurrido un error al Buscar la emisora";
            }

            // Redureccionamos a la pagina buscar con el mensaje de error
            $_SESSION["emisora.find"] = NULL;
            header("Location: ../view/emisoras/buscar.php?msj=$msj");
        }

    }

    public static function editar(){

        // Recuparar los campos enviados por el formulario
        $nombre = @$_REQUEST["nombre"];

        // Obtenemos el usuario consultado anteriormente
        $u = $_SESSION["emisora.find"];

        // Lo deserealizamos y reconvertimos en objeto tipo Emisora
        $u = unserialize($u);

        // Validamos que la emisora consultada sea la misma que se desea editar
        if ($u->nombre != $nombre) {
            $msj = "El nombre no corresponde con la Emisora consultada";
            header("Locate: ../view/emisoras/buscar.php?msj=$msj");
            exit;
        }

        // Recuperamos los campos cambiados en el formulario
        $nombre = @$_REQUEST["nombre"];
        $frec = @$_REQUEST["frec"];
        $trans = @$_REQUEST["trans"];

        // Los colocamos en el usuario consultado
        $u-> nombre = $nombre;
        $u-> frecuencia = $frec;
        $u-> transmision_id = $trans;

        // Intentar guardar los cambios de la emisora en la BD
        try {
            
            // Guardar la emisora
            $u-> save();

            // Volvemos a serializar la emisora editada y la guardamos en la sesion
            $_SESSION["emisora.find"] = serialize($u);
            $msj = "Emisora editada";

            // Redireccionar la pagina al buscar, enviando un msj
            header("Location: ../view/emisoras/buscar.php?msj=$msj");
            exit;

        } 
        
        // Capturar algun posible error o excepcion
        catch (Exception $error) {
            
            // Verificar si la emisora existe mediante PK
            if (strtr($error->getMessage(), $nombre)) {
                $msj = "La emisora con Nombre: $nombre no existe";
            } else {
                
                // Otro msj si no es por no existencia
                $msj = "Ha ocurrido un error al Editar la emisora";
            }

            // Redureccionamos a la pagina buscar con el mensaje de error
            $_SESSION["emisora.find"] = NULL;
            header("Location: ../view/emisoras/buscar.php?msj=$msj");
        }

    }

}

// Iniciamos el procesamiento de la accion
EmisoraController::ejecutarAccion();