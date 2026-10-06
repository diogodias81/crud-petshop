<?php
//refazer tudo do zero 
    class responsavel 
    {
        public function listarInformacoesPessoais(){
            return json_encode($_SESSION['respLista']);
        }

        public function adicionarInformacoes(){

        if (isset($_POST) && count($_POST) > 0) {

            if (!$_POST['nome']) {
                return ['info' => 'O campo Nome é obrigatório!'];
            }

            if (!$_POST['telefone']) {
                return ['info' => 'O campo Telefone é obrigatório!'];
            }

            if (!$_POST['cpf']) {
                return ['info' => 'O campo CPF é obrigatório!'];
            }

            if ((int)$_POST['telefone'] != $_POST['telefone']) {
                return ['info' => ' O telefone deve ser um número inteiro'];
            }
            if ((int)$_POST['cpf'] != $_POST['cpf']) {
                return ['info' => ' O codigo deve ser um número inteiro'];
            }


            if (isset($_POST['indice']) && is_numeric($_POST['indice'])) {
                $indice = $_POST['indice'];
                $_SESSION['respLista'][$indice]['nome']     = $_POST['nome'];
                $_SESSION['respLista'][$indice]['telefone'] = $_POST['telefone'];
                $_SESSION['respLista'][$indice]['cpf']      = $_POST['cpf'];
            } else {
                $_SESSION['respLista'][] = [
                    'nome'         => $_POST['nome'],
                    'telefone'     => $_POST['telefone'],
                    'cpf'          => $_POST['cpf']
                ];
            }
        }
        
        }
        public function deletarResponsavel(){
            if(isset($_GET['indice'])&& is_numeric(($_GET['indice']))){
                $indice = $_GET['indice'];
                array_splice($_SESSION['respLista'],$indice,1);
            }
        }
    }
    
?>