DROP DATABASE IF exists to_do_list;
CREATE DATABASE IF NOT EXISTS to_do_list;

use to_do_list;


CREATE TABLE IF NOT EXISTS user (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS list (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    title VARCHAR(45) NOT NULL,
    description VARCHAR(45) NOT NULL,   
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS todo (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    list_id INT NOT NULL,
    title VARCHAR(45) NOT NULL,
    text VARCHAR(45) NOT NULL, 
    time DATETIME NOT NULL,
    is_expired TINYINT,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (list_id) REFERENCES list(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS category (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(45)
);

CREATE TABLE IF NOT EXISTS category_has_to_do (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    category_id INT NOT NULL,
    todo_id INT NOT NULL,
    FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (todo_id) REFERENCES todo(id) ON DELETE CASCADE ON UPDATE CASCADE
);


-- INSERT INTO
--     user (
--         name,
--         surname,
--         email,
--         password,
--     )
-- VALUES
--     (
--         "admin",
--         "admin",
--         "admin",
--         "admin"
--     ),
