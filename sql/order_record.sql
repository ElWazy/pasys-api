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

delimiter //
DROP TRIGGER IF EXISTS decrement_actual_stock //
CREATE TRIGGER decrement_actual_stock
AFTER INSERT
ON order_record FOR each ROW
BEGIN
    DECLARE decrement INT;

    UPDATE tool 
    SET stock_actual = (SELECT tool.stock_actual - NEW.amount FROM order_record INNER JOIN tool ON NEW.tool_id = tool.id)
    WHERE id = NEW.tool_id;
END; // 
delimiter ;

INSERT INTO order_record (worker_id, panolero_id, tool_id, amount, order_date, deadline, state_id) VALUES
(7, 1, 1, 3, NOW(), DATE_ADD(NOW(), INTERVAL 14 DAY), 1);

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
