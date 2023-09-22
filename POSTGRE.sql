CREATE TABLE usuario (
    id_usuario SERIAL PRIMARY KEY,
    nome VARCHAR(150),
    ddd VARCHAR(4),
    telefone VARCHAR(10),
    email VARCHAR(150),
    senha VARCHAR(150)
);

CREATE TABLE requerimento (
    id_requerimento INT PRIMARY KEY,
    id_usuario INT,
    titulo VARCHAR(150),
    tipo VARCHAR(8),
    situacao VARCHAR(150),
    data VARCHAR(10),
    descricao VARCHAR(2000),
    cep VARCHAR(10),
    cidade VARCHAR(150),
    bairro VARCHAR(150),
    rua VARCHAR(150),
    CONSTRAINT FK_Requerimento_Usuario FOREIGN KEY (id_usuario)
        REFERENCES Usuario (id_usuario)
);

CREATE TABLE administrador (
    id_administrador SERIAL PRIMARY KEY,
    nome VARCHAR(150),
    cpf VARCHAR(14),
    rg VARCHAR(12),
    telefone VARCHAR(10),
    email VARCHAR(150),
    senha VARCHAR(150)
);

CREATE TABLE arquivo
(
   id_arquivo           serial          NOT NULL,
   id_requerimento      int             NOT NULL,
   nome                 VARCHAR(150)    NOT NULL,
   dados_arquivo        bytea           NOT NULL, 
   CONSTRAINT pk_id_arquivo PRIMARY KEY (id_arquivo),
   CONSTRAINT FK_Requerimento_Imagem FOREIGN KEY (id_requerimento)
        REFERENCES requerimento (id_requerimento)	
);