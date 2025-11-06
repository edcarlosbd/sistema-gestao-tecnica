<?php

    $idChamado = $_GET["idChamado"];

    $sql = "SELECT * FROM tbchamados WHERE idChamado='$idChamado'";

    $rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar os dados do registro." . mysqli_error($conexao));
    $dados = mysqli_fetch_assoc($rs);

?>

<header>
    <h3>
        <i class="bi bi-list-task"></i> Editar chamado
    </h3>
</header>

<div>
    <form class="needs-validation" action="index.php?menuop=atualizar-chamado" method="post" novalidate>

        <div class="mb-3 col-3">
            <label for="idChamado" class="form-label">ID</label>
            <input class="form-control" type="text" name="idChamado" id="idChamado" value="<?=$dados["idChamado"]?>" readonly>
        </div>

        <div class="mb-3">
            <label for="tituloChamado" class="form-label">Título</label>
            <input class="form-control" type="text" name="tituloChamado" id="tituloChamado" value="<?=$dados["tituloChamado"]?>" required placeholder="Digite o título do chamado">
        </div>
        
        <div class="mb-3">
            <label for="descricaoChamado" class="form-label">Descrição</label>
            <textarea name="descricaoChamado" id="descricaoChamado" cols="30" rows="5" class="form-control" required><?=$dados["descricaoChamado"]?></textarea>
        </div>

        <div class="mb-3 col-3" >
            <label for="localChamado" class="form-label">Local</label>
            <input class="form-control" type="text" name="localChamado" id="localChamado" value="<?=$dados["localChamado"]?>" required placeholder="Digite o local do chamado">
        </div>

        <div class="mb-3 col-3" >
            <label for="responsavelChamado" class="form-label">Responsável</label>
            <input class="form-control" type="text" name="responsavelChamado" id="responsavelChamado" value="<?=$dados["responsavelChamado"]?>" required placeholder="Digite o responsável pelo chamado">
        </div>

        <div class="mb-3">
            <label for="solucaoChamado" class="form-label">Solução</label>
            <textarea name="solucaoChamado" id="solucaoChamado" cols="30" rows="5" class="form-control" required><?=$dados["solucaoChamado"]?></textarea>
        </div>

        <div class="mb-3 col-3">
            <label for="prioridadeChamado" class="form-label">Prioridade</label>
            <select class="form-select" name="prioridadeChamado" id="prioridadeChamado" required>
                <option value="">Selecione...</option>
                <option value="Baixa"  <?= ($dados["prioridadeChamado"] == "Baixa")  ? "selected" : "" ?>>Baixa</option>
                <option value="Média"  <?= ($dados["prioridadeChamado"] == "Média")  ? "selected" : "" ?>>Média</option>
                <option value="Alta"   <?= ($dados["prioridadeChamado"] == "Alta")   ? "selected" : "" ?>>Alta</option>
                <option value="Crítica"<?= ($dados["prioridadeChamado"] == "Crítica")? "selected" : "" ?>>Crítica</option>
            </select>
        </div>

        <div class="row">
            <div class="mb-3 col-3">                
                <label for="dataInicioChamado" class="form-label">Data início do chamado</label>
                <input class="form-control" type="date" name="dataInicioChamado" id="dataInicioChamado" value="<?=$dados["dataInicioChamado"]?>" required>
            </div>
            <div class="mb-3 col-3">
                <label for="horaInicioChamado" class="form-label">Hora do início do chamado</label>
                <input class="form-control" type="time" name="horaInicioChamado" id="horaInicioChamado" value="<?=$dados["horaInicioChamado"]?>"required>
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-3">                
                <label for="dataFimChamado" class="form-label">Data fim do chamado</label>
                <input class="form-control" type="date" name="dataFimChamado" id="dataFimChamado" value="<?=$dados["dataFimChamado"]?>">
            </div>
            <div class="mb-3 col-3">
                <label for="horaFimChamado" class="form-label">Hora fim do chamado</label>
                <input class="form-control" type="time" name="horaFimChamado" id="horaFimChamado" value="<?=$dados["horaFimChamado"]?>">
            </div>
        </div>

        
        <div class="mb-3">
            <input class="btn btn-success" type="submit" value="Atualizar" name="btnAtualizar">
            <a href="index.php?menuop=chamados" class="btn btn-secondary">Cancelar</a>
        </div>


    </form>
</div>


<?php


?>