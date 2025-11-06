<?php

    //Variável da pesquisa
    $txt_pesquisa = (isset($_POST['txt_pesquisa']))?$_POST['txt_pesquisa']:"";
    
    //----------------------------------------------
?>

<header>
    <h3> <i class="bi bi-list-task"></i> Equipamentos </h3>
</header>

<div>
    <a class="btn btn-outline-secondary mb-2" href="index.php?menuop=cad-equipamento"><i class="bi bi-list-task"></i> Novo Equipamento </a>
</div>

<div>
    <form action="index.php?menuop=equipamentos" method="post">
        <div class="input-group">
            <input class="form-control" type="text" name="txt_pesquisa" value="<?=$txt_pesquisa?>" placeholder="Pesquisar por nome, descrição, número de série ou situação">>
            <button class="btn btn-outline-success btn-sm" type="submit"><i class="bi bi-search"></i> Pesquisar </button>
        </div>
    </form>
</div>

<div class="tabela1">
<table class="table table-dark table-hover table-bordered table-sm">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Situação</th>
            <th>Número de série</th>
            <th>Local</th>
            <th>Data aquisição</th>            
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
    <?php

        $quantidade = 10;

        $pagina = (isset($_GET['pagina']))?(int)$_GET['pagina']:1;

        $inicio = ($quantidade * $pagina) - $quantidade;

        $sql = "SELECT
            idEquipamento,
            nomeEquipamento, 
            descricaoEquipamento,
            situacaoEquipamento,
            numeroSerieEquipamento,
            localEquipamento,
            DATE_FORMAT(dataAquisicaoEquipamento, '%d/%m/%Y') AS dataAquisicaoEquipamento
            FROM tbequipamentos
            WHERE
            nomeEquipamento LIKE '%{$txt_pesquisa}%' OR
            descricaoEquipamento LIKE '%{$txt_pesquisa}%' OR
            localEquipamento LIKE '%{$txt_pesquisa}%' OR
            numeroSerieEquipamento LIKE '%{$txt_pesquisa}%' OR
            situacaoEquipamento LIKE '%{$txt_pesquisa}%' OR
            DATE_FORMAT(dataAquisicaoEquipamento, '%d/%m/%Y') LIKE '%{$txt_pesquisa}%'
            ORDER BY idEquipamento
            LIMIT $inicio, $quantidade
        ";            

        $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta.".mysqli_error($conexao));
        
        while($dados = mysqli_fetch_assoc($rs)){ //Esse comando tem como objetivo percorrer uma matriz linha por linha formando um vetor de informação e guardando em $dados
    ?>
        <tr>
            <td><?=$dados["idEquipamento"] ?></td>
            <td class="text-nowrap"><?=$dados["nomeEquipamento"] ?></td>
            <td class="text-nowrap"><?=$dados["descricaoEquipamento"] ?></td>
            <td class="text-nowrap"><?=$dados["situacaoEquipamento"] ?></td>
            <td class="text-nowrap"><?=$dados["numeroSerieEquipamento"] ?></td>
            <td class="text-nowrap"><?=$dados["localEquipamento"] ?></td>
            <td class="text-nowrap"><?=$dados["dataAquisicaoEquipamento"] ?></td>

            <td class="text-center">
                <a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-equipamento&idEquipamento=<?=$dados["idEquipamento"] ?>"><i class="bi bi-pencil-square"></i></a>
            </td>

            <td class="text-center">
                <button class="btn btn-outline-danger btn-sm" 
                        data-bs-toggle="modal" 
                        data-bs-target="#modalExcluir" 
                        data-id="<?=$dados['idEquipamento']?>" 
                        data-nome="<?=htmlspecialchars($dados['nomeEquipamento'])?>"
                        data-tipo="este equipamento"
                        data-url="index.php?menuop=excluir-equipamento&idEquipamento=<?=$dados['idEquipamento']?>">
                    <i class="bi bi-trash-fill"></i>
                </button>
            </td>

        </tr>
    <?php
        }
    ?>
    </tbody>
</table>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/sistema-suporte/paginas/modal-exclusao.php"); ?>

<ul class="pagination justify-content-center">

<br>
<?php

    $sqlTotal = "SELECT idEquipamento FROM tbequipamentos";
    $qrTotal = mysqli_query($conexao, $sqlTotal) or die (mysqli_error($conexao));
    $numTotal = mysqli_num_rows($qrTotal);
    $totalPagina = ceil($numTotal/$quantidade);

    echo "<li class='page-item'><spam class='page-link'>Total de equipamentos: $numTotal </spam></li>";
    
    echo '<li class="page-item"><a class="page-link" href="?menuop=equipamentos&pagina=1">Primeira página</a></li>';

    if($pagina>1){
        ?>
            <li class="page-item"><a class="page-link" href="?menuop=equipamentos&pagina=<?php echo $pagina-1?>"> <<< </a></li>
        <?php
    }

    for($i=1;$i<=$totalPagina;$i++){

        if(($i>=($pagina-5)) && ($i<=($pagina+5))){
            if($i==$pagina){
            echo "<li class='page-item active'><span class='page-link'> {$i} </span></li>";
        } else {
            echo "<li class='page-item'><a class='page-link' href=\"?menuop=equipamentos&pagina={$i}\"> {$i} </a></li>";
        }
      }
    }

    if($pagina < ($totalPagina-5)){
        ?>
           <li class="page-item"><a class="page-link" href="?menuop=equipamentos&pagina=<?php echo $pagina+1?>"> >>> </a></li>
        <?php
    }

    echo "<li class='page-item'><a class='page-link' href=\"?menuop=equipamentos&pagina=$totalPagina\"> Última página </a></li>";

?>

</ul>
