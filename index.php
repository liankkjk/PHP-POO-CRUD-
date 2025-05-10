<?php
require_once "User.php";
$user = new User();
$users = $user->getAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            background: linear-gradient(to bottom, #f27127, #f2f2f2);
            font-family: 'Poppins', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            min-height: 100vh; 
        }

        .container {
            max-width: 1200px;
        }

        h2 {
            color: #f2f2f2;
            font-weight: bold;
            text-align: center;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
            transform: scale(1.1);
        }

        .table {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table-dark {
            background-color: #343a40;
            color: white;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f1f1f1;
        }

        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .btn {
            transition: all 0.3s ease;
            margin: 0 5px;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            transform: scale(1.1);
        }

        .btn-danger:hover {
            background-color: #c82333;
            transform: scale(1.1);
        }

        .no-data {
            font-size: 1.2rem;
            color: #6c757d;
        }
    </style>
</head>
<body class="container mt-5">

<h2 class="mb-4">Usuários</h2>
<a href="create.php" class="btn btn-success mb-3">+ Novo Usuário</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">RG</th>
            <th scope="col">CPF</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($users) > 0): ?>
            <?php foreach($users as $u): ?>
            <tr>
                <td><?= htmlspecialchars($u['id']) ?></td>
                <td><?= htmlspecialchars($u['name']) ?></td>
                <td><?= htmlspecialchars($u['email']) ?></td>
                <td><?= htmlspecialchars($u['rg']) ?></td>
                <td><?= htmlspecialchars($u['cpf']) ?></td>
                <td>
                    <a href="update.php?id=<?= $u['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="delete.php?id=<?= $u['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6" class="text-center no-data">Nenhum usuário encontrado.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>