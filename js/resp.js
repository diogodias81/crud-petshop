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
                limpar()
            }
        })
}


//segunda parte:carregar as informacoes enviadas para o banco e listar no elementoHTML
function carregarInformacoesPessoais() {
    fetch('../db/bancoResponsavel.php?acao=C')
        .then(resposta => resposta.json())
        .then(resposta => {
            let elementoHTML = '';

            for (let i = 0; i < resposta.length; i++) {
                elementoHTML += `
                    <div>
                        <p>
                            Nome:${resposta[i].nome}<br>
                            Telefone:${resposta[i].telefone}<br>
                            Cpf: ${resposta[i].cpf}<br>                  
                        </p>
                        <button type="button"
                             onclick="editarInformacao(${i},'${resposta[i].nome}','${resposta[i].telefone}','${resposta[i].cpf}')">Editar</button>
                        <button type="button"
                            onclick="deletarResponsavel(${i})">
                            Deletar
                        </button>
                    </div>
                                `
            }
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
function limpar() {
    telefone.value = '';
    cpf.value = '';
    nome.value = '';
    indice.value = ''
}
carregarInformacoesPessoais()