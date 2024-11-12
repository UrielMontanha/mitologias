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

function executarSQL($conexao, $sql)
{
    $resultado = mysqli_query($conexao, $sql);
    if ($resultado === false) {
        echo "Erro ao executar o comando SQL. " . mysqli_errno($conexao) . ": " . mysqli_error($conexao);
        die();
    }
    return $resultado;
}
