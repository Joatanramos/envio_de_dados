<?php
// Configurações de conexão ao banco de dados
$host = "127.0.0.1:4306";
$usuario = "root";  // Usuário padrão do XAMPP
$senha = "";        // Senha padrão do XAMPP é vazia
$banco = "meu_banco"; // Nome do seu banco de dados

// Cria a conexão
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
    $mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : '';

    // Insere os dados na tabela 'contato' (crie esta tabela no seu banco de dados)
    $sql = "INSERT INTO contato (nome, telefone, mensagem) VALUES ('$nome', '$telefone', '$mensagem')";

    if ($conn->query($sql) === TRUE) {
        // Mensagem de sucesso com estilo inline
        echo '<div style="
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: 0044cc; /* Fundo verde claro */
            color: #ffffff; /* Texto verde escuro */
            padding: 15px;
            margin: 20px auto;
            width: 100%;
            max-width: 400px;
            border: 1px solid #c3e6cb;
            border-radius: 8px;
            font-size: 18px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease-in-out;
        ">
            <span style="font-size: 24px; margin-right: 10px; color: #155724;">&#10003;</span>
            <p style="margin: 0;">Sugestões enviada com sucesso!</p>
        </div>';
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

// Fecha a conexão
$conn->close();
?>
