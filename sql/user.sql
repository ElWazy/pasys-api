DROP TABLE IF EXISTS user;
CREATE TABLE user (
	id INT AUTO_INCREMENT NOT NULL,
	name VARCHAR(100) NOT NULL,
	password VARCHAR(128) NULL,
	rut VARCHAR(13) UNIQUE NOT NULL,
	is_active TINYINT(1) NOT NULL DEFAULT 1,
	role_id INT NOT NULL,

    PRIMARY KEY(id),
    FOREIGN KEY(role_id) REFERENCES role(id)
);

-- Obviously, the future records password will be encrypted

-- Panoleros
INSERT INTO user (name, password, rut, role_id) VALUES
('Hernesto Vargas Herrera',        '1324',       '11.222.333-4', 2),
('Samuel Saveedra Gonzales',       'pato123',    '12.223.334-3', 2),
('Ebaristo Filidor Rios Riquelme', 'efrr42',     '16.225.335-2', 2),
('Almendra Kast Soto',             '1234',       '18.235.333-4', 2),
('Karen Sotomayor del Carmen',     'asvDwq12D3', '11.225.333-8', 2);

-- Workers
INSERT INTO user (name, rut, role_id) VALUES
('Santiago Ignacio Fierro Madrid',   '22.333.444-5', 1),
('Danixa Soto Fernandez',            '21.334.334-4', 1),
('Catalina Antonia Gonzalez Lara',   '9.122.454-2',  3),
('Joaquín Daniel Martinez Cabrera',  '12.123.123-1', 4),
('Filidor Fernando Fernandez Faláz', '19.100.321-k', 5);
