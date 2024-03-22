<?php

    header("Content-type: text/css; charset: UTF-8");
?>

body {
    background-color: #F2F0FA;
    font-family: arial;
}

.title {
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

.card {
    position: relative;
    width: 600px;
    height: 200px;
    background-color: #F2F0FA;
    border-radius: 32px;
    box-shadow: 0 0 24px 0 #d7bff8;
    margin-left: 620px;
    padding: 30px;
    margin-bottom: 40px;
}


.idx {    
    position: absolute;
    margin-top: -3%;
    margin-left: 5%;
    font-size: 30px;
    color: #0B0815;
    font-weight: bold;
}

.info {
    position: absolute;
    margin-top: -10px;
    margin-left: 45%;
    margin-right: 5px;
    font-size: 28px;
    color: #0B0815;
}

.container .head input[id="volver"], img {
    position: absolute;
    background: #F2F0FA;
    border-radius: 10px;
    color: #0B0815;  
    cursor: pointer;
    display: inline-block;
    font-size: 16px;
    padding: 15px;
    right: 75%;   
    width: 30px;
    height: 30px;
    margin-top: -12dvh;
    margin-left: -50%;
    box-shadow: 0 0 6px 0 #d7bff8;
    -webkit-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}