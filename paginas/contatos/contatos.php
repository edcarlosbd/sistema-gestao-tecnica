<?php

    //Variavel da pesquisa
    $txt_pesquisa = (isset($_POST["txt_pesquisa"]))?$_POST["txt_pesquisa"]:"";

?>

<header>
    <h3> <i class="bi bi-person-square"></i> Contatos </h3>
</header>

<div>
    <a class="btn btn-outline-secondary mb-2" href="index.php?menuop=cad-contato"><i class="bi bi-person-square"></i> Novo Contato </a>
</div>

<div>
    <form action="index.php?menuop=contatos" method="post">
        <div class="input-group">
            <input class="form-control" type="text" name="txt_pesquisa" value="<?=$txt_pesquisa?>" placeholder="Pesquisar por nome, email, telefone, empresa ou tipo de serviço">
            <button class="btn btn-outline-success btn-sm" type="submit"><i class="bi bi-search"></i> Pesquisar </button>
        </div>
    </form>
</div>

<div class="tabela1">
<table class="table table-dark table-hover table-bordered table-sm">
    <thead>
        <tr>
            <th><i class="bi bi-star-fill"></i></th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Tipo de serviço</th>
            <th>Empresa</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
    <?php

        $quantidade = 10;

        $pagina = (isset($_GET['pagina']))?(int)$_GET['pagina']:1;

        $inicio = ($quantidade * $pagina) - $quantidade;

        // SQL simplificado - apenas os campos necessários
        $sql = "SELECT 
            idContato,
            upper(nomeContato) AS nomeContato,
            lower(emailContato) AS emailContato,
            telefoneContato,
            tipoServicoContato,
            empresaContato,
            flagFavoritoContato
            FROM tbcontatos 
            WHERE 
            nomeContato LIKE '%{$txt_pesquisa}%'
            OR emailContato LIKE '%{$txt_pesquisa}%'
            OR telefoneContato LIKE '%{$txt_pesquisa}%'
            OR tipoServicoContato LIKE '%{$txt_pesquisa}%'
            OR empresaContato LIKE '%{$txt_pesquisa}%'
            ORDER BY flagFavoritoContato DESC, nomeContato ASC
            LIMIT $inicio, $quantidade
            ";
            
        $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta.".mysqli_error($conexao));
        
        while($dados = mysqli_fetch_assoc($rs)){
    ?>
        <tr>
            <td class="text-center">
                <?php
                    if($dados["flagFavoritoContato"]==1){
                        echo "<a href=\"#\" class=\"flagFavoritoContato link-warning\" title=\"Favorito\" id=\"{$dados["idContato"]}\">
                            <i class=\"bi bi-star-fill\"></i>
                        </a>";
                    } else {
                        echo "<a href=\"#\" class=\"flagFavoritoContato link-warning\" title=\"Não Favorito\" id=\"{$dados["idContato"]}\">
                        <i class=\"bi bi-star\"></i>
                    </a>";
                    }
                ?>
            </td>
            <td class="text-nowrap"><?=$dados["nomeContato"] ?></td>
            <td class="text-nowrap"><?=$dados["emailContato"] ?></td>
            <td class="text-nowrap"><?=$dados["telefoneContato"] ?></td>
            <td class="text-nowrap"><?=$dados["tipoServicoContato"] ?></td>
            <td class="text-nowrap"><?=$dados["empresaContato"] ?></td>
            
            <td class="text-center">
                <a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-contato&idContato=<?=$dados["idContato"] ?>">
                    <i class="bi bi-pencil-square"></i>
                </a>
            </td>
            
            <td class="text-center">
                <button type="button" 
                        class="btn btn-outline-danger btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#modalExcluir"
                        data-id="<?=$dados['idContato']?>"
                        data-nome="<?=htmlspecialchars($dados['nomeContato'])?>"
                        data-tipo="este contato"
                        data-url="index.php?menuop=excluir-contato&idContato=<?=$dados['idContato']?>">
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

    $sqlTotal = "SELECT idContato FROM tbcontatos";
    $qrTotal = mysqli_query($conexao, $sqlTotal) or die (mysqli_error($conexao));
    $numTotal = mysqli_num_rows($qrTotal);
    $totalPagina = ceil($numTotal/$quantidade);

    echo "<li class='page-item'><span class='page-link'>Total de contatos: $numTotal </span></li>";
    
    echo '<li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=1">Primeira página</a></li>';

    if($pagina>1){
        ?>
            <li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=<?php echo $pagina-1?>"> <<< </a></li>
        <?php
    }

    for($i=1;$i<=$totalPagina;$i++){

        if(($i>=($pagina-5)) && ($i<=($pagina+5))){
            if($i==$pagina){
                echo "<li class='page-item active'><span class='page-link'> {$i} </span></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href=\"?menuop=contatos&pagina={$i}\"> {$i} </a></li>";
            }
        }
    }

    if($pagina < ($totalPagina-5)){
        ?>
           <li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=<?php echo $pagina+1?>"> >>> </a></li>
        <?php
    }

    echo "<li class='page-item'><a class='page-link' href=\"?menuop=contatos&pagina=$totalPagina\"> Última página </a></li>";

?>
</ul>