<?php

session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Productora.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Persona.php";

class ProductoraController {

    public static function ejecutarAccion(){

        $accion = @$_REQUEST["accion"];

        switch ($accion) {
            case 'Guardar':
                
                // Invocamos el metodo guardar
                ProductoraController::guardar();
                break;

            case 'Buscar':

                // Invocamos el metodo buscar
                ProductoraController::buscar();
                break;

            case 'Editar':
                
                // Invocamos el metodo editar
                ProductoraController::editar();
                break;

            case 'Eliminar':
                
                // Invocamos el metodo eliminar
                ProductoraController::eliminar();
                break;

            case 'todo':
                
                // Invocamos el metodo listar todo
                ProductoraController::listarTodo();
                break;   
                
            default:
                // mandar error
                header("Location: ../../view/error.php?msj=Acción no permitida");
                exit;
        }
    }

    public static function guardar(){
        
        // Recuperar los campos
        $rfc = @$_REQUEST["rfc"];
        $nombre = @$_REQUEST["nombre"];
        $tel = @$_REQUEST["tel"];

        // Crear una instancia
        $p = new Productora();

        // Ponemos los campos como valores de las propiedades
        $p-> rfc = $rfc;
        $p-> nombre = $nombre;
        $p-> telefono = $tel;

        // Intentar guardar la productora en la BD
        try {
            
            // Guardar la productora
            $p->save();

            //contar las productoras
            $total = @Productora::count();
            $msj = "Productora guardada correctamente, total: $total";

            // Redireccionar a la pagina guardar enviando un mensaje
            header("Location: ../view/forms/productoras/agregar.php?msj=$msj");
            exit;

        } 
        // Capturar algun posible error o excepcion
        catch (Exception $error) {            
            
            // Verificar si el error es de PK duplicada
            if (strstr($error->getMessage(), "Duplicate")) {

                $msj = "La productora $rfc ya existe";

            } else {
                
                // Otro mensaje si no es error por productora duplicada
                $msj = "Ha ocurrido un error al Guardar la productora";
            }

            // Redireccionar a la pagina con el mensaje de error
            header("Location: ../view/forms/productoras/agregar.php?msj=$msj");
            exit;
        }


    }

    public static function buscar() {

        // Recuparar los campos enviados por el formulario
        $rfc = @$_REQUEST["rfc"];

        // Intentar buscar la emisora en la BD
        try {
            
            // Buscamos la productora
            $u = Productora::find($rfc);

            // Colocamos la productora en la sesion 
            $_SESSION["productora.find"] = serialize($u);
            $msj = "Productora encontrada";

            // Redireccionar la pagina al buscar, enviando un msj
            header("Location: ../view/forms/productoras/buscar.php?msj=$msj");
            exit;

            $_SESSION["productora.find"] = NULL;
            header("Location: ../view/forms/productoras/buscar.php");
            exit;
            
        }
        // Capturar algun posible error o excepcion
        catch (Exception $error) {
            
            // Verificar si la emisora existe mediante PK
            if (strtr($error->getMessage(), $rfc)) {
                // msj si no es por no existencia
                $msj = "Ha ocurrido un error al Buscar la productora";

            } 
            else {
                // Otro msj si no existe
                $msj = "La productora con RFC: $rfc no existe";
            }

            // Redureccionamos a la pagina buscar con el mensaje de error
            $_SESSION["productora.find"] = NULL;
            header("Location: ../view/forms/productoras/buscar.php?msj=$msj");
        }

    }

