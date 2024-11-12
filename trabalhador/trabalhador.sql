CREATE TABLE trabalhador_rural (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    rg VARCHAR(20) NOT NULL,
    cep CHAR(8) NOT NULL,
    endereco VARCHAR(255),
    bairro VARCHAR(100),
    cidade VARCHAR(100),
    estado CHAR(2),
    numero VARCHAR(10) NOT NULL,
    complemento VARCHAR(50),
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    experiencia JSON,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
