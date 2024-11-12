<?php

require_once "conexao.php";
$conexao = conectar();

$mitologia = json_decode(file_get_contents("php://input"));

$sql = "INSERT INTO mito
    (nomit, nodeu, hist)
    VALUES
    (
    '$mitologia->nomit',
    '$mitologia->nodeu',
    '$mitologia->hist')";

executarSQL($conexao, $sql);

$mitologia->id = mysqli_insert_id($conexao);
echo json_encode($mitologia);
