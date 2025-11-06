<header>
    <h3>
        <i class="bi bi-trash"></i> Excluir Tarefa
    </h3>
</header>

<?php

$idTarefa = (int)$_GET["idTarefa"];

$sql = "DELETE FROM tbtarefas WHERE idTarefa = {$idTarefa}";
$rs = mysqli_query($conexao, $sql);

if($rs){
    ?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Sucesso!</h4>
        <p>Tarefa excluída com sucesso!</p>
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
        <p>A tarefa não pôde ser excluída.</p>
        <p><strong>Erro:</strong> <?=mysqli_error($conexao)?></p>
        <hr>
        <p class="mb-0">
            <a href="?menuop=tarefas" class="btn btn-primary">Voltar para a lista de tarefas</a>
        </p>
    </div>
    <?php
}

?>