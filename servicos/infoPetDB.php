<?php
class infoPets
{
    public function listarInformacoesDoPet(){
        return json_encode($_SESSION['listaInformacoesPet']);
    }
   //verificar nomeanimel,especie,idade,indice 
    public function adicionarInfosPet(){
        if (isset($_POST) &&count($_POST) > 0 ){
           
            if(!$_POST['nomePet']){
                    return ['info' =>'O Campo Nome Do Pet é Obrigatorio'];
            }
            if(!$_POST['especie']){
                    return['info' => 'A Especie Do Animal é Obrigatorio'];
            }
            if(!$_POST['idade']){
                    return['info' =>'A Idade Do Animal é Obrigatoria'];
            }
            
            if(isset($_POST['indice']) && is_numeric($_POST['indice'])){
                $indice = $_POST['indice'];
                $_SESSION['listaInformacoesPet'][$indice]['nomePet'] = $_POST['nomePet'];
                $_SESSION['listaInformacoesPet'][$indice]['especie'] = $_POST['especie'];
                $_SESSION['listaInformacoesPet'][$indice]['idade'] =   $_POST['idade'];
                }else{
                    $_SESSION['listaInformacoesPet'] = [
                    'nomePet' => $_POST['nomePet'],
                    'especie' => $_POST['especie'],
                    'idade'   => $_POST['idade']
                    ];
                }
        }

    }

}
?>