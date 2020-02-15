CREATE TABLE user
(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    role VARCHAR(255) NOT NULL DEFAULT 'user',
    auth_key VARCHAR(255),
    access_token VARCHAR(255)
) CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE UNIQUE INDEX user_email_uindex ON warehouse.user (email);
CREATE UNIQUE INDEX user_username_uindex ON warehouse.user (username);
