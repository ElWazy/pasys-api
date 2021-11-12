DROP TABLE IF EXISTS tool;
CREATE TABLE tool (
	id INT AUTO_INCREMENT NOT NULL,
	name VARCHAR(50) UNIQUE NOT NULL,
	category_id INT NOT NULL,
	image VARCHAR(1024) NULL,
	stock_total INT NOT NULL DEFAULT 0,
	stock_actual INT NOT NULL DEFAULT 0,
	is_active TINYINT(1) NOT NULL DEFAULT 1,

    PRIMARY KEY(id),
    FOREIGN KEY(category_id) REFERENCES category(id)
);

-- Los insert hay que hacerlos manualmente desde la pagina
-- por tema de que las imagenes se procesan por php

INSERT INTO tool (name, category_id, image, stock_total, stock_actual) VALUES 
('galletera circular',  5, 'https://dummyimage.com/200x200/3e8734/fff.jpg&text=galletera', 10, 10);
