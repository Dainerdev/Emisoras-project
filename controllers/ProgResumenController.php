<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/ProgramaResumen.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Programa.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/EmitirResumen.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Personas.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/ResumenRealizar.php";

class EmisionController {

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

            case "Editar":
                
                // Invocamos el metodo editar
                EmisoraController::editar();
                break;

            case "Eliminar":
                // Invocamos el metodo eliminar
                EmisoraController::eliminar();
                break;

            case "todo":
                // Invocamos el metodo listar todo
                EmisoraController::listarTodo();
                break;   

            default:
                // si no, mandamos error
                header("Location: ../../view/error.php?msj=Acción no permitida");
                exit;
        }
    }
}