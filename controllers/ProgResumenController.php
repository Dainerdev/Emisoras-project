<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/ProgramaResumen.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Programa.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/EmitirResumen.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Persona.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/ResumenRealizar.php";

class ProgResumenController {

    public static function ejecutarAccion(){

        // Recuperamos el campo accion (boton guardar)
        $accion = @$_REQUEST["accion"];

        // Validamos si la accion es guardar

        switch ($accion) {
            case "Guardar":
                
                // Invocamos el metodo guardar
                ProgResumenController::guardar();
                break;
            
            case "Buscar":
                
                // Invocamos el metodo buscar
                ProgResumenController::buscar();
                break;

            case "Editar":
                
                // Invocamos el metodo editar
                ProgResumenController::editar();
                break;

            case "Eliminar":
                // Invocamos el metodo eliminar
                ProgResumenController::eliminar();
                break;

            case "todo":
                // Invocamos el metodo listar todo
                ProgResumenController::listarTodo();
                break;   

            default:
                // si no, mandamos error
                header("Location: ../../view/error.php?msj=Acción no permitida");
                exit;
        }
    }

    public static function guardar(){

        // Recuperar los campos
        $nombre = @$_REQUEST["nombre"];
        $prog = @$_REQUEST["prog"];
        $cons = @$_REQUEST["cons"];

        // Crear una instancia de tipo programa
        $u = new ProgramaResumen();

        // Ponemos los campos como valores de las propiedades
        $u-> nombre = $nombre;
        $u-> programa_id = $prog;
        $u-> consorcio_id = $cons;

        // Intentar guardar el programa en la BD
        try {
            
            // Guardar el programa
            $u->save();

            //contar el programa
            $total = @ProgramaResumen::count();
            $msj = "Programa Resumen guardado correctamente, total: $total";

            // Redireccionar a la pagina guardar enviando un mensaje
            header("Location: ../view/forms/progResumen/agregar.php?msj=$msj");
            exit;

        } 
        // Capturar algun posible error o excepcion
        catch (Exception $error) {
            
            
            // Verificar si el error es de PK duplicada
            if (strstr($error->getMessage(), "Duplicate")) {

                $msj = "El programa resumen ya existe";

            } else {
                
                // Otro mensaje si no es error por programa duplicado
                $msj = "Ha ocurrido un error al Guardar el programa resumen";
            }

            // Redireccionar a la pagina con el mensaje de error
            header("Location: ../view/forms/progResumen/agregar.php?msj=$msj");
            exit;
        }
    }

    public static function buscar(){

        // Recuparar los campos enviados por el formulario
        $nombre = @$_REQUEST["nombre"];

        // Intentar buscar el programa en la BD
        try {
            
            // Buscamos el programa
            $u = ProgramaResumen::find('first', array('conditions' => array('nombre = ?', $nombre)));

            // Colocamos el programa en la sesion 
            $_SESSION["progResumen.find"] = serialize($u);
            $msj = "Programa resumen encontrado";
    
            // Redireccionar la pagina al buscar, enviando un msj
            header("Location: ../view/forms/progResumen/buscar.php?msj=$msj");
            exit;
    
            $_SESSION["progResumen.find"] = NULL;
            header("Location: ../view/forms/progResumen/buscar.php");
            exit;
                
        } 
        
        // Capturar algun posible error o excepcion
        catch (Exception $error) {
            
            // Verificar si el programa existe mediante PK
            if (strtr($error->getMessage(), $nombre)) {
                // msj si no es por no existencia
                $msj = "Ha ocurrido un error al Buscar el programa resumen";

            } 
            else {
                // Otro msj si no existe
                $msj = "El programa resumen con Nombre: $nombre no existe";
            }

            // Redureccionamos a la pagina buscar con el mensaje de error
            $_SESSION["progResumen.find"] = NULL;
            header("Location: ../view/forms/progResumen/buscar.php?msj=$msj");
        }
    }

