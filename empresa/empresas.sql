CREATE TABLE empresas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(100) NOT NULL,
    cep CHAR(8) NOT NULL,
    street VARCHAR(100),
    neighborhood VARCHAR(100),
    city VARCHAR(100),
    state CHAR(2),
    number VARCHAR(10) NOT NULL,
    complement VARCHAR(50),
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);