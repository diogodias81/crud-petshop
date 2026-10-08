let nomePet = document.querySelector('#nomeAnimal');
let especieSelecionada = document.querySelector('#especieAnimal');
let idadeDoAnimal = document.querySelector('#idadeAnimal');
let resultado = document.querySelector('#listaResponsavel');
let resultadoPet = document.querySelector('#resultadoPet')
let indice = document.querySelector('#indice');
//enviando dados para o database

function adcionarInfoPets() {
        
    fetch('../db/bancoInfoPet.php', {
        method: 'POST',
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body:`acao=I&nomePet=${nomePet.value}&especie=${especieSelecionada.value}&idade=${idadeDoAnimal.value}&indice=${indice.value}`
    })
    .then(resposta => resposta.json())
    .then(resposta =>{
        carregarInfosPet();
        limpar();
        //tratar o erro ou sucesso
        //limpar campos
    })
    .catch((error) => {
        alert(error)
    })
}

function carregarResponsavel() {
    fetch('../db/bancoResponsavel.php?acao=C')
        .then(resposta => resposta.json())
        .then(resposta => {
            let listaHTML = '<option value="">SELECIONE...</option>';
            for (let i = 0; i < resposta.length; i++) {
                listaHTML += `<option value="${i}">
                                    Responsavel:${resposta[i].nome}
                            </option>`;
            }
            resultado.innerHTML = listaHTML;
        });       
}
function carregarInfosPet(){
    fetch('../db/bancoInfoPet.php?acao=C')
    .then(resposta => resposta.json())
    .then(resposta =>{
        let listHTML = '';
        for(let i = 0; i < resposta.length;i++){
            listHTML += 
            `<div>
                <p>
                    Nome Do Animal:${resposta[i].nomePet}<br>
                    Idade Do Animal:  ${resposta[i].idade}<br>
                    Especie:${resposta[i].especie}
                </p>
                <button type="button"
                    onclick="editarInformacaoPet(${i}, '${resposta[i].nomePet}', '${resposta[i].idade}','${resposta[i].especie}')">
                    Editar
                    </button>
                 <button type="button"
                    onclick="deletar(${i})">
                    Deletar
                </button>
            </div>`
        }
        resultadoPet.innerHTML = listHTML;
    })
    
        
}
//funcao editar
function editarInformacaoPet(indiceEditado,nomePetEditado,idadeDoAnimalEditado,especieEditada){
    indice.value  = indiceEditado;
    nomePet.value = nomePetEditado;
    idadeDoAnimal.value = idadeDoAnimalEditado;
    especieSelecionada.value = especieEditada;
}
//funcao deletar
function deletar(indice) {
    fetch(`../db/bancoInfoPet.php?indice=${indice}&acao=D`)
        .then(resposta => resposta.json())
        .then(resposta => {
            if (resposta.mensagem) {
                alert(resposta.mensagem);
            }
            carregarInfosPet()
        })
}

function limpar(){
    nomePet.value ='';
    idadeDoAnimal.value = '';
    indice.value = '';
    especieSelecionada.value='';
}
carregarInfosPet()
carregarResponsavel()