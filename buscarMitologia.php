<?php

$mitologia = $_GET['id'];

require_once "conexao.php";
$conexao = conectar();

$sql = "SELECT * FROM mito 
        WHERE id = $mitologia";
$resultado = executarSQL($conexao, $sql);
$mitologias = mysqli_fetch_assoc($resultado);
echo json_encode($mitologias);