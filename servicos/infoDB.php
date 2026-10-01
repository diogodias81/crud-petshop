<?php
    class responsavel 
    {
        public function listarInformacoesPessoais(){
            return json_encode($_SESSION['respLista']);
        }

        public function adicionarInformacoes(){

        if (isset($_POST) && count($_POST) > 0) {

            if (!$_POST['nome']) {
                die(json_encode(['mensagem' => 'O campo Nome é obrigatório!']));
            }

            if (!$_POST['telefone']) {
                die(json_encode(['mensagem' => 'O campo Telefone é obrigatório!']));
            }

            if (!$_POST['cpf']) {
                die(json_encode(['mensagem' => 'O campo CPF é obrigatório!']));
            }

            if ((int)$_POST['telefone'] != $_POST['telefone']) {
                die(json_encode([
                    'mensagem' => ' O telefone deve ser um número inteiro'
                ]));
            }
            if ((int)$_POST['cpf'] != $_POST['cpf']) {
                die(json_encode([
                    'mensagem' => ' O codigo deve ser um número inteiro'
                ]));
            }


            if (isset($_POST['indice']) && is_numeric($_POST['indice'])) {
                $indice = $_POST['indice'];
                $_SESSION['respLista'][$indice]['nome'] = $_POST['nome'];
                $_SESSION['respLista'][$indice]['telefone'] = $_POST['telefone'];
                $_SESSION['respLista'][$indice]['cpf'] = $_POST['cpf'];
            } else {
                $_SESSION['respLista'][] = [
                    'codigo'     => $_POST['nome'],
                    'nome'       => $_POST['telefone'],
                    'quantidade' => $_POST['cpf']
                ];
            }
        }
        }
    }
    
?>