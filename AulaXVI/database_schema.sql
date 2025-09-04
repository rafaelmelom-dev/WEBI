CREATE DATABASE IF NOT EXISTS Empresa;

CREATE TABLE IF NOT EXISTS Colaboradores (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    numero_telefone VARCHAR(20) NOT NULL,
    endereco VARCHAR(100) NOT NULL,
    anos_experiencia INT NOT NULL,
    salario DECIMAL(10,2) NOT NULL
)
