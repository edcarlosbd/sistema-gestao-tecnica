<!-- Modal de Confirmação de Exclusão - REUTILIZÁVEL -->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="modalExcluirLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="modalExcluirLabel">
                    <i class="bi bi-exclamation-triangle-fill"></i> Confirmar Exclusão
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja excluir <strong id="tipoItemExcluir">?</strong></p>
                <p><strong>Nome/Título:</strong> <span id="nomeItemExcluir">Carregando...</span></p>
                <p class="text-danger mb-0">
                    <small><i class="bi bi-info-circle"></i> Esta ação não poderá ser desfeita!</small>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Cancelar
                </button>
                <a href="#" id="btnConfirmarExclusao" class="btn btn-danger">
                    <i class="bi bi-trash-fill"></i> Sim, Excluir
                </a>
            </div>
        </div>
    </div>
</div>