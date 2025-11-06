<header>
    <h3>
        <i class="bi bi-calendar-check"></i> Cadastro de equipamento
    </h3>
</header>

<div>
    <form class="needs-validation" action="index.php?menuop=inserir-equipamento" method="post" novalidate>

        <div class="mb-4">
            <label for="nomeEquipamento" class="form-label">Equipamento</label>
            <input class="form-control" type="text" name="nomeEquipamento" id="nomeEquipamento" required placeholder="Digite o nome do equipamento">
        </div>
        
        <div class="mb-4">
            <label for="descricaoEquipamento" class="form-label">Descrição</label>
            <textarea name="descricaoEquipamento" id="descricaoEquipamento" cols="30" rows="3" class="form-control" required placeholder="Digite a descrição do equipamento"></textarea>
        </div>

        <div class="mb-4">
            <label for="situacaoEquipamento" class="form-label">Situação</label>
            <textarea name="situacaoEquipamento" id="situacaoEquipamento" cols="30" rows="3" class="form-control" required placeholder="Digite a situação do equipamento"></textarea>
        </div>

        <div class="mb-4">
            <label for="numeroSerieEquipamento" class="form-label">Número de série</label>
            <input class="form-control" type="text" name="numeroSerieEquipamento" id="numeroSerieEquipamento" required placeholder="Digite o número de série do equipamento">
        </div>


        <div class="row">        
            <div class="mb-4 col-3">
                <label for="localEquipamento" class="form-label">Local</label>
                <input class="form-control" type="text" name="localEquipamento" id="localEquipamento" required placeholder="Digite o local">
            </div>
            <div class="mb-4 col-3">                
                <label for="dataAquisicaoEquipamento" class="form-label">Data de aquisição</label>
                <input class="form-control" type="date" name="dataAquisicaoEquipamento" id="dataAquisicaoEquipamento" required>
        </div>


        <div class="mb-4">
            <input class="btn btn-success" type="submit" value="Adicionar" name="btnAdicionar">
            <a href="index.php?menuop=equipamentos" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>
</div>


<?php


?>