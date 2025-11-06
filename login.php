<?php

    //Conexao com o banco de dados
    include "./db/conexao.php";

    //Verificação no banco de dados

    $msg_error = "";

    if(isset ($_POST["loginUser"]) && ($_POST["senhaUser"])){
        $loginUser = mysqli_escape_string($conexao, $_POST["loginUser"]);
        $senhaUser = hash('sha256', $_POST["senhaUser"]);

        $sql = "SELECT * FROM tbusuarios WHERE loginUser = '{$loginUser}' AND senhaUser = '{$senhaUser}'";
        $rs = mysqli_query($conexao, $sql);
        $dados = mysqli_fetch_assoc($rs);
        $linha = mysqli_num_rows($rs);

        if($linha!=0) {
            session_start();
            $_SESSION["loginUser"] = $loginUser;
            $_SESSION["senhaUser"] = $senhaUser;
            $_SESSION["nomeUser"] = $dados["nomeUser"];

            header('Location:index.php');

        } else {

            $msg_error = "<div class='alert alert-danger mt-3'>
                            <p> Usuário não encontrado ou a senha não confere. </p>
                            </div>
                        ";

        }
    }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Login Agendador</title>
</head>
<body class="bg-secondary">
    
    <div class="container">
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="col-10 col-sm-8 col-md-6 col-lg-4 p-4 bg-white shadow rounded">
                <div class="row justify-content-center mb-4">
                    <img src="./img/logo_agendador.png" alt="Agendador">
                </div>
                <form class="needs-validation" action="login.php" method="post" novalidate>
                    <div class="form-group mb-4">
                        <label class="form-label" for="loginUser">Login</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill"></i>
                            </span>
                            <input class="form-control" type="text" name="loginUser" id="loginUser" required>
                            <div class="invalid-feedback">
                                Por favor, preencha o campo.
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label" for="senhaUser">Senha</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-key-fill"></i>
                            </span>
                            <input class="form-control" type="password" name="senhaUser" id="senhaUser" required>
                            <div class="invalid-feedback">
                                Por favor, preencha o campo.
                            </div>
                        </div>

                        <?php
                            echo $msg_error;
                        ?>
                    </div>
                    <button class="btn btn-success w-100"><i class="bi bi-box-arrow-in-right"></i> Entrar</button>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

    <script src="./js/validation.js"></script>

</body>
</html>