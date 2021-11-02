DROP TABLE IF EXISTS order_record;
CREATE TABLE order_record (
	id INT AUTO_INCREMENT NOT NULL,
	worker_id INT NOT NULL,
	panolero_id INT NOT NULL,
	tool_id INT NOT NULL,
	amount INT NOT NULL,
	order_date DATE NOT NULL DEFAULT NOW(),
	deadline DATE NOT NULL DEFAULT DATE_ADD(NOW(), INTERVAL 14 DAY),
	delivery_date DATE NULL,
	hours_late INT NULL,
	state_id INT NOT NULL DEFAULT 1,

    PRIMARY KEY(id),
    FOREIGN KEY(worker_id) REFERENCES user(id),
    FOREIGN KEY(panolero_id) REFERENCES user(id),
    FOREIGN KEY(tool_id) REFERENCES tool(id),
    FOREIGN KEY(state_id) REFERENCES state(id)
);
