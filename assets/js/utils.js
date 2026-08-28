//FUNCTION PARA ABRIR OS MODAIS
function configurarModal(btnAbrirId, modalId, btnFecharId) {

    const btnAbrir = document.getElementById(btnAbrirId);
    const modal = document.getElementById(modalId);
    const btnFechar = document.getElementById(btnFecharId);

    if (!btnAbrir || !modal || !btnFechar) {
        return;
    }

    btnAbrir.addEventListener("click", function () {
        modal.classList.add("ativo");
    });

    btnFechar.addEventListener("click", function () {
        modal.classList.remove("ativo");
    });
}

configurarModal("btn-novo-pet", "modal-pet", "fechar-modal-pet");
configurarModal("btn-nova-especie", "modal-especie", "fechar-modal-especie");
configurarModal("btn-novo-responsavel", "modal-responsavel", "fechar-modal-responsavel");


//VISUALIZAR DADOS PET
const botoesVisualizar = document.querySelectorAll(".btn-visualizar");
console.log("Botões visualizar encontrados:", botoesVisualizar.length);

botoesVisualizar.forEach(function (botao) {
    botao.addEventListener("click", function () {
        console.log("CLIQUEI")

        const id = botao.dataset.id;
        const modal = document.getElementById("modal-visualizar-pet");
        if (modal) {
            modal.classList.add("ativo");
        }
        fetch(`../actions/pets/update.php?id=${id}`)
            .then(response => response.json())
            .then(pet => {

                document.getElementById("visualizar-nome").textContent = pet.nome;
                document.getElementById("visualizar-nascimento").textContent = pet.nascimento;
                document.getElementById("visualizar-especie").textContent = pet.especie;
                document.getElementById("visualizar-genero").textContent = pet.genero;
                document.getElementById("visualizar-responsavel").textContent = pet.responsavel;
                document.getElementById("visualizar-prontuario").textContent = pet.prontuario || "Nenhuma informação registrada.";

                console.log("Dados do pet:", pet);
            });
    });
});

const fecharVisualizarPet = document.getElementById("fechar-modal-visualizar-pet");
const modalVisualizarPet = document.getElementById("modal-visualizar-pet");
if (fecharVisualizarPet && modalVisualizarPet) {
    fecharVisualizarPet.addEventListener("click", function () {
        modalVisualizarPet.classList.remove("ativo");
    });
}



//BOTOES EXCLUIR
const botoesExcluir = document.querySelectorAll(".btn-excluir");
const modalExclusao = document.getElementById("modal-confirmar-exclusao");
const fecharModalExclusao = document.getElementById("fechar-modal-exclusao");
const cancelarExclusao = document.getElementById("cancelar-exclusao");
const confirmarExclusao = document.getElementById("confirmar-exclusao");

let idParaExcluir = null;
let tipoParaExcluir = null;

botoesExcluir.forEach(function (botao) {

    botao.addEventListener("click", function () {
        idParaExcluir = botao.dataset.id;
        tipoParaExcluir = botao.dataset.tipo;

        console.log("ID:", idParaExcluir);
        console.log("Tipo:", tipoParaExcluir);

        modalExclusao.classList.add("ativo");
    });

});

if (fecharModalExclusao && modalExclusao) {
    fecharModalExclusao.addEventListener("click", function () {
        modalExclusao.classList.remove("ativo");
    });
}

if (cancelarExclusao && modalExclusao) {
    cancelarExclusao.addEventListener("click", function () {
        modalExclusao.classList.remove("ativo");
    });
}

if (confirmarExclusao) {
    confirmarExclusao.addEventListener("click", function () {
        let caminho;
        if (tipoParaExcluir === "pet") {
            caminho = "../actions/pets/delete.php";
        }
        if (tipoParaExcluir === "especie") {
            caminho = "../actions/especies/delete.php";
        }
        if (tipoParaExcluir === "responsavel") {
            caminho = "../actions/responsaveis/delete.php";
        }

        const form = document.createElement("form");

        form.method = "POST";
        form.action = caminho;

        const input = document.createElement("input");

        input.type = "hidden";
        input.name = "id";
        input.value = idParaExcluir;

        form.appendChild(input);

        document.body.appendChild(form);

        console.log("Caminho:", caminho);
        console.log("ID:", idParaExcluir);
        console.log("Tipo:", tipoParaExcluir);
        form.submit();
    });
}

//CONFIG BOTAO DE EDITAR - MODAL COM VALOR DINÂMICO
const botoesEditar = document.querySelectorAll(".btn-editar");
let idParaEditar = null;
let tipoParaEditar = null;

botoesEditar.forEach(function (botao) {
    botao.addEventListener("click", function () {

        idParaEditar = botao.dataset.id;
        tipoParaEditar = botao.dataset.tipo;

        console.log("ID para editar:", idParaEditar);
        console.log("Tipo para editar:", tipoParaEditar);

        //PETS
        if (tipoParaEditar === "pet") {
            const modal = document.getElementById("modal-pet");
            if (modal) { modal.classList.add("ativo");}

            fetch(`../actions/pets/update.php?id=${idParaEditar}`)
                .then(response => response.json())
                .then(pet => {
                    console.log("Dados do pet:", pet);

                    document.getElementById("titulo-modal-pet").textContent = "Editar pet";
                    document.getElementById("btn-submit-pet").textContent = "Salvar alterações";
                    document.getElementById("form-pet").action = "../actions/pets/update.php";

                    document.getElementById("nome").value = pet.nome;
                    document.getElementById("nascimento").value = pet.nascimento;
                    document.getElementById("especie").value = pet.especie_id;
                    document.getElementById("genero").value = pet.genero;
                    document.getElementById("responsavel").value = pet.responsavel_id;
                    document.getElementById("prontuario").value = pet.prontuario;

                    document.getElementById("pet-id").value = pet.id;
                });

        }

        //ESPECIES
        if (tipoParaEditar === "especie") {
            const modal = document.getElementById("modal-especie");
            if (modal) {modal.classList.add("ativo");}
            fetch(`../actions/especies/update.php?id=${idParaEditar}`)
                .then(response => response.json())
                .then(especie => {

                    document.getElementById("titulo-modal-especie").textContent = "Editar Especie";
                    document.getElementById("btn-submit-especie").textContent = "Salvar alterações";
                    document.getElementById("form-especie").action = "../actions/especies/update.php";

                    document.getElementById("especie").value = especie.especie;

                    console.log("Dados da espécie:", especie);
                    document.getElementById("especie-id").value = especie.id;

                });
        }

        //RESPONSAVEIS
        if (tipoParaEditar === "responsavel") {
            const modal = document.getElementById("modal-responsavel");
            if (modal) {modal.classList.add("ativo");}
            fetch(`../actions/responsaveis/update.php?id=${idParaEditar}`)
                .then(response => response.json())
                .then(responsavel => {

                    document.getElementById("titulo-modal-responsavel").textContent = "Editar Responsável";
                    document.getElementById("btn-submit-responsavel").textContent = "Salvar alterações";
                    document.getElementById("form-responsavel").action = "../actions/responsaveis/update.php";

                    console.log("Dados do responsável:", responsavel);
                    document.getElementById("responsavel-id").value = responsavel.id;

                    document.getElementById("nome").value = responsavel.nome;
                    document.getElementById("endereco").value = responsavel.endereco;
                    document.getElementById("telefone").value = responsavel.telefone;

                });
        }
    });

});

