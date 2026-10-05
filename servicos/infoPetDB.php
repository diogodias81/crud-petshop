<?php
class infoPets
{
    public function listarInformacoesDoPet(){
        return json_encode($_SESSION['listaInformacoesPet']);
    }
   //verificar nomeanimel,especie,idade,indice 
    public function adicionarInfosPet(){
        if (isset($_POST) &&count($_POST)> 0 ){
           
            if(!$_POST['nomePet']){
                return ['info' =>'O Campo Nome Do Pet é Obrigatorio'];
           }
           if(!$_POST['especie']){
                return['info' => 'A Especie Do Animal é Obrigatorio'];
           }
           if(!$_POST['idade']){
                return['info' =>'A Idade Do Animal é Obrigatoria'];
           }
        }
    }
}
?>