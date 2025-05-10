<?php
require_once "User.php";
$user = new User();

if ($_POST) {
    $user->create($_POST['name'], $_POST['email'], $_POST['rg'], $_POST['cpf']);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Novo Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Novo Usuário</h2>
<form method="post" class="mt-4">
    <div class="mb-3">
        <label class="form-label">Nome:</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email:</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">RG:</label>
        <input type="text" name="rg" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">CPF:</label>
        <input type="text" name="cpf" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="index.php" class="btn btn-secondary">Voltar</a>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>