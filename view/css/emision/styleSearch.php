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
}

.title-form {
    text-align: center;
    font-size: 32px;
    padding-bottom: 15px;
    color: #5C42CC;
}

.container-form {    
    position: absolute;
    top: 30%;
    left: 50%;
    width: 600px;
    height: 750px;
    margin-top: -200px;
    margin-left: -450px;
    padding: 50px;
    background-color: #F2F0FA;
    border-radius: 32px;
    box-shadow: 0 0 40px 0 #00000059;

} .container-form .form {    
    width: 100%;
    margin: auto;

} .container-form .form .input-group {
    position: relative;
    margin-bottom: 20px;
     
} .container-form .form .input-group input[type="text"] {
    color: #0B0815;
    width: 20%;
    outline: none;
    padding: 15px;
    background: none;
    border: none;
    border-bottom: 2px solid #A191E6;

} .container-form .form .input-group input[type="text"]:focus, .container-form .form .input-group input[type="text"]:active {
    outline: none;
    border-bottom: 2px solid #5C42CC;

} .container-form .form .input-group label {
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

} .container-form .form input[type="submit"], .container-form .form input[type="reset"] {
    background: #5C42CC;
    border-radius: 10px;
    border: 2px solid #745AE2;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-size: 16px;
    padding: 15px;
    right: 50%;   
    width: 150px; 
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

.line {
    top: 50%;
    width: 100%;
    height: 2px;
    margin-top: 70px;
    background-color:  #A191E6;
}

.container-form .form input[id="editar"], .container-form .form input[id="eliminar"]  { 
    margin-top: 40px;
    margin-left: 0;
} .container-form .form input[id="eliminar"] {
    margin-left: 40px;
}

.alert {
    color: #5C42CC;
    margin-top: 40px;
    text-align: center;
}

.steps-group {
    position: absolute;
    z-index: -1;
    top: 30%;
    left: 50%;
    width: 500px;
    height: 750px;
    margin-top: -225px;
    margin-left: 250px;
    padding: 50px;
    background-color: #A191E6;
    border-radius: 32px;
    box-shadow: inset 0 0 24px 0 #7e70bb;
}
.font {
    color: #F2F0FA;
    text-shadow: 0 0 5px #0B0815;
    margin-left: 40px;
    font-size: 30px;
    margin-top: 25%;
    margin-left: 20%;
    margin-right: 20px;
}

p {
    margin-bottom: 30px;
}

.steps-group input[id="volver"] {
    background: #F2F0FA;
    border-radius: 10px;
    border: 2px solid #745AE2;
    color: #0B0815;
    cursor: pointer;
    display: inline-block;
    margin-left: 20%;
    margin-top: 10%;
    font-size: 16px;
    padding: 15px; 
    width: 150px; 
    box-shadow: 4px 4px 16px 0 rgba(62, 62, 62, 0.3);
    transform: translate(50%,50%);
    -webkit-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;

}.steps-group input[id="volver"]:hover {
    background: #9d78fa;     
}


div[id="fecha"] label, b {
    margin-top: 13px;
}

input[type="date"] {
    background-color: #F2F0FA;
    padding: 10px;
    position: relative;
    transform: translate(10px, 0);
    color: #5C42CC;
    font-family: "Roboto Mono", monospace;
    font-size: 15px;
    border: none;
    outline: none;
    border-radius: 8px;
    box-shadow: 2px 2px 8px 0 rgba(62, 62, 62, 0.3);
}
::-webkit-calendar-picker-indicator{
    background-color: #A191E6;
    padding: 5px;
    cursor: pointer;
    border-radius: 5px;
    box-shadow: 0 0 8px 0 rgba(62, 62, 62, 0.3);
}

input[type="time"] {
    background-color: #F2F0FA;
    padding: 10px;
    position: relative;
    transform: translate(10px, 0);
    color: #5C42CC;
    font-family: "Roboto Mono", monospace;
    font-size: 15px;
    border: none;
    outline: none;
    border-radius: 8px;
    box-shadow: 2px 2px 8px 0 rgba(62, 62, 62, 0.3);
}

div[id="hour"]{
    float: left;
}

div[id="lapse"]{
    float: right;
    margin-right: 20px;
}

div[id="repet"]{
    margin-top: 20%;
}

div[id="fecha"]{
    position: relative;
    display: flex;
    float: right;
    margin-right: 20px;
    margin-top: -62px;
}


