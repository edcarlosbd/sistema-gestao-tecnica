$(document).ready(function(){
    
    //Atualiza flag Favorito
    $('.flagFavoritoContato').click(function(){
        var idContato = $(this).prop("id");
        var titulo = $(this).prop("title");
        var flag = (titulo === "Favorito") ? 0 : 1;
        
        $(this).html(flag ? '<i class="bi bi-star-fill"></i>' : '<i class="bi bi-star"></i>').prop("title", flag ? "Favorito" : "Não Favorito");
    
        $.getJSON('./paginas/contatos/atualizaFavoritoContato.php', { idContato: idContato, flagFavoritoContato: flag }, function(response){
            console.log("Resposta do servidor:", response);
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log("Erro na requisição:", textStatus, errorThrown);
        });
    });

    // MODAL DE EXCLUSÃO
    $('#modalExcluir').on('show.bs.modal', function (event) {
        console.log('Modal aberto!'); // DEBUG
        
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var nome = button.data('nome');
        var tipo = button.data('tipo');
        var url = button.data('url');
        
        //Mostra os valores no console
        console.log('ID:', id);
        console.log('Nome:', nome);
        console.log('Tipo:', tipo);
        console.log('URL:', url);
        
        var modal = $(this);
        
        //Atualiza o tipo
        modal.find('#tipoItemExcluir').text(tipo || 'este item');
        
        //Atualiza o nome
        var elementoNome = modal.find('#nomeItemExcluir');
        console.log('Elemento encontrado:', elementoNome.length); // Deve ser 1
        elementoNome.text(nome || 'Nome não encontrado');
        
        //Define a URL
        modal.find('#btnConfirmarExclusao').attr('href', url);
        
        console.log('Modal atualizado!');
    });

})