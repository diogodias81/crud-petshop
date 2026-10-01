<?php
    session_start();
    
    if(!isset($_SESSION['respLista'])){
        $_SESSION['respLista'] = [];
    }
    require '../servicos/infoDB.php';

    $oResponsavel = new responsavel();
    
    if(isset($_REQUEST['acao']) && $_REQUEST['acao'] == 'C') {

    echo $oResponsavel->listarInformacoesPessoais();
}
?>