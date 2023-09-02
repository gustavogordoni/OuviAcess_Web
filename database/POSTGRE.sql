CREATE TABLE Usuario (
    id_usuario SERIAL PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    ddd CHAR(4) NOT NULL,
    telefone VARCHAR(10) NOT NULL,
    email VARCHAR(50) NOT NULL,
    senha VARCHAR(50) NOT NULL
);

CREATE TABLE Requerimento (
    id_requerimento SERIAL PRIMARY KEY,
    id_usuario INT,
    titulo VARCHAR(50) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    situacao VARCHAR(50) NOT NULL,
    data VARCHAR(10) NOT NULL,
    descricao VARCHAR(1000) NOT NULL,
    cep VARCHAR(10) NOT NULL,
    cidade VARCHAR(50) NOT NULL,
    bairro VARCHAR(50) NOT NULL,
    rua VARCHAR(50) NOT NULL,
    imagem TEXT,
    CONSTRAINT FK_Requerimento_Usuario FOREIGN KEY (id_usuario)
        REFERENCES Usuario (id_usuario)
);

CREATE TABLE Administrador (
    id_administrador SERIAL PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    cpf CHAR(14) NOT NULL,
    rg CHAR(12) NOT NULL,
    telefone VARCHAR(10) NOT NULL,
    email VARCHAR(50) NOT NULL,
    senha VARCHAR(50) NOT NULL
);
