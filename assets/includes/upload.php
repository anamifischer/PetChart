<?php

function salvarFoto($arquivo)
{
    //Se o usuário não escolheu foto
    if ($arquivo["error"] == UPLOAD_ERR_NO_FILE) {
        return null;
    }

    //Se deu algum erro no envio
    if ($arquivo["error"] != UPLOAD_ERR_OK) {
        die("Erro ao enviar a imagem.");
    }

    //Pega extensão do arquivo
    $extensao = strtolower(pathinfo($arquivo["name"], PATHINFO_EXTENSION));

    //Só aceita estes formatos
    $permitidas = ["jpg", "jpeg", "png", "webp"];

    if (!in_array($extensao, $permitidas)) {
        die("Formato inválido. Use jpg, png ou webp.");
    }

    //Cria um nome único pra foto não sobrescrever outra
    $nomeNovo = uniqid() . "." . $extensao;

    //Move a foto pra pasta uploads
    $destino = __DIR__ . "/../../uploads/pets/" . $nomeNovo;
    move_uploaded_file($arquivo["tmp_name"], $destino);

    //Devolve o nome pra salvar no banco
    return $nomeNovo;
}