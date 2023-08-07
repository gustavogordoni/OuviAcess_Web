-- SQLBook: Code
CREATE TABLE Usuario(
    id_usuario INT AUTO_INCREMENT,
    nome VARCHAR (50),
    dd CHAR (2),
    telefone VARCHAR (10),
    email VARCHAR(50),
    senha VARCHAR(50),
    
    CONSTRAINT PK_Usuario PRIMARY KEY (id_usuario)
);

CREATE TABLE Requerimento(
    id_requerimento INT AUTO_INCREMENT,
    titulo VARCHAR (40),
    tipo VARCHAR (40),
    situacao VARCHAR (40),
    data VARCHAR (10),
    descricao VARCHAR (1000),
    cep VARCHAR (40),
    cidade VARCHAR (40),
    bairro VARCHAR (40),
    rua VARCHAR (40),
    imagem longblob,
    
    CONSTRAINT PK_Usuario PRIMARY KEY (id_requerimento)
);

CREATE TABLE Administrador(
    id_administrador INT AUTO_INCREMENT,
    nome VARCHAR (50),
    cpf CHAR (14),
    rg CHAR (12),
    telefone VARCHAR (10),
    email VARCHAR (50),
    senha VARCHAR (50),

    CONSTRAINT PK_Administrador PRIMARY KEY (id_administrador)
);

