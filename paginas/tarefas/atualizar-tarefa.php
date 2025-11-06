<header>
    <h3>
        <i class="bi bi-list-task"></i> Atualizar Tarefa
    </h3>
</header>

<?php

$idTarefa = (int)strip_tags(mysqli_real_escape_string($conexao, $_POST['idTarefa']));
$tituloTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['tituloTarefa']));
$descricaoTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['descricaoTarefa']));
$localTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['localTarefa']));
$setorTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['setorTarefa']));
$responsavelTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['responsavelTarefa']));
$prazoTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['prazoTarefa']));


// Converte prazo vazio para NULL - CORREÇÃO AQUI
$prazoSQL = (!empty($prazoTarefa) && $prazoTarefa != '') ? "'{$prazoTarefa}'" : "NULL";


$sql = "UPDATE tbtarefas SET
    tituloTarefa = '{$tituloTarefa}',
    descricaoTarefa = '{$descricaoTarefa}',
    localTarefa = '{$localTarefa}',
    setorTarefa = '{$setorTarefa}',
    responsavelTarefa = '{$responsavelTarefa}',
    prazoTarefa = {$prazoSQL}
    WHERE idTarefa = {$idTarefa}
";


$rs = mysqli_query($conexao, $sql);

if($rs){
    ?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Sucesso!</h4>
        <p>Tarefa atualizada com sucesso!</p>
        <hr>
        <p class="mb-0">
            <a href="?menuop=tarefas" class="btn btn-primary">Voltar para a lista de tarefas</a>
        </p>
    </div>
    <?php
}else{
    ?>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Erro!</h4>
        <p>A tarefa não pôde ser atualizada.</p>
        <p><strong>Erro:</strong> <?=mysqli_error($conexao)?></p>
        <hr>
        <p class="mb-0">
            <a href="?menuop=editar-tarefa&idTarefa=<?=$idTarefa?>" class="btn btn-secondary">Tentar novamente</a>
            <a href="?menuop=tarefas" class="btn btn-primary">Voltar para a lista</a>
        </p>
    </div>
    <?php
}

?>