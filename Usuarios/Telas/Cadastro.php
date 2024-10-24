<?php
require '../Servico/Cadastro.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['senha'];
    $code = $_POST['codigoUnico'];

    $userController = new Cadastro();
    $userController->registrar($name, $email, $password, $code);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h2>Cadastro de Usuário</h2>
    <form action="Cadastro.php" method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Código Único:</label><br>
        <input type="text" name="codigoUnico" required><br>
        <label>Senha:</label><br>
        <input type="password" name="senha" required><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
