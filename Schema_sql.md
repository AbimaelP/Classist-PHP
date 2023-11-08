CREATE DATABASE desafio_php;

USE desafio_php;

CREATE TABLE IF NOT EXISTS types (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

INSERT INTO types (name) VALUES ('Tensão');
INSERT INTO types (name) VALUES ('Corrente');
INSERT INTO types (name) VALUES ('Óleo');

CREATE TABLE IF NOT EXISTS equipments (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    serial_number VARCHAR(32) NOT NULL UNIQUE,
    description TEXT,
    type_id INT,
    created_at DATETIME NOT NULL,
    FOREIGN KEY (type_id) REFERENCES types(id)
);

CREATE TABLE IF NOT EXISTS alarms (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    classification ENUM('Urgente','Emergente','Ordinário'),
    equipment_id INT NOT NULL,
    entry_date DATETIME,
    release_date DATETIME,
    activated BOOL DEFAULT FALSE,
    acted BOOL DEFAULT FALSE,
    created_at DATETIME NOT NULL,
    FOREIGN KEY (equipment_id) REFERENCES equipments(id)
);

CREATE TABLE IF NOT EXISTS action_logs (
	id INT AUTO_INCREMENT PRIMARY KEY,
    action VARCHAR(255) NOT NULL,
    description TEXT
);