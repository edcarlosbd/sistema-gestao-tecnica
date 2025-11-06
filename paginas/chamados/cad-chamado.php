<header>
    <h3>
        <i class="bi bi-calendar-check"></i> Cadastro de chamado
    </h3>
</header>

<div>
    <form class="needs-validation" action="index.php?menuop=inserir-chamado" method="post" novalidate>

        <div class="mb-3">
            <label for="tituloChamado" class="form-label">Título</label>
            <input class="form-control" type="text" name="tituloChamado" id="tituloChamado" required placeholder="Digite o título do chamado">
        </div>
        
        <div class="mb-3">
            <label for="descricaoChamado" class="form-label">Descrição</label>
            <textarea name="descricaoChamado" id="descricaoChamado" cols="30" rows="5" class="form-control" required placeholder="Digite a descrição do chamado"></textarea>
        </div>

        <div class="mb-3 col-5">
            <label for="localChamado" class="form-label">Local</label>
            <input class="form-control" type="text" name="localChamado" id="localChamado "required placeholder="Digite o local do chamado">
        </div>

        <div class="mb-3 col-5">
            <label for="responsavelChamado" class="form-label">Responsável</label>
            <input class="form-control" type="text" name="responsavelChamado" id="responsavelChamado" required placeholder="Digite o responsável pelo chamado">
        </div>

        <div class="mb-3">
            <label for="solucaoChamado" class="form-label">Solução</label>
            <textarea name="solucaoChamado" id="solucaoChamado" cols="30" rows="5" class="form-control" required placeholder="Digite a solução do chamado"></textarea>
        </div>

        <div class="mb-3 col-3">
            <label for="prioridadeChamado" class="form-label">Prioridade</label>
            <select class="form-select" name="prioridadeChamado" id="prioridadeChamado" required>
                <option value="">Selecione...</option>
                <option value="Baixa">Baixa</option>
                <option value="Média">Média</option>
                <option value="Alta">Alta</option>
                <option value="Crítica">Crítica</option>
            </select>
        </div>

        <div class="row">
            <div class="mb-3 col-3">                
                <label for="dataInicioChamado" class="form-label">Data início chamado</label>
                <input class="form-control" type="date" name="dataInicioChamado" id="dataInicioChamado">
            </div>
            <div class="mb-3 col-3">
                <label for="horaInicioChamado" class="form-label">Hora início chamado</label>
                <input class="form-control" type="time" name="horaInicioChamado" id="horaInicioChamado">
            </div>
        </div>


        <div class="row">
            <div class="mb-3 col-3">                
                <label for="dataFimChamado" class="form-label">Data conclusão chamado</label>
                <input class="form-control" type="date" name="dataFimChamado" id="dataFimChamado" required>
            </div>
            <div class="mb-3 col-3">
                <label for="horaFimChamado" class="form-label">Hora conclusão chamado</label>
                <input class="form-control" type="time" name="horaFimChamado" id="horaFimChamado" required>
            </div>
        </div>


        <div class="mb-3">
            <input class="btn btn-success" type="submit" value="Adicionar" name="btnAdicionar">
        </div>

    </form>
</div>


<?php


?>