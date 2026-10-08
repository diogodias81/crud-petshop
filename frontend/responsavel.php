<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
            <form>
                <input type="hidden" id="indice">
                <div>
                    <label for="nomeDoResponsavel">Nome:</label>
                    <input type="text" id="nomeDoResponsavel" placeholder="Insira Seu Nome">
                </div>
                <div>
                    <label for="telefoneDoResponsavel">Telefone:</label>
                    <input type="text" id="telefoneDoResponsavel" placeholder="Insira seu Telefone">
                </div>
                <div>
                    <label for="cpfResponsavel">CPF</label>
                    <input type="number" id="cpfResponsavel" placeholder="Insira Seu Cpf">
                </div>
                <div>     
                    <button type="button" onclick="adicionarInformacoes()">Salvar</button>
                    <button type="button" onclick="limparCampo()">Limpar</button>
                </div>
            </form> 
        </div>
         <div class="card2">
            <div id="resultado"></div>
        </div>
        <nav>
            <ul>
                <li><a class= href="infoPet.php">Registro Pet</a></li>            
            </ul>
        </nav>
    

    <script src="../js/resp.js"></script>
</body>
</html>