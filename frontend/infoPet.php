<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacoes Pet</title>
</head>
<body>
    <h1>Informações Do Pet</h1>
    <form>
        <input type="hidden" id="indice">
        <div>
            <label for="nomeAnimal">Nome Do Animal:</label>
            <input type="text" id="nomeAnimal" placeholder="Nome Do Animal">
        </div>
        <br>
        <div>
            <label>Especie:</label>
               <select id="especieAnimal">
                <option value="">SELECIONE...</option>
                <option value="gato">Gato</option>
                <option value="cachorro">Cachorro</option>
                <option value="coelho">Coelho</option>
                <option value="porquinho_da_india">Porquinho Da Índia</option>
            </select>
        </div>
        <br>

        <div>
            <label for="idadeAnimal">Idade</label>
            <input type="number" id="idadeAnimal" placeholder="Idade Do Animal">
        </div>
        <br>
        <div>
            <label for="resultadoPetsInfo">Responsavel</label>
            <select id="resultadoPetsInfo">
            </select>
        </div>
        <br>
        <button onclick="salvarInfoPets()">Salvar Informações</button>
    </form>
    <br>
    <h1>Apos Inserir os dados Do Seu Pet Finalize abaixo!</h1>
    <a href="responsavel.php">Finalizar</a>
    <br><br><br>

    <a href="responsavel.php">VOLTAR</a>
    
    <script src="../js/infoPets.js"></script>
</body>
</html>