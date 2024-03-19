/***
* Funcion JS:
* Objetivo: 
*** Deshabilitar el boton editar y el boton eliminar
    cuando el campo nombre este vacio (es requerido)
*** Habilitar el modo escritura en los campos
*/

function habilitarBotones(){

    // Obtiene el boton y los campos
    const btnEdit = document.getElementById("editar");
    const btnDelete = document.getElementById("eliminar");
    const campName = document.getElementById("nombre");
    const campFrec = document.getElementById("frec");
    const campTrans = document.getElementById("trans");

    // Agregar un evento de entrada al campo nombre
    // El evento se activa solo cuando escriben en el campo
    campName.addEventListener("input", () => {

        // Verifica si el campo está vacio
        if (campName.value == "") {
            
            // Deshabilitar el boton
            btnEdit.disabled = true;
            btnDelete.disabled = true;
        } else {
            
            // Habilita el boton 
            btnEdit.disabled = false;
        }
    });

    // Habilitar solo lectuara en los campos si el nombre esta vacio
    if (campName.value == "") {
        
        btnEdit.disabled = true;
        btnDelete.disabled = true;
        campName.setAttribute("readonly");
        campFrec.setAttribute("readonly", true);
        campTrans.setAttribute("readonly", true);

    } 
    
    // Si no esta vacio quitar solo lectura en los campos
    else {
        
        btnEdit.disabled = false;
        btnDelete.disabled = false;
        campName.setAttribute("readonly");
        campFrec.setAttribute("readonly");
        campTrans.setAttribute("readonly");

    }
}

/***
* Funcion JS:
* Objetivo: 
*** Hacer la limpieza de los campos
*/

// Funcion para limpiar los campos del formulario
function cleanForm() {
    document.getElementById('emi').value = "";
    document.getElementById('produ').value = "";
    document.getElementById('rfc').value = "";
    document.getElementById('tel').value = "";
    document.getElementById('nombre').value = "";  // Limpiar el campo nombre
    document.getElementById('frec').value = "";  // Limpiar el campo frecuencia
    document.getElementById('trans').value = "";  // Limpiar el campo transmisión
    
}

/***
* Funcion JS:
* Objetivo: 
*** Confirmar el proceso de editar o eliminar una emisora
*/











