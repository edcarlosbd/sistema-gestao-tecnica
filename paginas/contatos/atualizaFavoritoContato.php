<?php
include("../../db/conexao.php");

header('Content-Type: application/json');

$idContato = isset($_GET['idContato']) ? (int)$_GET['idContato'] : 0;
$flagFavoritoContato = isset($_GET['flagFavoritoContato']) ? (int)$_GET['flagFavoritoContato'] : 0;

$sql = "UPDATE tbcontatos SET 
        flagFavoritoContato = {$flagFavoritoContato} 
        WHERE idContato = {$idContato}";

$resultado = mysqli_query($conexao, $sql);

if($resultado){
    $response = array(
        'success' => true,
        'message' => 'Favorito atualizado com sucesso',
        'idContato' => $idContato,
        'flagFavorito' => $flagFavoritoContato
    );
} else {
    $response = array(
        'success' => false,
        'message' => 'Erro ao atualizar: ' . mysqli_error($conexao)
    );
}

echo json_encode($response);
?>