    public static function editar(){

        // Recuparar los campos enviados por el formulario
        $nombre = @$_REQUEST["nombre"];

        // Obtenemos el usuario consultado anteriormente
        $u = $_SESSION["progResumen.find"];

        // Lo deserealizamos y reconvertimos en objeto tipo programa
        $u = unserialize($u);

        // Validamos que el programa consultada sea la misma que se desea editar
        if ($u->nombre != $nombre) {
            $msj = "El nombre no corresponde con el Programa resumen consultado";
            header("Locate: ../view/progResumen/forms/buscar.php?msj=$msj");
            exit;
        }

        // Recuperamos los campos cambiados en el formulario
        $nombre = @$_REQUEST["nombre"];
        $prog = @$_REQUEST["prog"];
        $cons = @$_REQUEST["cons"];

        // Los colocamos en el programa consultado
        $u-> nombre = $nombre;
        $u-> programa_id = $prog;
        $u-> consorcio_id = $cons;

        // Intentar guardar los cambios de el programa en la BD
        try {
            
            // Guardar el programa
            $u-> save();

            // Volvemos a serializar el programa editada y lo guardamos en la sesion
            $_SESSION["progResumen.find"] = serialize($u);
            $msj = "Programa resumen editado";

            // Redireccionar la pagina al buscar, enviando un msj
            header("Location: ../view/forms/progResumen/buscar.php?msj=$msj");
            exit;

        } 
        
        // Capturar algun posible error o excepcion
        catch (Exception $error) {
            
            // Verificar si el programa existe mediante PK
            if (strtr($error->getMessage(), $nombre)) {
                $msj = "El Programa resumen: $nombre no existe";
            } else {
                
                // Otro msj si no es por no existencia
                $msj = "Ha ocurrido un error al Editar el programa resumen";
            }

            // Redureccionamos a la pagina buscar con el mensaje de error
            $_SESSION["progResumen.find"] = NULL;
            header("Location: ../view/forms/progResumen/buscar.php?msj=$msj");
            exit;
        }
    }

    public static function eliminar(){

        // Recuparar los campos enviados por el formulario
        $nombre = @$_REQUEST["nombre"];

        // Obtenemos el usuario consultado anteriormente
        $u = $_SESSION["progResumen.find"];

        // Lo deserealizamos y reconvertimos en objeto tipo programa
        $u = unserialize($u);

        // Validamos que el programa consultada sea la misma que se desea editar
        if ($u->nombre != $nombre) {
            $msj = "El nombre no corresponde con el programa resumen consultado";
            header("Locate: ../view/forms/progResumen/buscar.php?msj=$msj");
            exit;
        }

        // Intentar eliminar el programa de la BD
        try {
            
            // Guardar el programa
            $u-> delete();

            // Quitamos de la sesion el programa consultado
            $_SESSION["progResumen.find"] = NULL;

            // Contamos los programa de la BD
            $total = ProgramaResumen::count();
            $msj = "progResumen eliminado, Total: $total";

            // Redireccionar la pagina al buscar, enviando un msj
            header("Location: ../view/forms/progResumen/buscar.php?msj=$msj");
            exit;

        } 
        
        // Capturar algun posible error o excepcion
        catch (Exception $error) {
            
            // Verificar si el programa existe mediante PK
            if (strtr($error->getMessage(), $nombre)) {
                $msj = "El programa resumen: $nombre no existe";
            } else {
                
                // Otro msj si no es por no existencia
                $msj = "Ha ocurrido un error al Eliminar el programa resumen";
            }

            // Redureccionamos a la pagina buscar con el mensaje de error
            $_SESSION["progResumen.find"] = NULL;
            header("Location: ../view/forms/progResumen/buscar.php?msj=$msj");
            exit;
        }
    }

    public static function listarTodo(){

        try {  
                      
            // Obtenemos todos los programas
            $progResumen = ProgramaResumen::all();

            if ($progResumen == NULL) {

                $_SESSION["progResumen.all"];
                $msj = "Total Programas resumen: 0";
            } else {
                $total = count($progResumen);

                // Convertimos a texto (serializamos)
                $progResumen = serialize($progResumen);

                /*  Colocamos la lista de programas en la sesion para poder
                    recuperarla en la pagina de reporte de programas
                */
                $_SESSION["progResumen.all"] = $progResumen;
            }

            // Redireccionamos a la pagina de reportes
            $msj = "Total Programas resumen: $total";
            header("Location: ../view/forms/progResumen/listarProgResumen.php?msj=$msj");

        } catch (Exception $error) {
            $_SESSION["progResumen.all"] = NULL;
            header("Location: ../view/forms/progResumen/listarProgResumen.php?msj=Total Programas resumen: 0");

        }
    }

}

ProgResumenController::ejecutarAccion();