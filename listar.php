<?php
require 'config.php';

$alunos = $pdo->query("SELECT * FROM aluno ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Listagem de Alunos</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
        }
        a {
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Alunos Cadastrados</h1>
        <table>
            <tr><th>ID</th><th>Nome</th><th>Idade</th></tr>
            <?php foreach ($alunos as $aluno): ?>
                <tr>
                    <td><?= $aluno['id'] ?></td>
                    <td><?= htmlspecialchars($aluno['nome']) ?></td>
                    <td><?= $aluno['idade'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="index.php">Cadastrar novo</a></p>
    </div>
</body>
</html>
