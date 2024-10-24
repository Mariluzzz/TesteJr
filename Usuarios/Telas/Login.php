<?php
require_once '../Servico/Autentificacao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['senha'];

    if (Autentificacao::login($email, $password)) {
        header("Location: ../../index.php");
    } else {
        ?>
        <script>
            alert("Credenciais inválidas.");
        </script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="Login.php" method="POST">
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Senha:</label><br>
        <input type="password" name="senha" required><br>
        <button type="submit">Entrar</button>
    </form>
    <p>Não tem uma conta? <a href="Cadastro.php"><button>Cadastra-se</button></a></p>
</body>
</html>
