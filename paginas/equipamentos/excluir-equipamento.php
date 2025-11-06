<header>
    <h3>Excluir Equipamento</h3>

</header>


<?php

    $idEquipamento = $_GET["idEquipamento"];

    $sql = "DELETE FROM tbequipamentos WHERE idEquipamento ='$idEquipamento'";
    $rs = mysqli_query($conexao,$sql);

    if($rs){
        ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Excluir equipamento</h4>
                <p>Equipamento excluído com sucesso!</p>
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
                <p>O equipamento não pôde ser excluído.</p>
                <hr>
                <p class="mb-0">
                    <a href="?menuop=equipamentos">Voltar para a lista de equipamentos</a>
                </p>
        </div>
        <?php
    }

?>
