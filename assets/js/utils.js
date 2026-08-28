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