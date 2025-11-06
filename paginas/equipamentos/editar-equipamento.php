<?php

    $idEquipamento = $_GET["idEquipamento"];

    $sql = "SELECT * FROM tbequipamentos WHERE idEquipamento='$idEquipamento'";

    $rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar os dados do registro." . mysqli_error($conexao));
    $dados = mysqli_fetch_assoc($rs);

?>

<header>
    <h3>
        <i class="bi bi-list-task"></i> Editar equipamento
    </h3>
</header>

<div>
    <form class="needs-validation" action="index.php?menuop=atualizar-equipamento" method="post" novalidate>

        <div class="mb-4 col-3">
            <label for="idEquipamento" class="form-label">ID</label>
            <input class="form-control" type="text" name="idEquipamento" id="idEquipamento" value="<?=$dados["idEquipamento"]?>" readonly>
        </div>

        <div class="mb-4">
            <label for="nomeEquipamento" class="form-label">Nome equipamento</label>
            <input class="form-control" type="text" name="nomeEquipamento" id="nomeEquipamento" value="<?=$dados["nomeEquipamento"]?>" required placeholder="Digite o nome do equipamento">
        </div>
        
        <div class="mb-4">
            <label for="descricaoEquipamento" class="form-label">Descrição</label>
            <textarea name="descricaoEquipamento" id="descricaoEquipamento" cols="30" rows="3" class="form-control" required placeholder="Coloque a descrição do equipamento."><?=$dados["descricaoEquipamento"]?></textarea>
        </div>

        <div class="mb-4">
            <label for="situacaoEquipamento" class="form-label">Situação</label>
            <textarea name="situacaoEquipamento" id="situacaoEquipamento" cols="30" rows="3" class="form-control" required placeholder="Descreva a situação do equipamento."><?=$dados["situacaoEquipamento"]?></textarea>
        </div>

        <div class="mb-4">
            <label for="numeroSerieEquipamento" class="form-label">Número de série</label>
            <input class="form-control" type="text" name="numeroSerieEquipamento" id="numeroSerieEquipamento" value="<?=$dados["numeroSerieEquipamento"]?>" required placeholder="Digite o número de série do equipamento">
        </div>

        <div class="row">
            <div class="mb-5 col-5">
                <label for="localEquipamento" class="form-label">Local</label>
                <input class="form-control" type="text" name="localEquipamento" id="localEquipamento" value="<?=$dados["localEquipamento"]?>" required placeholder="Digite o local">
            </div>

            <div class="mb-5 col-3">
                <label for="dataAquisicaoEquipamento" class="form-label">Data de aquisição</label>
                <input class="form-control" type="date" name="dataAquisicaoEquipamento" id="dataAquisicaoEquipamento" value="<?=$dados["dataAquisicaoEquipamento"]?>" required placeholder="Digite a data de aquisição">
            </div>
        </div>

        <div class="mb-5">
            <input class="btn btn-success" type="submit" value="Atualizar" name="btnAtualizar">
            <a href="index.php?menuop=equipamentos" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>
</div>


<?php


?>