<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Cadastro do Responsável</h1>
        <form>
            <input type="hidden" id="indice">
            <div class="mb-4">
                <label class="form-label mb-2" for="nomeDoResponsavel">Nome:</label>
                <input class="form-control" type="text" id="nomeDoResponsavel" placeholder="Insira Seu Nome">
            </div>

            <div class="mb-4">
                <label class="form-label mb-2" for="telefoneDoResponsavel">Telefone:</label>
                <input class="form-control" type="text" id="telefoneDoResponsavel" placeholder="Insira seu Telefone">
            </div>

            <div class="mb-4">
                <label class="form-label mb-2" for="cpfResponsavel">CPF</label>
                <input class="form-control" type="number" id="cpfResponsavel" placeholder="Insira Seu Cpf">
            </div>

            <div class="mb-4">     
                <button type="button" class="btn-solid theme-primary" onclick="adicionarInformacoes()">Salvar</button>
                <button type="button" class="btn-solid theme-secondary" onclick="limparCampo()">Limpar</button>
                <a class="btn-solid theme-success" href="infoPet.php">Cadastrar novo Pet</a>
            </div>
        </form> 

        <div class="card2">
            <div id="resultado"></div>
        </div>

    </div>

    
    

    <script src="../js/resp.js"></script>
</body>
</html>