    public static function editar() {

        // Recuparar los campos enviados por el formulario
        $rfc = @$_REQUEST["rfc"];

        // Obtenemos el usuario consultado anteriormente
        $u = $_SESSION["productora.find"];

        // Lo deserealizamos y reconvertimos en objeto tipo Emisora
        $u = unserialize($u);

        // Validamos que la emisora consultada sea la misma que se desea editar
        if ($u-> rfc != $rfc) {
            $msj = "El RFC no corresponde con la Productora consultada";
            header("Locate: ../view/productoras/forms/buscar.php?msj=$msj");
            exit;
        }

        // Recuperamos los campos cambiados en el formulario
        $rfc = @$_REQUEST["rfc"];
        $nombre = @$_REQUEST["nombre"];
        $tel = @$_REQUEST["tel"];

        // Los colocamos en el usuario consultado
        $u-> rfc = $rfc;
        $u-> nombre = $nombre;
        $u-> telefono = $tel;

        // Intentar guardar los cambios de la productora en la BD
        try {
            
            // Guardar la productora
            $u-> save();

            // Volvemos a serializar la productora editada y la guardamos en la sesion
            $_SESSION["prductora.find"] = serialize($u);
            $msj = "Productora editada";

            // Redireccionar la pagina al buscar, enviando un msj
            header("Location: ../view/forms/productoras/buscar.php?msj=$msj");
            exit;
        } 

        // Capturar algun posible error o excepcion
        catch (Exception $error) {
            
            // Verificar si la productora existe mediante PK
            if (strtr($error->getMessage(), $rfc)) {
                $msj = "La productora con RFC: $rfc no existe";
            } else {
                
                // Otro msj si no es por no existencia
                $msj = "Ha ocurrido un error al Editar la productora";
            }

            // Redureccionamos a la pagina buscar con el mensaje de error
            $_SESSION["productora.find"] = NULL;
            header("Location: ../view/forms/productoras/buscar.php?msj=$msj");
            exit;
        }
    }

    public static function eliminar() {

        // Recuparar los campos enviados por el formulario
        $rfc = @$_REQUEST["rfc"];

        // Obtenemos el usuario consultado anteriormente
        $u = $_SESSION["productora.find"];

        // Lo deserealizamos y reconvertimos en objeto tipo productora
        $u = unserialize($u);

        // Validamos que la productora consultada sea la misma que se desea editar
        if ($u->rfc != $rfc) {
            $msj = "El RFC no corresponde con la Productora consultada";
            header("Locate: ../view/forms/productoras/buscar.php?msj=$msj");
            exit;
        }

        // Intentar eliminar la productora de la BD
        try {
            
            // Eliminar la productora
            $u-> delete();

            // Quitamos de la sesion la productora consultado
            $_SESSION["productora.find"] = NULL;

            // Contamos las productora de la BD
            $total = Productora::count();
            $msj = "Productora eliminada, Total: $total";

            // Redireccionar la pagina al buscar, enviando un msj
            header("Location: ../view/forms/productoras/buscar.php?msj=$msj");
            exit;
        } 

        // Capturar algun posible error o excepcion
        catch (Exception $error) {
            
            // Verificar si la productora existe mediante PK
            if (strtr($error->getMessage(), $rfc)) {
                $msj = "La productora con Nombre: $rfc no existe";
            } else {
                
                // Otro msj si no es por no existencia
                $msj = "Ha ocurrido un error al Eliminar la productora";
            }

            // Redureccionamos a la pagina buscar con el mensaje de error
            $_SESSION["productora.find"] = NULL;
            header("Location: ../view/forms/productoras/buscar.php?msj=$msj");
            exit;
        }
    }

    public static function listarTodo() {

        try {     

            // Obtenemos todas la productora
            $productoras = Productora::all();
            if ($productoras == NULL) {
                $_SESSION["productoras.all"];
                $msj = "Total Productora: 0";
            } else {
                $total = count($productoras) -1;

                // Convertimos a texto (serializamos)
                $productoras = serialize($productoras);

                /*  Colocamos la lista de productoras en la sesion para poder
                    recuperarla en la pagina de reporte de productoras
                */
                $_SESSION["productoras.all"] = $productoras;
            }

            // Redireccionamos a la pagina de reportes
            $msj = "Total Productoras: $total";
            header("Location: ../view/forms/productoras/listarProductoras.php?msj=$msj");
        }   catch (Exception $error) {

            $_SESSION["productoras.all"] = NULL;
            header("Location: ../view/forms/productoras/listarProductoras.php?msj=Total Productora: 0");
        }
    }
}

// Iniciamos el procesamiento de la accion
ProductoraController::ejecutarAccion();