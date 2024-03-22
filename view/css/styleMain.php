<?php

    header("Content-type: text/css; charset: UTF-8");
?>

body {
    background-color: #F2F0FA;
    font-family: arial;
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

.indexes {
    position: absolute;
    top: 20%;
    margin-left: 15%;
    width: 1280px;
    height: 600px;
    background-color: #F2F0FA;
    border-radius: 32px;
    padding: 40px;
}

.indexes div[id="emisora"], .indexes div[id="productora"], .indexes div[id="consorcio"], .indexes div[id="programa"] {
    width: 200px;
    height: 160px;
    background-color: #9382e3;
    border-radius: 32px;
    padding: 30px;
    margin-top: 0%;
    margin-left: 20px;
    box-shadow: 0 0 16px 0 #d7bff8;
    text-align: center;
    font-size: 32px;
    font-weight: bold;
}.indexes div[id="emisora"]:hover {
    background: #A191E6;
}.indexes div[id="productora"]:hover {
    background: #A191E6
}.indexes div[id="consorcio"]:hover {
    background: #A191E6;
}.indexes div[id="programa"]:hover {
    background: #A191E6;
}

.indexes div[id="productora"] {
    margin-left: 26%;
    margin-top: -220px;
}

.indexes div[id="consorcio"] {
    margin-left: 50%;
    margin-top: -220px;
}

.indexes div[id="programa"] {
    margin-left: 75%;
    margin-top: -220px;
}

a {
    color: #F2F0FA;
    text-decoration: none;
}

.indexes div[id="progResumen"], .indexes div[id="emision"], .indexes div[id="encuesta"] {
    width: 200px;
    height: 160px;
    background-color: #9382e3;
    border-radius: 32px;
    padding: 30px;
    margin-top: 40px;
    margin-left: 13%;
    box-shadow: 0 0 16px 0 #d7bff8;
    text-align: center;
    font-size: 32px;
    font-weight: bold;
}.indexes div[id="progResumen"]:hover {
    background: #A191E6;
}.indexes div[id="emision"]:hover {
    background: #A191E6
}.indexes div[id="encuesta"]:hover {
    background: #A191E6;
}

.indexes div[id="emision"] {
    margin-left: 38%;
    margin-top: -220px;
}

.indexes div[id="encuesta"] {
    margin-left: 63%;
    margin-top: -220px;
}
