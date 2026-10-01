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

    if(isset($_REQUEST['acao']) && $_REQUEST['acao'] == 'I'){
        $resposta = $oResponsavel->adicionarInformacoes();

        if(isset($resposta['info'])) {
            die(json_encode($resposta));
        }

        echo json_encode(['mensagem'=> 'Informações Cadastradas com Sucesso']);
    }
    //criar o delete