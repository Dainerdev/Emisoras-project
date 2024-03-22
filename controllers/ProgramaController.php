<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Genero.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/ProgramaResumen.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/ProgramaRealizar.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/EmitirPrograma.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Persona.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Programa.php";

class ProgramaController {

    public static function ejecutarAccion(){

        // Recuperamos el campo accion
        $accion = @$_REQUEST["accion"];

        // Validamos si la accion es guardar

        switch ($accion) {
            case "Guardar":
                
                // Invocamos el metodo guardar
                ProgramaController::guardar();
                break;
            
            case "Buscar":
                
                // Invocamos el metodo buscar
                ProgramaController::buscar();
                break;

            case "Editar":
                
                // Invocamos el metodo editar
                ProgramaController::editar();
                break;

            case "Eliminar":

                // Invocamos el metodo eliminar
                ProgramaController::eliminar();
                break;

            case "todo":

                // Invocamos el metodo listar todo
                ProgramaController::listarTodo();
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
        $gen = @$_REQUEST["gen"];
        $cons = @$_REQUEST["cons"];

        // Crear una instancia de tipo programa
        $u = new Programa();

        // Ponemos los campos como valores de las propiedades
        $u-> nombre = $nombre;
        $u-> genero_id = $gen;
        $u-> consorcio_id = $cons;

        // Intentar guardar el programa en la BD
        try {
            
            // Guardar el programa
            $u->save();

            //contar el programa
            $total = @Programa::count();
            $msj = "Programa guardado correctamente, total: $total";

            // Redireccionar a la pagina guardar enviando un mensaje
            header("Location: ../view/forms/programas/agregar.php?msj=$msj");
            exit;

        } 
        // Capturar algun posible error o excepcion
        catch (Exception $error) {
            
            
            // Verificar si el error es de PK duplicada
            if (strstr($error->getMessage(), "Duplicate")) {

                $msj = "El programa ya existe";

            } else {
                
                // Otro mensaje si no es error por programa duplicado
                $msj = "Ha ocurrido un error al Guardar el programa";
            }

            // Redireccionar a la pagina con el mensaje de error
            header("Location: ../view/forms/programas/agregar.php?msj=$msj");
            exit;
        }
    }

    public static function buscar(){

        // Recuparar los campos enviados por el formulario
        $nombre = @$_REQUEST["nombre"];

        // Intentar buscar el programa en la BD
        try {
            
            // Buscamos el programa
            $u = Programa::find($nombre);

            // Colocamos el programa en la sesion 
            $_SESSION["programa.find"] = serialize($u);
            $msj = "Programa encontrado";
    
            // Redireccionar la pagina al buscar, enviando un msj
            header("Location: ../view/forms/programas/buscar.php?msj=$msj");
            exit;
    
            $_SESSION["programa.find"] = NULL;
            header("Location: ../view/forms/programas/buscar.php");
            exit;
                
        } 
        
        // Capturar algun posible error o excepcion
        catch (Exception $error) {
            
            // Verificar si el programa existe mediante PK
            if (strtr($error->getMessage(), $nombre)) {
                // msj si no es por no existencia
                $msj = "Ha ocurrido un error al Buscar el programa";

            } 
            else {
                // Otro msj si no existe
                $msj = "El programa con Nombre: $nombre no existe";
            }

            // Redureccionamos a la pagina buscar con el mensaje de error
            $_SESSION["programa.find"] = NULL;
            header("Location: ../view/forms/programas/buscar.php?msj=$msj");
        }

    }

    public static function editar(){

        // Recuparar los campos enviados por el formulario
        $nombre = @$_REQUEST["nombre"];

        // Obtenemos el usuario consultado anteriormente
        $u = $_SESSION["programa.find"];

        // Lo deserealizamos y reconvertimos en objeto tipo programa
        $u = unserialize($u);

        // Validamos que el programa consultada sea la misma que se desea editar
        if ($u->nombre != $nombre) {
            $msj = "El nombre no corresponde con el Programa consultado";
            header("Locate: ../view/programas/forms/buscar.php?msj=$msj");
            exit;
        }

        // Recuperamos los campos cambiados en el formulario
        $nombre = @$_REQUEST["nombre"];
        $gen = @$_REQUEST["gen"];
        $cons = @$_REQUEST["cons"];

        // Los colocamos en el programa consultado
        $u-> nombre = $nombre;
        $u-> genero_id = $gen;
        $u-> consorcio_id = $cons;

        // Intentar guardar los cambios de el programa en la BD
        try {
            
            // Guardar el programa
            $u-> save();

            // Volvemos a serializar el programa editada y lo guardamos en la sesion
            $_SESSION["programa.find"] = serialize($u);
            $msj = "Programa editado";

            // Redireccionar la pagina al buscar, enviando un msj
            header("Location: ../view/forms/programas/buscar.php?msj=$msj");
            exit;

        } 
        
        // Capturar algun posible error o excepcion
        catch (Exception $error) {
            
            // Verificar si el programa existe mediante PK
            if (strtr($error->getMessage(), $nombre)) {
                $msj = "El Programa: $nombre no existe";
            } else {
                
                // Otro msj si no es por no existencia
                $msj = "Ha ocurrido un error al Editar el programa";
            }

            // Redureccionamos a la pagina buscar con el mensaje de error
            $_SESSION["programa.find"] = NULL;
            header("Location: ../view/forms/programas/buscar.php?msj=$msj");
            exit;
        }

    }

    public static function eliminar(){

        // Recuparar los campos enviados por el formulario
        $nombre = @$_REQUEST["nombre"];

        // Obtenemos el usuario consultado anteriormente
        $u = $_SESSION["programa.find"];

        // Lo deserealizamos y reconvertimos en objeto tipo programa
        $u = unserialize($u);

        // Validamos que el programa consultada sea la misma que se desea editar
        if ($u->nombre != $nombre) {
            $msj = "El nombre no corresponde con el programa consultado";
            header("Locate: ../view/forms/programas/buscar.php?msj=$msj");
            exit;
        }

        // Intentar eliminar el programa de la BD
        try {
            
            // Guardar el programa
            $u-> delete();

            // Quitamos de la sesion el programa consultado
            $_SESSION["programa.find"] = NULL;

            // Contamos los programa de la BD
            $total = Programa::count();
            $msj = "Programa eliminado, Total: $total";

            // Redireccionar la pagina al buscar, enviando un msj
            header("Location: ../view/forms/programas/buscar.php?msj=$msj");
            exit;

        } 
        
        // Capturar algun posible error o excepcion
        catch (Exception $error) {
            
            // Verificar si el programa existe mediante PK
            if (strtr($error->getMessage(), $nombre)) {
                $msj = "El programa: $nombre no existe";
            } else {
                
                // Otro msj si no es por no existencia
                $msj = "Ha ocurrido un error al Eliminar el programa";
            }

            // Redureccionamos a la pagina buscar con el mensaje de error
            $_SESSION["programa.find"] = NULL;
            header("Location: ../view/forms/programas/buscar.php?msj=$msj");
            exit;
        }

    }

    public static function listarTodo(){

        try {  
                      
            // Obtenemos todos los programas
            $programas = Programa::all();

            if ($programas == NULL) {

                $_SESSION["programas.all"];
                $msj = "Total Programas: 0";
            } else {
                $total = count($programas);

                // Convertimos a texto (serializamos)
                $programas = serialize($programas);

                /*  Colocamos la lista de programas en la sesion para poder
                    recuperarla en la pagina de reporte de programas
                */
                $_SESSION["programas.all"] = $programas;
            }

            // Redireccionamos a la pagina de reportes
            $msj = "Total Programas: $total";
            header("Location: ../view/forms/programas/listarProgramas.php?msj=$msj");

        } catch (Exception $error) {
            $_SESSION["programas.all"] = NULL;
            header("Location: ../view/forms/programas/listarProgramas.php?msj=Total Programas: 0");

        }
    }

}

ProgramaController::ejecutarAccion();