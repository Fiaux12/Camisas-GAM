## Banco de Dados do site Camisas GAM

CREATE DATABASE GAM;
USE GAM
CREATE TABLE Conta(
	id INT NOT NULL AUTO_INCREMENT,
	tipo VARCHAR(10), ##cliente, adm, admTI
	nome VARCHAR(50),
	email VARCHAR(40),
	senha VARCHAR(50),
    PRIMARY KEY(id)
);

CREATE TABLE Preferencia( ##inserido no banco apartir do php
	id INT NOT NULL AUTO_INCREMENT,
	id_conta INT,
	id_camisa INT,
    PRIMARY KEY(id)
);

##quantidade = quantidade disponivel
##tamanho = P, M, G, GG, XG, 
##genero =  F, M ou U
CREATE TABLE Camisa(
	id INT NOT NULL AUTO_INCREMENT,
	nome VARCHAR(20),
	preco DECIMAL(5,2),
	quantidade INT,
	tamanho CHAR(3), 
	id_categoria INT,
	descricao VARCHAR(500),
	cor VARCHAR(20),
	img VARCHAR(500) NOT NULL DEFAULT 'Sem imagem',
	genero CHAR(2),
	PRIMARY KEY(id)
);

##Geek
##Religiosa
##ANIMES
##BARBA
##CAVEIRA
##FILMES E SÉRIES
##FOOD
##GAMES
##HALLOWEEN
##INTERNET
##LITERATURA
##MÚSICA
CREATE TABLE Categoria(
	id INT NOT NULL AUTO_INCREMENT,
	nome VARCHAR(20),
    PRIMARY KEY(id)
);

CREATE TABLE PedidoCamisa(
	id INT NOT NULL AUTO_INCREMENT,
	quantidade INT, ##quantidade pedida de um tipo de camisa
	id_pedido INT,
	id_camisa INT,
    PRIMARY KEY(id)
);

CREATE TABLE Pedido(
	id INT NOT NULL AUTO_INCREMENT,
	id_conta INT,
	status_pagamento CHAR(1), ## X(não pago) | V(pago)
	status_entrega CHAR(1), ## X(não entregou) | V(entregou)
	preco DECIMAL(19,2),
    PRIMARY KEY(id)
);


CREATE TABLE Login(
	id INT NOT NULL AUTO_INCREMENT,
	data DATETIME,
	id_conta INT,
    PRIMARY KEY(id)
);


##inserções
INSERT into Categoria(nome) values
("Geek"),
("Religiosa"),
("Animes"),
("Barba"),
("Caveira"),
("Filmes e Series"),
("Food"),
("Games"),
("Halloween"),
("Internet"),
("Literatura"),
("Musica");


INSERT into Camisa(nome, preco, quantidade, tamanho, id_categoria, descricao, cor, genero) values 
("Camisa Gatinho", 51.60, 32, "P", 1, "Blusa super estilosa com estampa de gatinhos fofos!", "Preta", "F"),
("Camisa Gatinho", 51.60, 50, "M", 1, "Blusa super estilosa com estampa de gatinhos fofos!", "Preta", "F"),
("Camisa Gatinho", 51.60, 9, "G", 1, "Blusa super estilosa com estampa de gatinhos fofos!", "Preta", "F"),
("Camisa Gatinho", 51.60, 32, "P", 1, "Blusa super estilosa com estampa de gatinhos fofos!", "Preta", "M"),
("Camisa Notas Musicais", 60.70, 3, "M", 12, "Blusa super estilosa estampada com notas musicas!", "Amarela", "M"),
("Camisa Notas Musicais", 60.70, 35, "M", 12, "Blusa super estilosa estampada com notas musicas!", "Azul", "M"),
("Camisa Eren", 32, 13, "GG", "3", "Blusa super estilosa estampada com a cara do Eren!", "Branca", "M"),
("Camisa Mario", 40, 50, "M", "8", "Blusa Super Mario lindona mesmo!", "Vermelha", "M");

INSERT into Conta(nome, tipo, email, senha) values 
("Anderson Silva", "cliente", "anderson56@gmail.com", "caopegandomanga"),
("Cleiton Viana", "adm", "vianaoficial@gmail.com", "vianacleitin"),
("Flavia Miranda", "admTI", "flaviamiranda22@gmail.com", "flavinha123"),
("Mateus Freitas Rocha", "cliente", "rochafreitasmateus@gmail.com", "20comer70fugir?");

INSERT into Preferencia(id_conta, id_camisa) values
(1, 3),
(4, 1),
(1, 1);

INSERT into PedidoCamisa(quantidade, id_pedido, id_camisa) values
(2, 1, 3),
(1, 1, 1),
(4, 2, 1);



INSERT into Pedido(id_conta, status_pagamento, status_entrega, preco) values
(1, "V", "V", 115.60),
(4, "V", "X", 206.40);

