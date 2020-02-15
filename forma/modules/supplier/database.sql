CREATE TABLE warehouse.supplier
(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    firm VARCHAR(100),
    contact_name VARCHAR(100),
    country_id INT(11),
    address VARCHAR(32),
    email VARCHAR(32),
    tax_rate DOUBLE(10,2)
) CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE warehouse.supplier
ADD CONSTRAINT supplier-country_id_fk
FOREIGN KEY (country_id) REFERENCES country (id)
ON DELETE CASCADE ON UPDATE CASCADE;
