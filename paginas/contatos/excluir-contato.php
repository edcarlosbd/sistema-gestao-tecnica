<header>
    <h3>Excluir</h3>
</header>

<?php
    $idContato = mysqli_real_escape_string($conexao, $_GET["idContato"]);
    $sql = "DELETE FROM tbcontatos WHERE idcontato= '{$idContato}'";

    mysqli_query($conexao, $sql) or die("Erro ao excluir o registro." . mysqli_error($conexao));
    echo "Registro excluído com sucesso!";
?>
