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

