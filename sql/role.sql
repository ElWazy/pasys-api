DROP TABLE IF EXISTS role;
CREATE TABLE role (
	id INT AUTO_INCREMENT NOT NULL,
	name VARCHAR(50) UNIQUE NOT NULL,

    PRIMARY KEY (id)
);

INSERT INTO role (name) VALUES
('trabajador'),
('panolero'),
('electricista'),
('ingeniero'),
('gafer');
