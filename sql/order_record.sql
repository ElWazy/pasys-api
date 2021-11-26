DROP TABLE IF EXISTS order_record;
CREATE TABLE order_record (
	id INT AUTO_INCREMENT NOT NULL,
	worker_id INT NOT NULL,
	panolero_id INT NOT NULL,
	tool_id INT NOT NULL,
	amount INT NOT NULL,
	order_date DATE NOT NULL DEFAULT NOW(),
	deadline DATE NOT NULL DEFAULT DATE_ADD(NOW(), INTERVAL 1 DAY),
	delivery_date DATE NULL,
	state_id INT NOT NULL DEFAULT 1,

    PRIMARY KEY(id),
    FOREIGN KEY(worker_id) REFERENCES user(id),
    FOREIGN KEY(panolero_id) REFERENCES user(id),
    FOREIGN KEY(tool_id) REFERENCES tool(id),
    FOREIGN KEY(state_id) REFERENCES state(id)
);

INSERT INTO order_record (worker_id, panolero_id, tool_id, amount, state_id) VALUES
(7, 1, 1, 3, 1);

SELECT worker.rut, 
  worker.name AS trabajador, 
  tool.name AS herramienta, 
  order_record.amount, 
  order_record.order_date, 
  order_record.deadline,
  panolero.name AS panolero, 
  state.name AS estado
FROM order_record 
INNER JOIN user AS worker ON order_record.worker_id = worker.id 
INNER JOIN user AS panolero ON order_record.panolero_id = panolero.id 
INNER JOIN tool ON order_record.tool_id = tool.id 
INNER JOIN state ON order_record.state_id = state.id;
