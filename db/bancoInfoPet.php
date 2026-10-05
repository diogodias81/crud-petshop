<?php
    session_start();
    //se nao existe,a sessaro sera criada 
    if (!isset($_SESSION['listaInformacoesPet'])){
        $_SESSION['listaInformacoesPet'] = [];
    }
    require '../servicos/infoPetDB.php';

    

?>