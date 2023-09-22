### Integrantes: Gustavo Luiz Gordoni & Thiago Ferreira Caires ###

OBSERVAÇÕES:

-- Para ambas as conexões deve-se criar um database chamado: ouviacess

-- Para ter acesso ao CRUD da tabela/classe Requerimentos, é necessário que você cadastre-se e faça login no sistema

-- Todos os requerimentos que NÃO TIVEREM O MODO ANONIMO "ativo", realizados por um usuário AUTENTICADO, serão listados na página de histórico. 
** Adendo: Isso se dá pois, quando um usuário não autenticado realiza um requerimento, ele obrigatoriamente será "anonimo", isto é, não será passado seu id_usuario como chave estrangeira para povoar a tabela requerimento. Além disso, caso um usuário já autenticado selecionar a opção de modo anonimo, o mesmo irá aconteceontecer.**

-- A versão do sistema para MySQL apenas foi enviada, caso a versão PostgreSQL (principal) não funcione corretamente. Além disso, a versão PostgreSQL permite o armazenamento de imagens para serem enviadas junto ao requerimento.