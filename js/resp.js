let telefone = document.querySelector('#telefoneDoResponsavel');
let cpf = document.querySelector('#cpfResponsavel');
let nome = document.querySelector('#nomeDoResponsavel');
let indice = document.querySelector('#indice');
let resultado = document.querySelector('#resultado');


//primeira parte: enviar os dados pro banco
function adicionarInformacoes() {
    fetch('../db/bancoResponsavel.php', {
        method: 'POST',
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `acao=I&nome=${nome.value}&telefone=${telefone.value}&cpf=${cpf.value}&indice=${indice.value}`
    })
        .then(r => r.json())
        .then(r => {
            if (r.info) {
                alert(r.info);
                return;
            }

            if (r.mensagem) {
                alert(r.mensagem);

                carregarInformacoesPessoais();
                limparCampo()
            }
        })
}


//segunda parte:carregar as informacoes enviadas para o banco e listar no elementoHTML
function carregarInformacoesPessoais() {
    fetch('../db/bancoResponsavel.php?acao=C')
        .then(resposta => resposta.json())
        .then(resposta => {
            let  elementoHTML= '<ol class="list-group list-group-numbered mb-2">';

            for (let i = 0; i < resposta.length; i++) {
                elementoHTML += `<li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">${resposta[i].nome}</div>
                            Telefone:${resposta[i].telefone}<br>
                            Cpf: ${resposta[i].cpf}<br>

                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button"
                                    class="btn-solid theme-warning"
                                    onclick="editarInformacao(${i},'${resposta[i].nome}','${resposta[i].telefone}','${resposta[i].cpf}')">Editar</button>
                                <button type="button"
                                    class="btn-solid theme-danger"
                                    onclick="deletarResponsavel(${i})">
                                    Deletar
                                </button>
                            </div>
                        </div>
                    </li>`
            }

            elementoHTML += '</ol>';

            resultado.innerHTML = elementoHTML;
        });
}
//editar passando os indices e puxando pros campos inputs o valores que precisa mudar
function editarInformacao(indiceEditado, nomeEditado, telefoneEditado, cpfEditado,) {
    indice.value = indiceEditado
    nome.value = nomeEditado;
    telefone.value = telefoneEditado;
    cpf.value = cpfEditado;
}

function deletarResponsavel(indice) {
    fetch(`../db/bancoResponsavel.php?indice=${indice}&acao=D`)
        .then(resposta => resposta.json())
        .then(resposta => {
            if (resposta.mensagem) {
                alert(resposta.mensagem);
            }
            carregarInformacoesPessoais()
        })
}

function limparCampo() {
    telefone.value = '';
    cpf.value = '';
    nome.value = '';
    indice.value = ''
}

carregarInformacoesPessoais()