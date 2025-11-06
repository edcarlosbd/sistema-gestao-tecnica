<header>
    <h3>Excluir Chamado</h3>

</header>


<?php

    $idChamado = $_GET["idChamado"];

    $sql = "DELETE FROM tbchamados WHERE idChamado ='$idChamado'";
    $rs = mysqli_query($conexao,$sql);

    if($rs){
        ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Excluir chamado</h4>
                <p>Chamado excluído com sucesso!</p>
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
                <p>O chamado não pôde ser excluído.</p>
                <hr>
                <p class="mb-0">
                    <a href="?menuop=chamados">Voltar para a lista de chamados</a>
                </p>
        </div>
        <?php
    }

?>
