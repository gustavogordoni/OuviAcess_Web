-- Active: 1681045707260@@127.0.0.1@5432@ouviacess@public
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

CREATE TABLE arquivo
(
   id_arquivo           serial          NOT NULL,
   descricao            varchar(300)    NOT NULL,
   data_envio           timestamp       NOT NULL DEFAULT now(),
   nome                 varchar(300)    NOT NULL,
   tipo                 varchar(100)    NOT NULL,
   tamanho              varchar(100)    NOT NULL,
   dados_arquivo        bytea           NOT NULL, 
   CONSTRAINT pk_id_arquivo PRIMARY KEY (id_arquivo)	
);
SELECT * FROM arquivo