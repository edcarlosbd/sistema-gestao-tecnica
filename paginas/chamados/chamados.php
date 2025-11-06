<?php

    //Variável da pesquisa
    $txt_pesquisa = (isset($_POST['txt_pesquisa']))?$_POST['txt_pesquisa']:"";


    //Alterna entre status concluído e não concluído
    $idChamado = (isset($_GET['idChamado']) and is_numeric($_GET['idChamado'])) ? $_GET['idChamado'] : 0;
    $statusChamado = (isset($_GET['statusChamado']) and ($_GET['statusChamado']=='0')) ? '1' : '0';

    if ($idChamado > 0) {
       $sql = "UPDATE tbchamados SET statusChamado = {$statusChamado} WHERE idChamado = {$idChamado}";
        $rs = mysqli_query($conexao, $sql);
    }
    
    //----------------------------------------------
?>

<header>
    <h3> <i class="bi bi-calendar-check"></i> Chamados </h3>
</header>

<div>
    <a class="btn btn-outline-secondary mb-2" href="index.php?menuop=cad-chamado"><i class="bi bi-list-task"></i> Novo Chamado </a>
</div>

<div>
    <form action="index.php?menuop=chamados" method="post">
        <div class="input-group">
            <input class="form-control" type="text" name="txt_pesquisa" value="<?=$txt_pesquisa?>" placeholder="Pesquisar por título, descrição ou prioridade">
            <button class="btn btn-outline-success btn-sm" type="submit"><i class="bi bi-search"></i> Pesquisar </button>
        </div>
    </form>
</div>

<div class="tabela1 tabela-chamados">
  <table class="table table-dark table-hover table-bordered table-sm">
    <thead>
        <tr>
            <th>Status</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>Data da início</th>
            <th>Hora da início</th>
            <th>Data de término</th>
            <th>Hora de término</th>
            <th>Local Chamado</th>
            <th>Responsável</th>
            <th>Solução</th>
            <th>Prioridade</th>
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
            idChamado,
            statusChamado, 
            tituloChamado,
            descricaoChamado,
            localChamado,
            responsavelChamado,
            solucaoChamado,
            prioridadeChamado,
            DATE_FORMAT(dataInicioChamado, '%d/%m/%Y') AS dataInicioChamado, 
            horaInicioChamado, 
            dataFimChamado, 
            horaFimChamado
            FROM tbchamados
            WHERE
            tituloChamado LIKE '%{$txt_pesquisa}%' OR
            descricaoChamado LIKE '%{$txt_pesquisa}%' OR
            prioridadeChamado LIKE '%{$txt_pesquisa}%' OR
            DATE_FORMAT(dataInicioChamado, '%d/%m/%Y') LIKE '%{$txt_pesquisa}%'
            ORDER BY statusChamado, 
                CASE prioridadeChamado 
                WHEN 'Alta' THEN 1 
                WHEN 'Média' THEN 2 
                WHEN 'Baixa' THEN 3 
                ELSE 4 
                END,
                dataInicioChamado
            LIMIT $inicio, $quantidade
        ";
            
        $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta.".mysqli_error($conexao));
        
        while($dados = mysqli_fetch_assoc($rs)){
    ?>
        <tr>
            <td>
                <a class="btn btn-secondary btn-sm" href="index.php?menuop=chamados&pagina=<?=$pagina?>&idChamado=<?=$dados['idChamado']?>&statusChamado=<?=$dados['statusChamado']?>">
                    <?php
                        if($dados['statusChamado']==0) {
                            echo '<i class="bi bi-square"></i>';
                        } else {
                            echo '<i class="bi bi-check-square"></i>';
                        } 
                    ?>
                </a>
            </td>
            <td class="text-nowrap"><?=$dados["tituloChamado"] ?></td>
            <td class="text-nowrap"><?=$dados["descricaoChamado"] ?></td>
            <td class="text-nowrap"><?=$dados["dataInicioChamado"] ?></td>
            <td class="text-nowrap"><?=$dados["horaInicioChamado"] ?></td>
            <td class="text-nowrap"><?=$dados["dataFimChamado"] ?></td>
            <td class="text-nowrap"><?=$dados["horaFimChamado"] ?></td>
            <td class="text-nowrap"><?=$dados["localChamado"] ?></td>
            <td class="text-nowrap"><?=$dados["responsavelChamado"] ?></td>
            <td class="text-nowrap"><?=$dados["solucaoChamado"] ?></td>
            <td>
                <?php
                    $prioridade = $dados["prioridadeChamado"];
                    if ($prioridade == 'Alta') {
                    echo "<span class='badge bg-danger'>Alta</span>";
                    } elseif ($prioridade == 'Média') {
                    echo "<span class='badge bg-warning text-dark'>Média</span>";
                    } else {
                    echo "<span class='badge bg-success'>Baixa</span>";
                    }
                ?>
            </td>

            <td class="text-center">
                <a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-chamado&idChamado=<?=$dados["idChamado"] ?>">
                    <i class="bi bi-pencil-square"></i>
                </a>
            </td>
            
            <td class="text-center">
                <button type="button" 
                        class="btn btn-outline-danger btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#modalExcluir"
                        data-id="<?=$dados['idChamado']?>"
                        data-nome="<?=htmlspecialchars($dados['tituloChamado'])?>"
                        data-tipo="este chamado"
                        data-url="index.php?menuop=excluir-chamado&idChamado=<?=$dados['idChamado']?>">
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

    $sqlTotal = "SELECT idChamado FROM tbChamados";
    $qrTotal = mysqli_query($conexao, $sqlTotal) or die (mysqli_error($conexao));
    $numTotal = mysqli_num_rows($qrTotal);
    $totalPagina = ceil($numTotal/$quantidade);

    echo "<li class='page-item'><spam class='page-link'>Total de Chamados: $numTotal </spam></li>";
    
    echo '<li class="page-item"><a class="page-link" href="?menuop=chamados&pagina=1">Primeira página</a></li>';

    if($pagina>6){
        ?>
            <li class="page-item"><a class="page-link" href="?menuop=chamados&pagina=<?php echo $pagina-1?>"> <<< </a></li>
        <?php
    }

    for($i=1;$i<=$totalPagina;$i++){

        if(($i>=($pagina-5)) && ($i<=($pagina+5))){
            if($i==$pagina){
            echo "<li class='page-item active'><span class='page-link'> {$i} </span></li>";
        } else {
            echo "<li class='page-item'><a class='page-link' href=\"?menuop=chamados&pagina={$i}\"> {$i} </a></li>";
        }
      }
    }

    if($pagina < ($totalPagina-5)){
        ?>
           <li class="page-item"><a class="page-link" href="?menuop=chamados&pagina=<?php echo $pagina+1?>"> >>> </a></li>
        <?php
    }

    echo "<li class='page-item'><a class='page-link' href=\"?menuop=chamados&pagina=$totalPagina\"> Última página </a></li>";

?>

</ul>
