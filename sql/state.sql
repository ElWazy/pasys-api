DROP TABLE IF EXISTS state;
CREATE TABLE state (
    id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(50) NOT NULL,

    PRIMARY KEY(id)
);

INSERT INTO state (name) VALUES
('pedido'),
('entregado'),
('atrasado');
