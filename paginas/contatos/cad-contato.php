<header>
    <h3><i class="bi bi-person-square"></i> Cadastro de contato </h3>
</header>
   
<div>
    <form class="needs-validation" action="index.php?menuop=inserir-contato" method="post" novalidate>
        <div class="mb-3">
            <label class="form-label"for="nomeContato">Nome</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input class="form-control" type="text" name="nomeContato" required>
                <div class="valid-feedback">
                    Preenchido corretamente.
                </div>
                <div class="invalid-feedback">
                    Campo obrigatório com no máximo 255 caracteres.
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="emailContato">Email</label>

            <div class="input-group">
                <span class="input-group-text">@</span>
                <input class="form-control" type="email" name="emailContato" required>
                <div class="valid-feedback">
                    Preenchido corretamente.
                </div>
                <div class="invalid-feedback">
                    Campo obrigatório.
                </div>
            </div>
        </div>
  
        <div class="mb-3">
            <label class="form-label" for="telefoneContato">Telefone</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                <input class="form-control" type="text" name="telefoneContato" required>
                <div class="valid-feedback">
                    Preenchido corretamente.
                </div>
                <div class="invalid-feedback">
                    Campo obrigatório.
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="enderecoContato">Endereço</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-mailbox2"></i></span>
                <input class="form-control" type="text" name="tipoServicoContato" required>
                <div class="valid-feedback">
                    Preenchido corretamente.
                </div>
                <div class="invalid-feedback">
                    Campo obrigatório.
                </div>
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-4">
                <label class="form-label" for="empresaContato">Empresa</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                    <input class="form-control" type="text" name="empresaContato" required>
                    <div class="valid-feedback">
                        Preenchido corretamente.
                    </div>
                    <div class="invalid-feedback">
                        Campo obrigatório.
                    </div>
                </div>
            </div>

            <div class="mb-3 col-4">
                <label class="form-label" for="tipoServicoContato">Tipo de serviço</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-tools"></i></span>
                    <input class="form-control" type="text" name="tipoServicoContato" required>
                    <div class="valid-feedback">
                        Preenchido corretamente.
                    </div>
                    <div class="invalid-feedback">
                        Campo obrigatório.
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="mb-3 col-3">
                <label class="form-label" for="sexoContato">Sexo</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                    <select class="form-select" name="sexoContato" required>
                        <option value="">Selecione</option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                        <option value="O">Outro</option>
                        <option value="N">Prefiro não informar</option>
                    </select>
                <div class="valid-feedback">
                    Preenchido corretamente.
                </div>
                <div class="invalid-feedback">
                    Campo obrigatório.
                </div>
                </div>
            </div>
    
            <div class="mb-4 col-3">
                <label class="form-label" for="dataNascContato">Data de nascimento</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <input class="form-control" type="date" name="dataNascContato" required>
                    <div class="valid-feedback">
                        Preenchido corretamente.
                    </div>
                    <div class="invalid-feedback">
                        Campo obrigatório.
                    </div>
                </div>
            </div>

        </div>

        <div class="mb-4">
            <input class="btn btn-success" type="submit" value="Atualizar" name="btnAtualizar">
            <a href="index.php?menuop=contatos" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>    

</div>

<?php

?>