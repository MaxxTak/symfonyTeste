# symfonyTeste
Teste utilizando symfony com doctrine


Inicial = Composer install


===================================================== Criar o banco ===============================================================================

OBS: Há um dump do banco de dados na raiz do projeto, com o nome de dump.sql !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


CREATE TABLE categoria (id INT AUTO_INCREMENT NOT NULL, nome_categoria VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB;

CREATE TABLE empresa (id INT AUTO_INCREMENT NOT NULL, endereco_id INT DEFAULT NULL, nome VARCHAR(255) NOT NULL, telefone VARCHAR(255) NOT NULL, descricao LONGTEXT NOT NULL, INDEX IDX_B8D75A501BB76823 (endereco_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB;

CREATE TABLE categoria_empresa (empresa_id INT NOT NULL, categoria_id INT NOT NULL, INDEX IDX_BAB8A5FE521E1991 (empresa_id), INDEX IDX_BAB8A5FE3397707A (categoria_id), PRIMARY KEY(empresa_id, categoria_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB;

CREATE TABLE endereco (id INT AUTO_INCREMENT NOT NULL, endereco VARCHAR(255) NOT NULL, cep VARCHAR(255) NOT NULL, bairro VARCHAR(255) NOT NULL, cidade VARCHAR(255) NOT NULL, estado VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB;

CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, roles JSON NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB;

ALTER TABLE empresa ADD CONSTRAINT FK_B8D75A501BB76823 FOREIGN KEY (endereco_id) REFERENCES endereco (id);

ALTER TABLE categoria_empresa ADD CONSTRAINT FK_BAB8A5FE521E1991 FOREIGN KEY (empresa_id) REFERENCES empresa (id) ON DELETE CASCADE;

ALTER TABLE categoria_empresa ADD CONSTRAINT FK_BAB8A5FE3397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id) ON DELETE CASCADE;
===================================================== END criar o banco ===============================================================================

============================================== Criando dados com Fixtures =============================================================================
php bin/console doctrine:fixtures:load
============================================== END Criando dados com Fixtures =============================================================================

============================================== Criando usuários no sistema ===========================================================
com a aplicação rodando, entre na rota /insert (irá criar os usuários no banco)
	- usuário: admin, user 
	- senha: 123456
============================================== END Criando usuários no sistema ===========================================================
	
============================================= ROTAS ==================================================
ROTAS: 
/ -> página de busca

/admin ou /login -> carrega a página de login 

/empresa (autenticado) -> carrega as empresas cadastradas
/empresa/cadastrar (autenticado) -> ao clicar no botão cadastrar carrega esta rota 

/empresa/visualizar/{id} -> ao clicar em uma das empresas na lista, mostra os detalhes da mesma
=============================================END ROTAS ==================================================

========================================= Rodar Servidor =============================
php bin/console server:run

===================================== END ==============================



Observações finais: 
-> Primeira vez utilizando symfony com doctrine *
-> O que pode melhorar:
    -> Melhorar interface
    -> Paginar empresas
    -> Validar tipo nos formulários
    -> Formulários estão com required pelo HTML5 (mudar isto)
    -> Lista de estados em drop down menu