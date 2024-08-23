<?php
    // Inclui o arquivo de conexão com o banco de dados
    require_once 'db.php';

    // Obtém o ID do aluno a partir da URL usando o método GET
    $id = $_GET['id'];

    // Prepara a instrução SQL para selecionar o aluno pelo ID
    $stmt = $pdo->prepare("SELECT * FROM alunos WHERE id = ?");
    // Executa a instrução SQL, passando o ID do aluno como parâmetro
    $stmt->execute([$id]);

    // Recupera os dados do aluno como um array associativo
    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Cliente</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de CLiente</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index-cliente.php">Listar Cliente</a></li>
                <li><a href="novo-cliente.php">Adicionar Cliente</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Detalhes do Cliente</h2>
        <?php if ($cliente): ?>
            <p><strong>ID:</strong> <?= $cliente['id'] ?></p>
            <p><strong>Nome:</strong> <?= $cliente['nome'] ?></p>
            <p><strong>Data de Nascimento:</strong> <?= $cliente['data_nascimento'] ?></p>
            <p><strong>E-mail:</strong> <?= $cliente['email'] ?></p>
            <p>
                <a href="update-cliente.php?id=<?= $cliente['id'] ?>">Editar</a>
                <a href="delete-cliente.php?id=<?= $cliente['id'] ?>">Excluir</a>
            </p>
        <?php else: ?>
            <p>Cliente não encontrado.</p>
        <?php endif; ?>
    </main>
      

    
<script>

const listarCliente = () => {
                const listContainer = document.createElement('div');
                listContainer.id = 'lista-cliente';
                document.body.appendChild(listContainer);

                livros.forEach(cliente => {
                    const livroItem = document.createElement('div');
                    ClienteItem.className = 'Cliente-item';
                    CçienteItem.innerHTML = `<h3>${cliente.nome}</h3><p>Nome: ${cliente.nome}</p><p>Data de Lançamento: ${cliente.datanasc}</p>;
                    listContainer.appendChild(ClienteItem);
                });
            };
</script>
    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Cliente</p>
    </footer>
</body>
</html>