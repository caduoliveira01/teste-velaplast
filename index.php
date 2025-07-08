<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $idade = (int) $_POST['idade'];

    if ($nome && $idade > 0) {
        $stmt = $pdo->prepare("INSERT INTO aluno (nome, idade) VALUES (?, ?)");
        $stmt->execute([$nome, $idade]);
        header("Location: listar.php");
        exit;
    } else {
        $erro = "Preencha os campos corretamente.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Aluno</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
            padding: 40px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, button {
            padding: 8px;
            margin: 8px;
            width: 200px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cadastro</h1>
        <?php if (isset($erro)): ?>
            <p style="color:red;"><?= $erro ?></p>
        <?php endif; ?>
        <form method="post">
            <input type="text" name="nome" placeholder="Nome" required><br>
            <input type="number" name="idade" placeholder="Idade" required><br>
            <button type="submit">Salvar</button>
        </form>
        <p><a href="listar.php">Ver alunos cadastrados</a></p>
    </div>
</body>
</html>
