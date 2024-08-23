<?php
require_once 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM cliente WHERE id = ?");
$stmt->execute([$id]);
$cliente = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $dataNascimento = $_POST['dataNascimento'];
    $email = $_POST['email'];
    
    $stmt = $pdo->prepare("UPDATE alunos SET nome = ?, data_nascimento = ?, email = ? WHERE id = ?");
    $stmt->execute([$nome, $dataNascimento, $email, $id]);
    
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de Cliente</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index-aluno.php">Listar Clientes</a></li>
                <li><a href="create-aluno.php">Adicionar Clientes</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Editar Cliente</h2>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= $cliente['nome'] ?>" required>
            
            <label for="dataNascimento">Data de Nascimento:</label>
            <input type="date" id="dataNascimento" name="dataNascimento" value="<?= $cliente['data_nascimento'] ?>" required>
            
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?= $cliente['email'] ?>" required>
            
            <button type="submit">Atualizar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Clientes</p>
    </footer>
</body>
</html>

<script>

    const addButton = document.querySelector('button[type="submit"]');
        addButton.addEventListener('mouseover', function() {
        this.style.backgroundColor = '#0066ff';
        });

        addButton.addEventListener('mouseout', function() {
            this.style.backgroundColor = '#9f12c2';
        });

</script>