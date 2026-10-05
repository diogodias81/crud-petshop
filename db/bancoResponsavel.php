<?php

   
    //iniciar a sessao
    session_start();

    //verifanco se a lista nao existe
    if(!isset($_SESSION['respLista'])){
        // e se ela nao existir ela cria
        $_SESSION['respLista'] = [];
    }
    //importando do servicos
    require '../servicos/responsavelDB.php';

    //criando objeto da classe,usarei para chamar os metodos dentro da classe responsavel
    $oResponsavel = new responsavel();
    
    //verificando acao c que e consultar 
    //verificando se existe o parametro 'acao'
    //e se o valor da acao  = 'C'
    if(isset($_REQUEST['acao']) && $_REQUEST['acao'] == 'C') {
        //chamando o metodo listar que esta dentro da classe responsavel
        //o resultado sera enviado para a resposta da requisicao
        echo $oResponsavel->listarInformacoesPessoais();
    }
    //acao i de inserir
    //verifica se acao = 'I'
    if(isset($_REQUEST['acao']) && $_REQUEST['acao'] == 'I'){
        //chamando o metodo responsavel por adicionar as informacoes
        //guardando o resultado dentro da variavel $resposta
        $resposta = $oResponsavel->adicionarInformacoes();

        if(isset($resposta['info'])) {
            die(json_encode($resposta));
        }

        echo json_encode(['mensagem'=> 'Informações Cadastradas com Sucesso']);
    }
    //criar o delete
    if(isset($_REQUEST['acao']) && $_REQUEST['acao'] == 'D'){
        $oResponsavel->deletarResponsavel();

        echo json_encode(['mensagem'=> 'O Responsável foi Removido com sucesso!']);
    }    
