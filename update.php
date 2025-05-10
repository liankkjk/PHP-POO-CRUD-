<?php
require_once "User.php";
$user = new User();

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int)$_GET['id'];
$usuario = $user->getById($id);

if ($_POST) {
    $user->update($id, $_POST['name'], $_POST['email'], $_POST['rg'], $_POST['cpf']);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Editar Usuário</h2>
<form method="post" class="mt-4">
    <div class="mb-3">
        <label class="form-label">Nome:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($usuario['name']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">RG:</label>
        <input type="text" name="rg" value="<?= htmlspecialchars($usuario['rg']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">CPF:</label>
        <input type="text" name="cpf" value="<?= htmlspecialchars($usuario['cpf']) ?>" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="index.php" class="btn btn-secondary">Voltar</a>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
