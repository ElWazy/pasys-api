DROP TABLE IF EXISTS category;
CREATE TABLE category (
	id INT AUTO_INCREMENT NOT NULL,
	name VARCHAR(50) UNIQUE NOT NULL,

    PRIMARY KEY(id)
)
CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO category (name) VALUES
('Martillos'),
('Alicates'),
('Dados'),
('Electrónica'),
('Corte');
