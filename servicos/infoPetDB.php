<?php
// echo'<pre>';print_r($_SESSION);die;
class infoPets
{
    public function listarInformacoesDoPet()
    {
        // echo'<pre>';print_r($_SESSION);die;
        return json_encode($_SESSION['listaInformacoesPet']);
    }
    //verificar nomeanimel,especie,idade,indice 
    public function adicionarInfosPet()
    {

        if (isset($_POST) && count($_POST) > 0) {

            if (!$_POST['nomePet']) {
                return ['info' => 'O Campo Nome Do Pet é Obrigatorio'];
            }
            if (!$_POST['idade']) {
                return ['info' => 'A Idade Do Animal é Obrigatoria'];
            }
            if (!$_POST['especie']) {
                return ['info' => 'A Especie Do Animal é Obrigatorio'];
            }
          

            if (isset($_POST['indice']) && is_numeric($_POST['indice'])) {
                $indice = $_POST['indice'];
                $_SESSION['listaInformacoesPet'][$indice]['nomePet'] = $_POST['nomePet'];
                $_SESSION['listaInformacoesPet'][$indice]['idade'] =   $_POST['idade'];
                $_SESSION['listaInformacoesPet'][$indice]['especie'] = $_POST['especie'];
            } else {
                $_SESSION['listaInformacoesPet'][] = [
                    'nomePet' => $_POST['nomePet'],
                    'idade'   => $_POST['idade'],
                    'especie' => $_POST['especie']

                ];
            }
        }
    }
}
