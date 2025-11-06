<header>
    <h3>
        <i class="bi bi-calendar-check"></i> Atualizar chamado
    </h3>
</header>


<?php

    $idChamado = strip_tags (mysqli_real_escape_string ($conexao, $_POST['idChamado']));
    $tituloChamado = strip_tags (mysqli_real_escape_string ($conexao, $_POST['tituloChamado']));
    $descricaoChamado = strip_tags (mysqli_real_escape_string ($conexao, $_POST['descricaoChamado']));
    $localChamado = strip_tags (mysqli_real_escape_string ($conexao, $_POST['localChamado']));
    $responsavelChamado = strip_tags (mysqli_real_escape_string ($conexao, $_POST['responsavelChamado']));
    $solucaoChamado = strip_tags (mysqli_real_escape_string ($conexao, $_POST['solucaoChamado']));
    $prioridadeChamado = strip_tags (mysqli_real_escape_string ($conexao, $_POST['prioridadeChamado']));
    $dataInicioChamado = strip_tags (mysqli_real_escape_string ($conexao, $_POST['dataInicioChamado']));
    $horaInicioChamado = strip_tags (mysqli_real_escape_string ($conexao, $_POST['horaInicioChamado']));
    $dataFimChamado = strip_tags (mysqli_real_escape_string ($conexao, $_POST['dataFimChamado']));
    $horaFimChamado = strip_tags (mysqli_real_escape_string ($conexao, $_POST['horaFimChamado']));
    
    $sql = "UPDATE tbchamados SET
    tituloChamado = '{$tituloChamado}',
    descricaoChamado = '{$descricaoChamado}',
    localChamado = '{$localChamado}',
    responsavelChamado = '{$responsavelChamado}',
    solucaoChamado = '{$solucaoChamado}',
    prioridadeChamado = '{$prioridadeChamado}',
    dataInicioChamado = '{$dataInicioChamado}',
    horaInicioChamado = '{$horaInicioChamado}',
    dataFimChamado = '{$dataFimChamado}',
    horaFimChamado = '{$horaFimChamado}'
    WHERE idChamado = '{$idChamado}'
    ";

    $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta." . mysqli_error($conexao));

    if($rs){
        ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Atualizar Chamado</h4>
                <p>Chamado atualizado com sucesso!</p>
                <hr>
                <p class="mb-0">
                    <a href="?menuop=chamados">Voltar para a lista de chamados</a>
                </p>
        </div>
        <?php
    }else{
        ?>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Erro</h4>
                <p>O chamado não pôde ser atualizada.</p>
                <hr>
                <p class="mb-0">
                    <a href="?menuop=chamados">Voltar para a lista de chamados</a>
                </p>
        </div>
        <?php
    }

?>
