-- SQLBook: Code
CREATE TABLE Usuario(
    id_usuario INT AUTO_INCREMENT,
    nome VARCHAR (150),
    ddd VARCHAR (4),
    telefone VARCHAR (10),
    email VARCHAR(150),
    senha VARCHAR(150),
    
    CONSTRAINT PK_Usuario PRIMARY KEY (id_usuario)
);

CREATE TABLE Requerimento(
    id_requerimento INT AUTO_INCREMENT,
    id_usuario INT,
    titulo VARCHAR (150),
    tipo VARCHAR (150),
    situacao VARCHAR (150),
    data VARCHAR (10),
    descricao VARCHAR (1000),
    cep VARCHAR (10),
    cidade VARCHAR (150),
    bairro VARCHAR (150),
    logradouro VARCHAR (150),
    imagem longblob,
    
    CONSTRAINT PK_Usuario PRIMARY KEY (id_requerimento),

    CONSTRAINT FK_Requerimento_Usuario FOREIGN KEY (id_usuario)
        REFERENCES Usuario (id_usuario)
);

CREATE TABLE Administrador(
    id_administrador INT AUTO_INCREMENT,
    nome VARCHAR (150),
    cpf VARCHAR (14),
    rg VARCHAR (12),
    telefone VARCHAR (10),
    email VARCHAR (150),
    senha VARCHAR (150),

    CONSTRAINT PK_Administrador PRIMARY KEY (id_administrador)
);

