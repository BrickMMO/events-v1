CREATE TABLE events (
    event_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    event_name VARCHAR(255), 
    start_date DATETIME,
    end_date DATETIME,
    description TEXT,
    photo LONGBLOB,
    organizer VARCHAR(255),
    location VARCHAR(255),
    detail_description TEXT,
    max_capacity INT(10) UNSIGNED,
    tickets_bought INT(10) UNSIGNED,
    price DECIMAL(10, 2) UNSIGNED);

CREATE TABLE participants (
    participant_id INT(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    first_name VARCHAR(255) NOT NULL, 
    last_name VARCHAR(255) NOT NULL, 
    email VARCHAR(255) NOT NULL,
    event_id INT(10) UNSIGNED NOT NULL,
    FOREIGN KEY (event_id) REFERENCES events(event_id) ON DELETE CASCADE,
    UNIQUE KEY unique_email_event (email, event_id));

CREATE TABLE admins(
    id INT(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    email VARCHAR(255) NOT NULL, 
    password VARCHAR(255) NOT NULL);


DELIMITER //
CREATE TRIGGER after_insert_participant
AFTER INSERT ON participants
FOR EACH ROW
BEGIN
    UPDATE events
    SET tickets_bought = tickets_bought + 1
    WHERE event_id = NEW.event_id;
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER after_delete_participant
AFTER DELETE ON participants
FOR EACH ROW
BEGIN
    UPDATE events
    SET tickets_bought = tickets_bought - 1
    WHERE event_id = OLD.event_id;
END;
//
DELIMITER ;



INSERT INTO `participants` (`first_name`, `last_name`, `email`, `event_id`) VALUES 
    ('John', 'Doe', 'john.doe@example.com', 2),
    ('Emily', 'Smith', 'emily.smith@example.com', 2),
    ('Michael', 'Johnson', 'michael.johnson@example.com', 2),
    ('Sophia', 'Brown', 'sophia.brown@example.com', 2),
    ('Daniel', 'Taylor', 'daniel.taylor@example.com', 2),
    ('Ana', 'García', 'ana.garcia@example.com', 3),
    ('Carlos', 'Martínez', 'carlos.martinez@example.com', 3),
    ('Laura', 'Rodríguez', 'laura.rodriguez@example.com', 3),
    ('Pedro', 'Fernández', 'pedro.fernandez@example.com', 3),
    ('María', 'López', 'maria.lopez@example.com', 3),
    ('Juan', 'Sánchez', 'juan.sanchez@example.com', 4),
    ('Elena', 'Gómez', 'elena.gomez@example.com', 4),
    ('Mario', 'Pérez', 'mario.perez@example.com', 4),
    ('Sara', 'Ruiz', 'sara.ruiz@example.com', 4),
    ('David', 'Hernández', 'david.hernandez@example.com', 4),
    ('Isabel', 'Díaz', 'isabel.diaz@example.com', 4),
    ('Antonio', 'Muñoz', 'antonio.munoz@example.com', 4),
    ('Lucía', 'Gutiérrez', 'lucia.gutierrez@example.com', 5),
    ('Miguel', 'Jiménez', 'miguel.jimenez@example.com', 5),
    ('Paula', 'Torres', 'paula.torres@example.com', 5),
    ('Alejandro', 'Navarro', 'alejandro.navarro@example.com', 5),
    ('Eva', 'Sanz', 'eva.sanz@example.com', 5),
    ('Manuel', 'Castillo', 'manuel.castillo@example.com', 5),
    ('Natalia', 'Ortega', 'natalia.ortega@example.com', 5),
    ('Luis', 'Reyes', 'luis.reyes@example.com', 5),
    ('Raquel', 'Molina', 'raquel.molina@example.com', 5),
    ('Javier', 'González', 'javier.gonzalez@example.com', 5),
    ('Ana', 'García', 'ana.garcia@example.com', 6),
    ('Carlos', 'Martínez', 'carlos.martinez@example.com', 6),
    ('Laura', 'Rodríguez', 'laura.rodriguez@example.com', 6),
    ('Pedro', 'Fernández', 'pedro.fernandez@example.com', 6),
    ('María', 'López', 'maria.lopez@example.com', 6),
    ('Luisa', 'Vázquez', 'luisa.vazquez@example.com', 6),
    ('Pablo', 'Gómez', 'pablo.gomez@example.com', 6),
    ('Sofía', 'Rojas', 'sofia.rojas@example.com', 7),
    ('Diego', 'Santos', 'diego.santos@example.com', 7),
    ('Carmen', 'Morales', 'carmen.morales@example.com', 7),
    ('Marcos', 'Delgado', 'marcos.delgado@example.com', 7),
    ('Elena', 'Núñez', 'elena.nunez@example.com', 7),
    ('Sergio', 'Iglesias', 'sergio.iglesias@example.com', 7),
    ('Adriana', 'Cruz', 'adriana.cruz@example.com', 7),
    ('Gabriel', 'Ortiz', 'gabriel.ortiz@example.com', 7),
    ('Nerea', 'Flores', 'nerea.flores@example.com', 7),
    ('Jorge', 'Ramírez', 'jorge.ramirez@example.com', 7),
    ('Lucas', 'Marín', 'lucas.marin@example.com', 7),
    ('Isabella', 'Sánchez', 'isabella.sanchez@example.com', 8),
    ('Martina', 'Gómez', 'martina.gomez@example.com', 8),
    ('Emilio', 'Pérez', 'emilio.perez@example.com', 8),
    ('Julieta', 'Martínez', 'julieta.martinez@example.com', 8);

INSERT INTO `admins` (`email`, `password`) VALUES ('adam@gmail.com', MD5('brickmmo'));