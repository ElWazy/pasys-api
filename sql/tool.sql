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

INSERT INTO tool (name, category_id, image, stock_total, stock_actual) VALUES 
('martillo carpintero', 1, 'https://dummyimage.com/200x200/000000/fff.jpg&text=martillo+carpintero', 21, 21),
('combo de goma',       1, 'https://dummyimage.com/200x200/101010/fff.jpg&text=combo+de+goma',       12, 12),
('alicate caimán',      2, 'https://dummyimage.com/200x200/703737/fff.jpg&text=alicate+caiman',      34, 34),
('alicate de punta',    2, 'https://dummyimage.com/200x200/994848/fff.jpg&text=alicate+punta',       28, 28),
('alicate cortante',    2, 'https://dummyimage.com/200x200/b88080/fff.jpg&text=cortante',            11, 11),
('tester',              4, 'https://dummyimage.com/200x200/d4c44c/fff.jpg&text=tester',               6,  6),
('galletera circular',  5, 'https://dummyimage.com/200x200/3e8734/fff.jpg&text=galletera',           10, 10);
