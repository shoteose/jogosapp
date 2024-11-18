CREATE DATABASE jogosdb;
USE jogosdb;

-- Tabela de Publicadoras
CREATE TABLE Publicadora (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    pais VARCHAR(255)
);

-- Tabela de Gêneros
CREATE TABLE Genero (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL
);

-- Tabela de Jogos
CREATE TABLE Jogo (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    ano_lancamento INT,
    id_publicadora INT,
    caminho_imagem VARCHAR(255),
    FOREIGN KEY (id_publicadora) REFERENCES Publicadora(id)
);


-- Tabela de Relacionamento entre Jogos e Gêneros (M:N)
CREATE TABLE Jogo_Genero (
    id_jogo INT,
    id_genero INT,
    PRIMARY KEY (id_jogo, id_genero),
    FOREIGN KEY (id_jogo) REFERENCES Jogo(id),
    FOREIGN KEY (id_genero) REFERENCES Genero(id)
);


-- Inserir dados na tabela Publicadora
INSERT INTO Publicadora (nome, pais) VALUES
('Electronic Arts', 'Estados Unidos'),
('Ubisoft', 'França'),
('Capcom', 'Japão'),
('Square Enix', 'Japão'),
('Nintendo', 'Japão');

-- Inserir dados na tabela Genero
INSERT INTO Genero (nome) VALUES
('Ação'),
('Aventura'),
('RPG'),
('Esportes'),
('Estratégia');

-- Inserir dados na tabela Jogo
INSERT INTO Jogo (nome, ano_lancamento, id_publicadora) VALUES
('FIFA 2024', 2023, 1),   
('Assassin\'s Creed Valhalla', 2020, 2),  
('Monster Hunter World', 2018, 3), 
('Final Fantasy XV', 2016, 4),  
('The Legend of Zelda: Breath of the Wild', 2017, 5); 

-- Inserir dados na tabela Jogo_Genero (Relacionamento entre Jogos e Gêneros)
INSERT INTO Jogo_Genero (id_jogo, id_genero) VALUES
(1, 4),  
(2, 1),  
(2, 2),  
(3, 1),  
(3, 2),  
(4, 3),  
(5, 2),  
(5, 1);  
