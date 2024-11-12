<?php

$id = $_GET['id'];

require_once "conexao.php";
$conexao = conectar();

$sql = "DELETE FROM mito WHERE id = $id";
$retorno = executarSQL($conexao, $sql);
echo json_decode($retorno);