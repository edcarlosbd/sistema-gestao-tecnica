<header>
    <h3>
        <i class="bi bi-list-task"></i> Cadastro de tarefa
    </h3>
</header>

<div>
    <form class="needs-validation" action="index.php?menuop=inserir-tarefa" method="post" novalidate>

        <div class="mb-3">
            <label for="tituloTarefa" class="form-label">Título</label>
            <input class="form-control" type="text" name="tituloTarefa" id="tituloTarefa" required placeholder="Digite o título da tarefa">
        </div>
        
        <div class="mb-3">
            <label for="descricaoTarefa" class="form-label">Descrição</label>
            <textarea name="descricaoTarefa" id="descricaoTarefa" cols="30" rows="5" class="form-control" required placeholder="Digite a descrição da tarefa"></textarea>
        </div>

        <div class="row">
            <div class="mb-3 col-4">
                <label for="localTarefa" class="form-label">Local</label>
                <input class="form-control" type="text" name="localTarefa" id="localTarefa" required placeholder="Local da tarefa">
            </div>
            <div class="mb-3 col-4">
                <label for="setorTarefa" class="form-label">Setor</label>
                <input class="form-control" type="text" name="setorTarefa" id="setorTarefa" required placeholder="Setor responsável">
            </div>
            <div class="mb-3 col-4">
                <label for="responsavelTarefa" class="form-label">Responsável</label>
                <input class="form-control" type="text" name="responsavelTarefa" id="responsavelTarefa" required placeholder="Nome do responsável">
            </div>
        </div>
 
        <div class="mb-3 col-6">                
            <label for="prazoTarefa" class="form-label">Prazo</label>
            <input class="form-control" type="date" name="prazoTarefa" id="prazoTarefa" required>
        </div>



        <div class="mb-3">
            <input class="btn btn-success" type="submit" value="Adicionar" name="btnAdicionar">
        </div>

    </form>
</div>


<?php


?>