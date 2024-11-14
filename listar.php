<?php

require_once "conexao.php";
$conexao = conectar();

$sql = "SELECT * FROM mito";
$resultado = executarSQL($conexao, $sql);
$mitologia = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
echo json_encode($mitologia);