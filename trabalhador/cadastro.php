<?php
// Configurações de conexão com o banco de dados
$host = 'localhost';
$dbname = 'nome_do_banco';
$user = 'usuario';
$password = 'senha';

try {
    // Conectar ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Receber dados do formulário
    $nome = $_POST['name'];
    $rg = $_POST['rg'];
    $cep = $_POST['cep'];
    $endereco = $_POST['street'];
    $bairro = $_POST['neighborhood'];
    $cidade = $_POST['city'];
    $estado = $_POST['state'];
    $numero = $_POST['number'];
    $complemento = $_POST['complement'];
    $email = $_POST['email'];
    $telefone = $_POST['phone'];
    $experiencia = isset($_POST['experience']) ? json_encode($_POST['experience']) : json_encode([]);

    // Preparar a instrução SQL
    $sql = "INSERT INTO trabalhador_rural (nome, rg, cep, endereco, bairro, cidade, estado, numero, complemento, email, telefone, experiencia)
            VALUES (:nome, :rg, :cep, :endereco, :bairro, :cidade, :estado, :numero, :complemento, :email, :telefone, :experiencia)";

    $stmt = $pdo->prepare($sql);

    // Vincular parâmetros
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':rg', $rg);
    $stmt->bindParam(':cep', $cep);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':bairro', $bairro);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':complemento', $complemento);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':experiencia', $experiencia);

    // Executar a inserção
    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar o trabalhador.";
    }
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}
?>
