<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $dataNascimento = $_POST['dataNascimento'];
    $email = $_POST['email'];
    
    $stmt = $pdo->prepare("INSERT INTO alunos (nome, data_nascimento, email) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nome, $dataNascimento, $email]);
    
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Cliente</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de Clientes</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index-aluno.php">Listar clientes</a></li>
                <li><a href="create-aluno.php">Adicionar Clientes</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Adicionar Cliente</h2>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="nome">Matricula:</label>
            <input type="text" id="matricula" name="matricula" required>
            
            <label for="dataNascimento">Data de Nascimento:</label>
            <input type="date" id="dataNascimento" name="dataNascimento" required>
            
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            
            <button type="submit">Adicionar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Clientes</p>
    </footer>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const nomeInput = document.querySelector('#nome');
    const emailInput = document.querySelector('#email');
    const datanascInput = document.querySelector('#satanasc');

    form.addEventListener('submit', function(event) {
       
        if (!nnomeInput.value || !emailInput.value || !datanascInput.value) {
            alert('Preencha todos os campos.');
            event.preventDefault();
        }
    });

    const addButton = document.querySelector('button[type="submit"]');
    addButton.addEventListener('mouseover', function() {
        this.style.backgroundColor = '#0066ff';
    });

    addButton.addEventListener('mouseout', function() {
        this.style.backgroundColor = '#9f12c2';
    });

    listarClientes();
});
</script>

</body>
</html>