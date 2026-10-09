<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacoes Pet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
</head>
<body>
    <div class="container ">
    <h1>Informações Do Pet</h1>
    <form>
        <input type="hidden" id="indice">
        <div>
            <label class="form-label" for="nomeAnimal">Nome Do Animal:</label>
            <input type="text" class="form-control" id="nomeAnimal" placeholder="Nome Do Animal">
        </div>
        <div>
            <label class="form-label mb-4">Especie:</label>
               <select id="especieAnimal">
                <option value="">SELECIONE...</option>
                <option value="gato">Gato</option>
                <option value="cachorro">Cachorro</option>
                <option value="coelho">Coelho</option>
                <option value="porquinho_da_india">Porquinho Da Índia</option>
            </select>
        </div>
        <div>
            <label class="form-label" for="idadeAnimal">Idade</label>
            <input type="number" class="form-control mb-3" id="idadeAnimal" placeholder="Idade Do Animal">
        </div>
        <div>
            <label for="listaResponsavel">Responsavel</label>
            <select id="listaResponsavel" class="mb-3">
            </select>
        </div>
        <button type="button" class="btn-solid theme-success mb-4" onclick="adcionarInfoPets()">Salvar Informações</button>
        <div id="resultadoPet"></div>     
    </form>
    <br>

    <p>Registro de Servico</p>

    <a href="servicos.php">Servico</a>

    <br><br>

    <p>Registro de Responsavel</p>

    <a href="responsavel.php">Registro Responsável</a>

    </div>

    <script src="../js/infoPets.js"></script>
</body>
</html>