<?php

$idTarefa = (int)$_GET["idTarefa"];

$sql = "SELECT * FROM tbtarefas WHERE idTarefa={$idTarefa}";

$rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar os dados do registro: " . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);

?>

<header>
    <h3>
        <i class="bi bi-pencil-square"></i> Editar Tarefa
    </h3>
</header>

<div>
    <form class="needs-validation" action="index.php?menuop=atualizar-tarefa" method="post" novalidate>

        <div class="mb-3 col-3">
            <label for="idTarefa" class="form-label">ID</label>
            <input class="form-control" type="text" name="idTarefa" id="idTarefa" value="<?=$dados["idTarefa"]?>" readonly>
        </div>

        <div class="mb-3">
            <label for="tituloTarefa" class="form-label">Título</label>
            <input class="form-control" type="text" name="tituloTarefa" id="tituloTarefa" value="<?=htmlspecialchars($dados["tituloTarefa"])?>" required placeholder="Digite o título da tarefa">
        </div>
        
        <div class="mb-3">
            <label for="descricaoTarefa" class="form-label">Descrição</label>
            <textarea name="descricaoTarefa" id="descricaoTarefa" cols="30" rows="5" required class="form-control"><?=htmlspecialchars($dados["descricaoTarefa"])?></textarea>
        </div>

        <div class="row">
            <div class="mb-3 col-4">
                <label for="localTarefa" class="form-label">Local</label>
                <input class="form-control" type="text" name="localTarefa" id="localTarefa" value="<?=htmlspecialchars($dados["localTarefa"])?>" required placeholder="Local da tarefa">
            </div>
            <div class="mb-3 col-4">
                <label for="setorTarefa" class="form-label">Setor</label>
                <input class="form-control" type="text" name="setorTarefa" id="setorTarefa" value="<?=htmlspecialchars($dados["setorTarefa"])?>" required placeholder="Setor responsável">
            </div>
            <div class="mb-3 col-4">
                <label for="responsavelTarefa" class="form-label">Responsável</label>
                <input class="form-control" type="text" name="responsavelTarefa" id="responsavelTarefa" value="<?=htmlspecialchars($dados["responsavelTarefa"])?>" required placeholder="Nome do responsável">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-6">                
                <label for="prazoTarefa" class="form-label">Prazo (Data Limite)</label>
                <input class="form-control" type="date" name="prazoTarefa" id="prazoTarefa" value="<?=$dados["prazoTarefa"]?>" required>
                <small style="color: #4da3ff;">Data limite para conclusão da tarefa</small>
            </div>
        </div>

        <div class="alert alert-info">
            <strong>Status da tarefa:</strong> 
            <?php 
            if($dados["statusTarefa"] == 1) {
                echo "✓ Concluída";
                if($dados["dataConclusaoTarefa"]) {
                    echo " em " . date('d/m/Y', strtotime($dados["dataConclusaoTarefa"]));
                    if($dados["horaConclusaoTarefa"]) {
                        echo " às " . $dados["horaConclusaoTarefa"];
                    }
                }
            } else {
                echo "Pendente";
            }
            ?>
        </div>

        <div class="mb-3">
            <input class="btn btn-success" type="submit" value="Atualizar" name="btnAtualizar">
            <a href="index.php?menuop=tarefas" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>
</div>