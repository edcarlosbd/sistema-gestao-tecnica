<header>
    <h3>Inserir Contato</h3>
</header>

<?php

    $nomeContato = strip_tags(mysqli_real_escape_string($conexao, trim($_POST["nomeContato"])));
    $emailContato = strip_tags(mysqli_real_escape_string($conexao, trim($_POST["emailContato"])));
    $telefoneContato = strip_tags(mysqli_real_escape_string($conexao, trim($_POST["telefoneContato"])));
    $enderecoContato = strip_tags(mysqli_real_escape_string($conexao, trim($_POST["enderecoContato"])));
    $empresaContato = strip_tags(mysqli_real_escape_string($conexao, trim($_POST["empresaContato"])));
    $tipoServicoContato = strip_tags(mysqli_real_escape_string($conexao, trim($_POST["tipoServicoContato"])));
    $sexoContato = strip_tags(mysqli_real_escape_string($conexao, trim($_POST["sexoContato"])));
    $dataNascContato = strip_tags(mysqli_real_escape_string($conexao, trim($_POST["dataNascContato"])));

    $sql = "INSERT INTO tbcontatos (
        nomeContato, 
        emailContato, 
        telefoneContato,
        enderecoContato,
        empresaContato,
        tipoServicoContato,
        sexoContato, 
        dataNascContato
    ) VALUES (
        '{$nomeContato}',
        '{$emailContato}',
        '{$telefoneContato}',
        '{$enderecoContato}',
        '{$empresaContato}',
        '{$tipoServicoContato}',
        '{$sexoContato}',
        '{$dataNascContato}'
    )";

    $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta: " . mysqli_error($conexao));

    echo "O registro foi inserido com sucesso.";

?>