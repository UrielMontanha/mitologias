<?php

function conectar()
{
    $conexao = mysqli_connect(
        "localhost",
        "root",
        "",
        "mitologias"
    );

    if ($conexao === false) {
        echo "Problemas para conectar no banco. Erro: ";
        echo mysqli_connect_error();
        die();
    }

    return $conexao;

}
