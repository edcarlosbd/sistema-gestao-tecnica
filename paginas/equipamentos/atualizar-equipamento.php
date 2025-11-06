<header>
    <h3>
        <i class="bi bi-list-task"></i> Atualizar equipamento
    </h3>
</header>


<?php

    $idEquipamento = strip_tags (mysqli_real_escape_string ($conexao, $_POST['idEquipamento']));
    $nomeEquipamento = strip_tags (mysqli_real_escape_string ($conexao, $_POST['nomeEquipamento']));
    $descricaoEquipamento = strip_tags (mysqli_real_escape_string ($conexao, $_POST['descricaoEquipamento']));
    $situacaoEquipamento = strip_tags (mysqli_real_escape_string ($conexao, $_POST['situacaoEquipamento']));
    $numeroSerieEquipamento = strip_tags (mysqli_real_escape_string ($conexao, $_POST['numeroSerieEquipamento']));
    $localEquipamento = strip_tags (mysqli_real_escape_string ($conexao, $_POST['localEquipamento']));
    $dataAquisicaoEquipamento = strip_tags (mysqli_real_escape_string ($conexao, $_POST['dataAquisicaoEquipamento']));

    $sql = "UPDATE tbequipamentos SET
    nomeEquipamento = '{$nomeEquipamento}',
    descricaoEquipamento = '{$descricaoEquipamento}',
    situacaoEquipamento = '{$situacaoEquipamento}',
    numeroSerieEquipamento = '{$numeroSerieEquipamento}',
    localEquipamento = '{$localEquipamento}',
    dataAquisicaoEquipamento = '{$dataAquisicaoEquipamento}'
    WHERE idEquipamento = '{$idEquipamento}'
    ";

    $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta." . mysqli_error());

    if($rs){
        ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Atualizar equipamento</h4>
                <p>Equipamento atualizado com sucesso!</p>
                <hr>
                <p class="mb-0">
                    <a href="?menuop=equipamentos">Voltar para a lista de equipamentos</a>
                </p>
        </div>
        <?php
    }else{
        ?>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Erro</h4>
                <p>O equipamento não pôde ser atualizado.</p>
                <hr>
                <p class="mb-0">
                    <a href="?menuop=equipamentos">Voltar para a lista de equipamentos</a>
                </p>
        </div>
        <?php
    }

?>
