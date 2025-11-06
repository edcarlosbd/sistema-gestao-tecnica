<header>
    <h3>
        <i class="bi bi-list-task"></i> Inserir chamado
    </h3>
</header>


<?php

$tituloChamado = strip_tags (mysqli_real_escape_string ($conexao, $_POST['tituloChamado']));
$descricaoChamado = strip_tags (mysqli_real_escape_string ($conexao, $_POST['descricaoChamado']));
$dataInicioChamado = strip_tags (mysqli_real_escape_string ($conexao, $_POST['dataInicioChamado']));
$horaInicioChamado = strip_tags (mysqli_real_escape_string ($conexao, $_POST['horaInicioChamado']));
$dataFimChamado = strip_tags (mysqli_real_escape_string ($conexao, $_POST['dataFimChamado']));
$horaFimChamado = strip_tags (mysqli_real_escape_string ($conexao, $_POST['horaFimChamado']));
$localChamado = strip_tags (mysqli_real_escape_string ($conexao, $_POST['localChamado']));
$responsavelChamado = strip_tags (mysqli_real_escape_string ($conexao, $_POST['responsavelChamado']));
$solucaoChamado = strip_tags (mysqli_real_escape_string ($conexao, $_POST['solucaoChamado']));
$prioridadeChamado = strip_tags (mysqli_real_escape_string ($conexao, $_POST['prioridadeChamado']));

$sql = "INSERT INTO tbchamados 
(   
    tituloChamado,
    descricaoChamado,
    dataInicioChamado,
    horaInicioChamado,
    dataFimChamado,
    horaFimChamado,
    localChamado,
    responsavelChamado,
    solucaoChamado,
    prioridadeChamado    
)
VALUES 
(
    '{$tituloChamado}',
    '{$descricaoChamado}',
    '{$dataInicioChamado}',
    '{$horaInicioChamado}',
    '{$dataFimChamado}',
    '{$horaFimChamado}',
    '{$localChamado}',
    '{$responsavelChamado}',
    '{$solucaoChamado}',
    '{$prioridadeChamado}'
)
";

$rs = mysqli_query($conexao, $sql);

if($rs){
    ?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Inserir Chamado</h4>
            <p>Chamado inserido com sucesso!</p>
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
            <p>O chamado não pôde ser inserido.</p>
            <hr>
            <p class="mb-0">
                <a href="?menuop=chamados">Voltar para a lista de chamados</a>
            </p>
    </div>
    <?php
}

?>
