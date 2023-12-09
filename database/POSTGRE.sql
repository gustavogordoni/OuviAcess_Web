CREATE TABLE usuario (
    id_usuario SERIAL PRIMARY KEY,
    nome VARCHAR(150),
    ddd VARCHAR(4),
    telefone VARCHAR(10),
    email VARCHAR(150),
    senha VARCHAR(500)
);

CREATE TABLE administrador (
    id_administrador SERIAL PRIMARY KEY,
    nome VARCHAR(150),
    ddd VARCHAR (4),
    telefone VARCHAR(10),
    email VARCHAR(150),
    senha VARCHAR(500)
);

CREATE TABLE requerimento (
    id_requerimento INT PRIMARY KEY,
    id_usuario INT,
    titulo VARCHAR(150),
    tipo VARCHAR(8),
    situacao VARCHAR(150),
    data VARCHAR(10),
    descricao TEXT,
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
--(default, 'Gustavo Luiz Gordoni', '(11)', '11111-1111', 'gustavo@gmail.com', '202cb962ac59075b964b07152d234b70'),
(default, 'Thiago Ferreira Caires', '(22)', '22222-2222', 'thiago@gmail.com', '202cb962ac59075b964b07152d234b70'),
(default, 'Marília Souza', '(33)', '33333-3333', 'marilia@gmail.com', '202cb962ac59075b964b07152d234b70');

INSERT INTO usuario VALUES
--(default, 'Gustavo Luiz Gordoni', '(44)', '44444-4444', 'gustavo@gmail.com', '$2y$10$9Hty1iKU.ig40tyWv8aAVek.30emtta1jnXLBN4OYdQjiDKVdjyDu'),
(default, 'Thiago Ferreira Caires', '(55)', '55555-5555', 'thiago@gmail.com', '$2y$10$9Hty1iKU.ig40tyWv8aAVek.30emtta1jnXLBN4OYdQjiDKVdjyDu'),
(default, 'João da Silva', '(66)', '66666-6666', 'joao@gmail.com', '$2y$10$9Hty1iKU.ig40tyWv8aAVek.30emtta1jnXLBN4OYdQjiDKVdjyDu'),
(default, 'Carlos Alberto', '(77)', '77777-7777', 'carlos@gmail.com', '$2y$10$9Hty1iKU.ig40tyWv8aAVek.30emtta1jnXLBN4OYdQjiDKVdjyDu');

INSERT INTO requerimento VALUES
(1, 1, 'Falta de rampas de acesso no IFSP Campus Votuporanga', 'Sugestão', 'Pendente', '12/10/2023', 'Labore officia eiusmod incididunt ut laboris eiusmod dolore. Aliquip fugiat irure aliqua dolore ut esse proident voluptate elit. Dolor consequat sint magna in quis occaecat tempor. Aute duis ipsum tempor occaecat nostrud velit eiusmod eiusmod laboris nisi ut culpa ex. Reprehenderit in ipsum magna ullamco veniam ad voluptate commodo voluptate quis. Adipisicing nisi labore eu sint mollit duis in.', '11.111-111', 'Votuporanga', 'Pozzobon', 'Avenida Jerônimo Figueira da Costa', DEFAULT, DEFAULT),
(2, 1, 'Ausência de vagas dedicadas a pessoas com mobilidade reduzida', 'Sugestão', 'Pendente', '21/10/2023', 'Labore officia eiusmod incididunt ut laboris eiusmod dolore. Aliquip fugiat irure aliqua dolore ut esse proident voluptate elit. Dolor consequat sint magna in quis occaecat tempor. Aute duis ipsum tempor occaecat nostrud velit eiusmod eiusmod laboris nisi ut culpa ex. Reprehenderit in ipsum magna ullamco veniam ad voluptate commodo voluptate quis. Adipisicing nisi labore eu sint mollit duis in.', '22.222-222', 'Cardoso', 'Centro', 'Rua Joâo da Silva', DEFAULT, DEFAULT),
(3, 2, 'Piso tátil danificado na Concha Acústica', 'Denúncia', 'Pendente', '01/10/2023', 'Labore officia eiusmod incididunt ut laboris eiusmod dolore. Aliquip fugiat irure aliqua dolore ut esse proident voluptate elit. Dolor consequat sint magna in quis occaecat tempor. Aute duis ipsum tempor occaecat nostrud velit eiusmod eiusmod laboris nisi ut culpa ex. Reprehenderit in ipsum magna ullamco veniam ad voluptate commodo voluptate quis. Adipisicing nisi labore eu sint mollit duis in.', '11.111-111', 'Votuporanga', 'Centro', 'Rua São Paulo', DEFAULT, DEFAULT);

-- Requerimento 4
INSERT INTO requerimento (id_requerimento, id_usuario, titulo, tipo, situacao, data, descricao, cep, cidade, bairro, logradouro, resposta, id_administrador)
VALUES (4, 1, 'Falta de sinalização para deficientes visuais', 'Sugestão', 'Em andamento', '05/11/2023', 'Falta de sinalização tátil para orientar pessoas com deficiência visual nos corredores do teatro.', '33.333-333', 'Fernandópolis', 'São Francisco', 'Avenida Bela Vista', 'Será implementada a sinalização tátil, conforme o solicitado', 1);

-- Requerimento 5
INSERT INTO requerimento (id_requerimento, id_usuario, titulo, tipo, situacao, data, descricao, cep, cidade, bairro, logradouro, resposta, id_administrador)
VALUES (5, 1, 'Banheiro sem acessibilidade para cadeirantes', 'Denúncia', 'Concluído', '07/11/2023', 'O banheiro no bloco C não possui estrutura adequada para cadeirantes, tornando-o inacessível.', '11.111-111', 'Votuporanga', 'Pozzobon', 'Avenida Jerônimo Figueira da Costa', 'O banheiro no bloco C foi adaptado para garantir acessibilidade a cadeirantes.', 1);

-- Requerimento 6
INSERT INTO requerimento (id_requerimento, id_usuario, titulo, tipo, situacao, data, descricao, cep, cidade, bairro, logradouro, resposta, id_administrador)
VALUES (6, 1, 'Sugestão de instalação de elevadores para pessoas cadeirantes', 'Sugestão', 'Recusado', '09/11/2023', 'Sugiro a instalação de elevadores no prédio para facilitar o acesso de todos.', '33.333-333', 'Fernandópolis', 'Centro', 'Rua Rio de Janeiro', 'A instalação de elevadores não é viável no momento devido a limitações estruturais.', 2);

-- Requerimento 7
INSERT INTO requerimento (id_requerimento, id_usuario, titulo, tipo, situacao, data, descricao, cep, cidade, bairro, logradouro, resposta, id_administrador)
VALUES (7, 2, 'Falta de vagas de estacionamento para portadores de deficiência', 'Denúncia', 'Pendente', '11/11/2023', 'Não há vagas de estacionamento reservadas para pessoas com deficiência no estacionamento do shopping.', '44.444-444', 'Rio Preto', 'Jardim Primavera', 'Avenida Primeiro de Abril', DEFAULT, DEFAULT);

-- Requerimento 8
INSERT INTO requerimento (id_requerimento, id_usuario, titulo, tipo, situacao, data, descricao, cep, cidade, bairro, logradouro, resposta, id_administrador)
VALUES (8, 1, 'Sugestão de rampas de acesso em todas as entradas', 'Sugestão', 'Em andamento', '13/11/2023', 'Sugiro a instalação de rampas de acesso em todas as entradas do campus para garantir a acessibilidade.', '11.111-111', 'Votuporanga', 'Pozzobon', 'Rua Santa Rita', 'Rampas de acesso serão instaladas em todas as entradas do campus conforme sua sugestão.', 2);

-- Requerimento 9 (Em andamento)
INSERT INTO requerimento (id_requerimento, id_usuario, titulo, tipo, situacao, data, descricao, cep, cidade, bairro, logradouro, resposta, id_administrador)
VALUES (9, 2, 'Instalação de piso tátil nas escadarias', 'Sugestão', 'Em andamento', '15/11/2023', 'Sugiro a instalação de piso tátil nas escadarias para facilitar a locomoção de pessoas com deficiência visual.', '11.111-111', 'Fernandópolis', 'Centro', 'Avenida José Bonifácio', 'A instalação de piso tátil nas escadarias está sendo realizado pela nossa equipe.', 2);

-- Requerimento 10 (Concluído)
INSERT INTO requerimento (id_requerimento, id_usuario, titulo, tipo, situacao, data, descricao, cep, cidade, bairro, logradouro, resposta, id_administrador)
VALUES (10, 2, 'Instalação de bebedouros acessíveis', 'Sugestão', 'Concluído', '18/11/2023', 'Sugiro a instalação de bebedouros acessíveis para pessoas com mobilidade reduzida.', '11.111-111', 'Mira Estrela', 'Centro', 'Rua Duque de Caxias', 'O requerimento foi analisado e implementado. Agradecemos pela sugestão.', 2);

-- Requerimento 11 (Informações incompletas)
INSERT INTO requerimento (id_requerimento, id_usuario, titulo, tipo, situacao, data, descricao, cep, cidade, bairro, logradouro, resposta, id_administrador)
VALUES (11, 1, 'Reclamação sobre mobiliário inadequado', 'Denúncia', 'Informações incompletas', '22/11/2023', 'Gostaria de reportar um problema com o mobiliário no prédio B', '11.111-111', 'Fernandópolis', 'Cruzeiro', 'Rua São Jorge', 'Para análise adequada, precisamos de mais informações sobre o mobiliário inadequado. Por favor, forneça detalhes adicionais.', 2);