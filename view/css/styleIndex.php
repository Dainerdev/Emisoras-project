<?php

    header("Content-type: text/css; charset: UTF-8");
?>

body {
    background-color: #F2F0FA;
}

.title {
    font-size: 20px;
    margin-top: 5%;
    text-align: center;
    color: #5C42CC;
}

.line {
    margin-left: 30%;
    width: 40%;
    height: 2px;
    background-color:  #A191E6;
    margin-bottom: 50px;
}

.options {
    top: 30%;
    margin-left: 15%;
    width: 1280px;
    height: 600px;
    background-color: #F2F0FA;
    border-radius: 32px;
    padding: 60px;
}

.options div[id="Agregar"], .options div[id="Buscar"], .options div[id="Listar"] {
    width: 200px;
    height: 200px;
    background-color: #9382e3;
    margin-bottom: 20px;
    border-radius: 32px;
    padding: 30px;
    margin-top: -5%;
    margin-left: 20px;
    box-shadow: 0 0 6px 0 #A191E6;
    text-align: center;
    font-size: 32px;
    font-weight: bold;
}.options div[id="Agregar"]:hover {
    background: #A191E6;
}.options div[id="Buscar"]:hover {
    background: #A191E6
}.options div[id="Listar"]:hover {
    background: #A191E6;
}

.options div[id="Buscar"], .options div[id="Listar"] {
    margin-left: 35%;
    margin-top: -280px;
}

.options div[id="Listar"] {
    margin-left: 70%;
}

img[id="add"] {
    margin-top: 20px;
    width: 140px;
    height: 140px;
}
img[id="search"] {
    width: 150px;
    height: 140px;
}
img[id="list"] {
    width: 150px;
    height: 150px;
}

a {
    color: #F2F0FA;
    text-decoration: none;
}

p[id="add"] {
    margin-top: -5px;
}
p[id="search"] {
    margin-top: -5px;
}
p[id="list"] {
    margin-top: 5px;
}