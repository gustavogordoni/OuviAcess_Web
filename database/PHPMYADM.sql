-- SQLBook: Code
CREATE TABLE Usuario(
    id_usuario INT AUTO_INCREMENT,
    nome VARCHAR (50),
    ddd CHAR (4),
    telefone VARCHAR (10),
    email VARCHAR(50),
    senha VARCHAR(50),
    
    CONSTRAINT PK_Usuario PRIMARY KEY (id_usuario)
);

CREATE TABLE Requerimento(
    id_requerimento INT AUTO_INCREMENT,
    id_usuario INT,
    titulo VARCHAR (50),
    tipo VARCHAR (50),
    situacao VARCHAR (50),
    data VARCHAR (10),
    descricao VARCHAR (1000),
    cep VARCHAR (10),
    cidade VARCHAR (50),
    bairro VARCHAR (50),
    rua VARCHAR (50),
    imagem longblob,
    
    CONSTRAINT PK_Usuario PRIMARY KEY (id_requerimento),

    CONSTRAINT FK_Requerimento_Usuario FOREIGN KEY (id_usuario)
        REFERENCES Usuario (id_usuario)
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

