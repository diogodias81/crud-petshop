let nomeAnimal = document.querySelector('#nomeAnimal');
let especieSelecionada = document.querySelector('#especieAnimal');
let idadeDoAnimal = document.querySelector('#idadeAnimal');
let resultado = document.querySelector('#resultadoPetsInfo');
let indice = document.querySelector('#indice');

//enviando dados para o database
function adicionarInfoPet() {
    fetch('..db/bancoInfoPet.php', {
        method: 'POST',
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body:
            `
        acao=I
        &nomePet
        ${nomeAnimal.value}
        &especie=${especieSelecionada.value}
        &idade=${idadeDoAnimal.value}
        &indice=${indice}
    `

    })
    .then(resposta => resposta.json())
    .then(resposta =>{
        //tratar o erro ou sucesso
        //limpar campos
    })
}

function carregarResponsavel() {
    fetch('../db/bancoResponsavel.php?acao=C')
        .then(resposta => resposta.json())
        .then(resposta => {
            console.log(resposta);

            let listaHTML = '<option value="">SELECIONE...</option>';

            for (let i = 0; i < resposta.length; i++) {
                listaHTML += `<option value="${resposta[i].indice}">
                                    Responsavel:${resposta[i].nome}
                            </option>`;
            }
            resultado.innerHTML = listaHTML;

        });
}
function carregarInfosPet(){
    fetch('../db/bancoInfoPet.php?acao=C')
    .then(respost => resposta.json())
    .then(resposta =>{
        listHTML = '';
        for(let i = 0; i < resposta.length;i++){
            listHTML += 
            `<div>
                <p>
                    Nome Do Animal:${resposta[i].nomeAnimal}<br>
                    Especie:${resposta[i].especieSelecionada}<br>
                    Idade Do Animal:${resposta[i].idadeDoAnimal}
                </p>
            </div>`
        }
    })
    resultado.innerHTML = listHTML;
        
}



carregarResponsavel()