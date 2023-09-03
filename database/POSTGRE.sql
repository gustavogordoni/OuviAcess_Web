CREATE TABLE usuario (
    id_usuario SERIAL PRIMARY KEY,
    nome VARCHAR(250),
    ddd CHAR(4),
    telefone VARCHAR(10),
    email VARCHAR(250),
    senha VARCHAR(250)
);

CREATE TABLE requerimento (
    id_requerimento SERIAL PRIMARY KEY,
    id_usuario INT,
    titulo VARCHAR(250),
    tipo VARCHAR(250),
    situacao VARCHAR(250),
    data VARCHAR(10),
    descricao VARCHAR(2000),
    cep VARCHAR(10),
    cidade VARCHAR(250),
    bairro VARCHAR(250),
    rua VARCHAR(250),
    imagem TEXT,
    CONSTRAINT FK_Requerimento_Usuario FOREIGN KEY (id_usuario)
        REFERENCES Usuario (id_usuario)
);

CREATE TABLE administrador (
    id_administrador SERIAL PRIMARY KEY,
    nome VARCHAR(250),
    cpf CHAR(14),
    rg CHAR(12),
    telefone VARCHAR(10),
    email VARCHAR(250),
    senha VARCHAR(250)
);
