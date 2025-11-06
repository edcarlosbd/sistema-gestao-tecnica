<header>
    <h3>
        <i class="bi bi-list-task"></i> Inserir Tarefa
    </h3>
</header>

<?php

$tituloTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['tituloTarefa']));
$descricaoTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['descricaoTarefa']));
$localTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['localTarefa']));
$setorTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['setorTarefa']));
$responsavelTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['responsavelTarefa']));
$prazoTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['prazoTarefa']));

// Converte prazo vazio para NULL - VERIFICAÇÃO CORRETA
$prazoSQL = (!empty($prazoTarefa) && $prazoTarefa != '') ? "'{$prazoTarefa}'" : "NULL";

$sql = "INSERT INTO tbtarefas 
(   
    tituloTarefa,
    descricaoTarefa,
    localTarefa,
    setorTarefa,
    responsavelTarefa,
    prazoTarefa,
    statusTarefa
)
VALUES 
(
    '{$tituloTarefa}',
    '{$descricaoTarefa}',
    '{$localTarefa}',
    '{$setorTarefa}',
    '{$responsavelTarefa}',
    {$prazoSQL},
    0
)
";

$rs = mysqli_query($conexao, $sql);

if($rs){
    ?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Sucesso!</h4>
        <p>Tarefa inserida com sucesso!</p>
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
        <p>A tarefa não pôde ser inserida.</p>
        <p><strong>Erro:</strong> <?=mysqli_error($conexao)?></p>
        <hr>
        <p class="mb-0">
            <a href="?menuop=cad-tarefa" class="btn btn-secondary">Tentar novamente</a>
        </p>
    </div>
    <?php
}

?>
