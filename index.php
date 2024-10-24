<?php
require_once 'Usuarios/Servico/Autentificacao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        if (!Autentificacao::checarUsuarioLogado()) {
    ?>
    <meta charset="UTF-8">
    <title>Página Privada</title>
    <p>clique no botão para acessar a pagina!</p>
    <a href="Usuarios/Telas/Login.php"><button>Entrar</button></a>
    <?php
        } else {
    ?>
</head>
<body>
    <h2>Bem-vindo à página privada!</h2>
    <a href="Usuarios/Servico/logout.php"><button>Sair</button></a>
    <?php
        }
    ?>
</body>
</html>
