<?php
// Configurações do banco de dados
$host = "localhost";
$user = "seu_usuario";
$password = "sua_senha";
$dbname = "nome_do_banco";

// Conectar ao banco de dados
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT password FROM empresas WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

// Verificar se o email existe
if ($stmt->num_rows > 0) {
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        echo "Login realizado com sucesso!";
        header('location: dashboard.php');
    } else {
        echo "Senha incorreta!";
    }
} else {
    echo "E-mail não encontrado!";
}

$stmt->close();
$conn->close();
?>
