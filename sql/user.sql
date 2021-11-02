DROP TABLE IF EXISTS user;
CREATE TABLE user (
	id INT AUTO_INCREMENT NOT NULL,
	name VARCHAR(100) NOT NULL,
	password VARCHAR(50) NULL,
	rut VARCHAR(50) UNIQUE NOT NULL,
	is_active TINYINT(1) NOT NULL DEFAULT 1,
	role_id INT NOT NULL,

    PRIMARY KEY(id),
    FOREIGN KEY(role_id) REFERENCES role(id)
);