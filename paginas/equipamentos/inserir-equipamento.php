<header>
    <h3>
        <i class="bi bi-list-task"></i> Inserir equipamento
    </h3>
</header>


<?php

$nomeEquipamento = strip_tags (mysqli_real_escape_string ($conexao, $_POST['nomeEquipamento']));
$descricaoEquipamento = strip_tags (mysqli_real_escape_string ($conexao, $_POST['descricaoEquipamento']));
$situacaoEquipamento = strip_tags (mysqli_real_escape_string ($conexao, $_POST['situacaoEquipamento']));
$numeroSerieEquipamento = strip_tags (mysqli_real_escape_string ($conexao, $_POST['numeroSerieEquipamento']));
$localEquipamento = strip_tags (mysqli_real_escape_string ($conexao, $_POST['localEquipamento']));
$dataAquisicaoEquipamento = strip_tags (mysqli_real_escape_string ($conexao, $_POST['dataAquisicaoEquipamento']));

$sql = "INSERT INTO tbequipamentos 
(   
    nomeEquipamento,
    descricaoEquipamento,
    situacaoEquipamento,
    numeroSerieEquipamento,
    localEquipamento,
    dataAquisicaoEquipamento    
)
VALUES 
(
    '{$nomeEquipamento}',
    '{$descricaoEquipamento}',
    '{$situacaoEquipamento}',
    '{$numeroSerieEquipamento}',
    '{$localEquipamento}',
    '{$dataAquisicaoEquipamento}'
)
";

$rs = mysqli_query($conexao, $sql);

if($rs){
    ?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Inserir Equipamento</h4>
            <p>Equipamento inserido com sucesso!</p>
            <hr>
            <p class="mb-0">
                <a href="?menuop=equipamentos">Voltar para a lista de </a>
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
