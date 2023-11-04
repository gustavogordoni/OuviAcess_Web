CREATE TABLE usuario (
    id_usuario SERIAL PRIMARY KEY,
    nome VARCHAR(150),
    ddd VARCHAR(4),
    telefone VARCHAR(10),
    email VARCHAR(150),
    senha VARCHAR(150)
);

CREATE TABLE administrador (
    id_administrador SERIAL PRIMARY KEY,
    nome VARCHAR(150),
    ddd VARCHAR (4),
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
    logradouro VARCHAR(150),
    resposta TEXT,
    id_administrador INT,
    CONSTRAINT FK_Requerimento_Usuario FOREIGN KEY (id_usuario)
        REFERENCES Usuario (id_usuario),
    CONSTRAINT FK_Requerimento_Administrador FOREIGN KEY (id_administrador) 
		REFERENCES administrador (id_administrador)
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

INSERT INTO administrador VALUES
(default, 'Gustavo Gordoni', '(11)', '11111-1111', 'a@a.com', '202cb962ac59075b964b07152d234b70'),
(default, 'Thiago Caires', '(22)', '22222-2222', 'b@b.com', 'caf1a3dfb505ffed0d024130f58c5cfa');

INSERT INTO usuario VALUES
(default, 'Gustavo Gordoni', '(11)', '11111-1111', 'a@a.com', '$2y$10$9Hty1iKU.ig40tyWv8aAVek.30emtta1jnXLBN4OYdQjiDKVdjyDu'),
(default, 'Thiago Caires', '(22)', '22222-2222', 'b@b.com', '$2y$10$Yyzq3Rr816yYLVDTwtzQZe4F4SRAPtIPfLivxaOPsxMusWjpUWtb6');

INSERT INTO requerimento VALUES
(1, 1, 'Falta de rampas de acesso no IFSP Campus Votuporanga', 'Sugestão', 'Pendente', '12/10/2023', 'Labore officia eiusmod incididunt ut laboris eiusmod dolore. Aliquip fugiat irure aliqua dolore ut esse proident voluptate elit. Dolor consequat sint magna in quis occaecat tempor. Aute duis ipsum tempor occaecat nostrud velit eiusmod eiusmod laboris nisi ut culpa ex. Reprehenderit in ipsum magna ullamco veniam ad voluptate commodo voluptate quis. Adipisicing nisi labore eu sint mollit duis in.', '11.111-111', 'Votuporanga', 'Pozzobon', 'Avenida Jerônimo Figueira da Costa', DEFAULT, DEFAULT),
(2, 1, 'Ausência de vagas dedicadas a pessoas com mobilidade reduzida', 'Sugestão', 'Pendente', '21/10/2023', 'Labore officia eiusmod incididunt ut laboris eiusmod dolore. Aliquip fugiat irure aliqua dolore ut esse proident voluptate elit. Dolor consequat sint magna in quis occaecat tempor. Aute duis ipsum tempor occaecat nostrud velit eiusmod eiusmod laboris nisi ut culpa ex. Reprehenderit in ipsum magna ullamco veniam ad voluptate commodo voluptate quis. Adipisicing nisi labore eu sint mollit duis in.', '22.222-222', 'Cardoso', 'Centro', 'Rua Joâo da Silva', DEFAULT, DEFAULT),
(3, 2, 'Piso tátil danificado na Concha Acústica', 'Denúncia', 'Pendente', '01/10/2023', 'Labore officia eiusmod incididunt ut laboris eiusmod dolore. Aliquip fugiat irure aliqua dolore ut esse proident voluptate elit. Dolor consequat sint magna in quis occaecat tempor. Aute duis ipsum tempor occaecat nostrud velit eiusmod eiusmod laboris nisi ut culpa ex. Reprehenderit in ipsum magna ullamco veniam ad voluptate commodo voluptate quis. Adipisicing nisi labore eu sint mollit duis in.', '33.333-333', 'Votuporanga', 'Centro', 'Rua São Paulo', DEFAULT, DEFAULT);