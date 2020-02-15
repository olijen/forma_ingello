CREATE TABLE warehouse.customer
(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(100),
    firm VARCHAR(100),
    country_id INT(11),
    address VARCHAR(32),
    company_email VARCHAR(32),
    chief_email VARCHAR(32),
    company_phone VARCHAR (32),
    chief_phone VARCHAR (32),
    site_company VARCHAR (100),
    tax_rate DOUBLE(10,2)
) CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE warehouse.customer
  ADD CONSTRAINT `customer-country_id_fk`
  FOREIGN KEY (country_id) REFERENCES country (id)
  ON DELETE CASCADE ON UPDATE CASCADE;
