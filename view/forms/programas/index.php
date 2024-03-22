<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleIndex.css">
    <link rel="stylesheet" type="text/css" href="../../css/styleIndex.php">
    <title>Menu - Programas</title>
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>MENU - PROGRAMAS</h1>
            <div class="line"></div>
            <div>
                <a href="../../index.php"><input type="hidden" id="volver">
                <img id="back" src="../../img/back.png"></a> 
            </div>
        </div>
        <div class="options">
            <div id="Agregar">
                <a href="../../../view/forms/programas/agregar.php">
                    <img id="add" src="../../img/add.png"><p id="add">Agregar</p>
                </a>
            </div>
            <div id="Buscar">
                <a href="../../../view/forms/programas/buscar.php">
                    <img id="search" src="../../img/search.png">
                    <p id="search">Buscar, edita o elimina</p>
                </a>
            </div>
            <div id="Listar">
                <a href="../../../controllers/ProgramaController.php?accion=todo">
                    <img id="list" src="../../img/list.png"><p id="list">Listar</p></a>
            </div>
        </div>        
    </div>
</body>
</html>