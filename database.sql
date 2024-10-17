-- Aqui vocês precisam adicionar todos os códigos sql 

-- create database

-- use

-- create table

-- insert into
 create database empresa;
 

use empresa;

create table fornecedores(
    id_fornecedor int auto_increment primary key,
    nome varchar(100) not null,
    telefone varchar(20) not null,
    email varchar(100) not null,
    endereco varchar(250)
);

create table categorias(
    id_categoria int auto_increment primary key,
    nome varchar(100) not null,
    descricao text
);

create table setores(
    id_setor int auto_increment primary key,
    nome varchar(100) not null,
    descricao text
);

create table funcionarios(
    id_funcionario int auto_increment primary key,
    nome varchar(100) not null,
    cargo varchar(50),
    id_setor int, 
    FOREIGN KEY (id_setor) REFERENCES setores(id_setor)
);

create table produtos(
    id_produto int auto_increment primary key,
    nome varchar(100) not null,
    descricao text not null,
    id_categoria int,
    id_fornecedor int,
    preco_venda decimal(10,2) not null,
    preco_custo decimal(10,2) not null,
    quantidade_estoque int not null,
    unidade_medida varchar(20),
    FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria),
    FOREIGN KEY (id_fornecedor) REFERENCES fornecedores(id_fornecedor)
);

create table estoque(
    id_estoque int auto_increment primary key,
    id_produto int,
    tipo_movimentacao enum('entrada','saida') not null,
    quantidade int not null,
    data_movimentacao datetime,
    FOREIGN KEY (id_produto) REFERENCES produtos(id_produto)
);

create table pedidos(
    id_pedido int auto_increment primary key,
    data_pedido datetime not null,
    status ENUM('em estoque', 'disponivel', 'indisponivel') not null,
    valor_total DECIMAL(10,2) not null,
    id_funcionario int,
    FOREIGN KEY (id_funcionario) REFERENCES funcionarios(id_funcionario),
	id_setor int,
    FOREIGN KEY (id_setor) REFERENCES setores(id_setor)
);

CREATE TABLE itens_pedidos(
    id_item INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT,
    id_produto INT,
    quantidade INT NOT NULL,
    preco_unitario DECIMAL(10,2),
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido),
    FOREIGN KEY (id_produto) REFERENCES produtos(id_produto)
);

create table Manutencoes(
    id_equipamento int auto_increment primary key,
    Equipamento varchar(100) not null,
    descricao_problema text not null,
    data_inicio datetime not null,
    data_termino datetime not null,
    tecnico_responsavel varchar(100) not null,
    status enum('boa condição','necessita reparos','péssimo') not null,
    responsavel_id int,
    foreign key(responsavel_id) references funcionarios(id_funcionario)
);