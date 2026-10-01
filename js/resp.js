let telefone =  document.querySelector('#telefoneDoResponsavel');
let cpf = document.querySelector('#cpfResponsavel');
let nome = document.querySelector('#nomeDoResponsavel');
let indice = document.querySelector('#indice');
let resultado = document.querySelector('#resultado');


//primeira parte: enviar os dados pro banco
function adicionarInformacoes(){
    fetch('../db/bancoResponsavel.php',{
        method:'POST',
        headers:{
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body:`acao=I&nome=${nome.value}&telefone=${telefone.value}&cpf=${cpf.value}&indice=${indice.value}`
    })
    .then(r => r.json())
    .then(r => {
        if(r.info) {
            alert(r.info); return;
        }

        if(r.mensagem) {
            alert(r.mensagem);

            carregarInformacoesPessoais();
        }
    })
}


//segunda parte:carregar as informacoes enviadas para o banco e listar no elementoHTML
function carregarInformacoesPessoais(){
    fetch('../db/bancoResponsavel.php?acao=C')
        .then(resposta => resposta.json())
        .then(resposta =>{
            let elementoHTML = ''; 

            for(let i = 0; i < resposta.length;i++){
                elementoHTML += `
                    <div>
                        <p>
                            Nome:${resposta[i].nome}
                            Cpf: ${resposta[i].cpf}
                            Telefone:${resposta[i].telefone}
                        </p>
                        <button type="button"
                             onclick="editarInformacao(${i},${resposta[i].nome},'${resposta[i].cpf}',${resposta[i].cpf})">Editar</button>
                        <button type="button"
                            onclick="deletarInformacao(${i})">
                            Deletar
                        </button>
                    </div>
                    </div>
                                `
            }
            resultado.innerHTML = elementoHTML;
        });
    }
carregarInformacoesPessoais()