<?php

    header("Content-type: text/css; charset: UTF-8");
?>

* {
    margin: 0;
    padding: 0;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box; 
}

body {
    background-color: #F2F0FA;
    font-family: arial;
}

.title-form {
    text-align: center;
    font-size: 24px;
    padding-bottom: 15px;
    color: #5C42CC;
}

.container-form {    
    position: absolute;
    top: 30%;
    left: 50%;
    width: 600px;
    height: 600px;
    margin-top: -200px;
    margin-left: -300px;
    padding: 50px;
    background-color: #F2F0FA;
    border-radius: 32px;
    box-shadow: 0 0 40px 0 rgba(62, 62, 62, 0.5);

} .container-form .form {    
    width: 100%;
    margin: auto;

} .container-form .form .input-group {
    position: relative;
    margin-bottom: 20px;
     
} .container-form .form .input-group input[type="text"], .container-form .form .input-group input[type="number"] {
    color: #0B0815;
    width: 100%;
    outline: none;
    padding: 10px;
    background: none;
    border: none;
    border-bottom: 2px solid #A191E6;

}.container-form .form .input-group input[type="number"] {
    color: #0B0815;
    width: 100%;
    outline: none;
    padding: 10px;
    background: none;
    border: none;
    border-bottom: 2px solid #A191E6;

} .container-form .form .input-group input[type="text"]:focus, .container-form .form .input-group input[type="text"]:active {
    outline: none;
    border-bottom: 2px solid #5C42CC;

} .container-form .form .input-group input[type="number"]:focus, .container-form .form .input-group input[type="number"]:active {
    outline: none;
    border-bottom: 2px solid #5C42CC;

}.container-form .form .input-group label {
    color: #5C42CC; 

} .container-form .form .input-group label.label {
    -webkit-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
    margin-left: 15px;
    font-size: 16px;
    line-height: 16px;
    position: absolute;
    top: 16px;
    left: 0;

} .container-form .form .input-group label.label.active {
    top: -12px;
    font-size: 12px;
    line-height: 12px;
    color: #B6B6B6;

} .container-form .form input[value="Guardar"], .container-form .form input[id="limpiar"], .container-form .form input[id="volver"]{
    background: #5C42CC;
    border-radius: 10px;
    border: 2px solid #745AE2;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-size: 16px;
    padding: 15px;
    right: 50%;   
    width: 120px;
    margin-left: -40px;
    margin-top: -5px;
    box-shadow: 4px 4px 16px 0 rgba(62, 62, 62, 0.3);
    transform: translate(50%,50%);
    -webkit-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;

} .container-form .form input[type="submit"] { 
    margin-left: 40px;

}.container-form .form input[type="submit"]:hover , .container-form .form input[type="reset"]:hover {
    background: #A191E6;    
} 

div[id="fecha"] label, b {
    margin-top: 13px;
}

.line {
    top: 50%;
    width: 100%;
    height: 2px;
    margin-top: 70px;
    background-color:  #A191E6;
}

.alert {
    color: #5C42CC;
    margin-top: 40px;
    text-align: center;
}

.container-form .form input[id="volver"] {
    background: #F2F0FA;
    color: #0B0815;
    margin-left: 40px;
    text-align: center;

}.container-form .form input[id="volver"]:hover {
    background: #9d78fa;     
}
