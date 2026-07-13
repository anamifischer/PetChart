<?php
//Arquivo responsável pela sessão do prog

session_start();

function verificarLogin(){
    if(!isset($_SESSION['usuario_id'])){
        header("Location: /Trabalho 2°T/pages/auth/login.php");
        exit;
    }
}

function fazerLogin(){
    
}