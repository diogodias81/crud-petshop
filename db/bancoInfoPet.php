<?php
session_start();
// echo'<pre>';print_r($_REQUEST);die;
// se não existe, a sessão será criada
if (!isset($_SESSION['listaInformacoesPet'])) {
    $_SESSION['listaInformacoesPet'] = [];
}

require '../servicos/infoPetDB.php';

$oInfoPets = new infoPets();

if (isset($_REQUEST['acao']) && $_REQUEST['acao'] == 'C') {
    echo $oInfoPets->listarInformacoesDoPet();
}

if (isset($_REQUEST['acao']) && $_REQUEST['acao'] == 'I') {

    $resposta = $oInfoPets->adicionarInfosPet();

    if (isset($resposta['info'])) {
        die(json_encode($resposta));
    }

    echo json_encode([
        'mensagem' => 'Informações Cadastradas com Sucesso!'
    ]);
}

?>