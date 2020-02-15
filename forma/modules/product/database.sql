CREATE TABLE product(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  type_id INT(11) NOT NULL,
  category_id INT(11),
  manufacturer_id INT(11) NOT NULL,
  sku VARCHAR(255) NOT NULL,
  customs_code VARCHAR(255),
  name VARCHAR(255) NOT NULL,
  note TEXT,
  volume INT(11) NOT NULL,
  color_id INT(11),
  year_chart INT(11),
  proof DOUBLE(10,2),
  batcher TINYINT(1) DEFAULT NULL,
  rating DOUBLE(10,2) DEFAULT NULL,
  country_id INT(11) NOT NULL,
  pack_unit_id INT(11),
  parent_id INT(11)
) CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE warehouse.product
  ADD CONSTRAINT `product-country_id_fk`
  FOREIGN KEY (country_id) REFERENCES country (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE manufacturer
(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    country_id INT(11),
    address VARCHAR(255)
) CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE warehouse.manufacturer
  ADD CONSTRAINT `manufacturer-country_id_fk`
  FOREIGN KEY (country_id) REFERENCES country (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.manufacturer
  ADD CONSTRAINT `manufacturer_unique_index`
  UNIQUE (`name`, `country_id`, `address`);

ALTER TABLE warehouse.product
  ADD CONSTRAINT field_product_manufacturer_id_fk
  FOREIGN KEY (manufacturer_id) REFERENCES manufacturer (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE warehouse.category
(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  parent_id INT(11)
) CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE warehouse.category
  ADD CONSTRAINT `category_unique_index`
  UNIQUE (`name`, `parent_id`);

ALTER TABLE warehouse.product
  ADD CONSTRAINT `field_product_category_id_fk`
  FOREIGN KEY (category_id) REFERENCES category (id)
  ON DELETE CASCADE ON UPDATE CASCADE;



CREATE TABLE warehouse.`type`
(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL
) CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE warehouse.`type`
  ADD CONSTRAINT `type_name_unique_index`
  UNIQUE (`name`);

ALTER TABLE warehouse.product
  ADD CONSTRAINT `field_product_type_id_fk`
  FOREIGN KEY (type_id) REFERENCES `type` (id)
  ON DELETE CASCADE ON UPDATE CASCADE;



CREATE TABLE warehouse.pack_unit
(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  bottles_quantity INT(11) NOT NULL,
  volume INT(11) NOT NULL
) CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE table warehouse.product_pack_unit(
  id INT PRIMARY KEY AUTO_INCREMENT,
  product_id INT(11),
  pack_unit_id INT(11)
);

ALTER TABLE warehouse.product_pack_unit
  ADD CONSTRAINT `product_pack_unit_unique_index`
  UNIQUE (`product_id`, `pack_unit_id`);

ALTER TABLE warehouse.product_pack_unit
  ADD CONSTRAINT `field_product_pack_unit_product_id_fk`
  FOREIGN KEY (product_id) REFERENCES product (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.product_pack_unit
  ADD CONSTRAINT `field_product_pack_unit_pack_unit_id_fk`
  FOREIGN KEY (pack_unit_id) REFERENCES pack_unit (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE color(
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255)
);

ALTER TABLE warehouse.product
  ADD CONSTRAINT `product-color_id-fk`
  FOREIGN KEY (color_id) REFERENCES color (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE tax_rate(
  id INT AUTO_INCREMENT,
  name VARCHAR(255),
  percent DOUBLE(10,2),
  PRIMARY KEY(id)
);

CREATE TABLE currency(
    id INT(11) AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    code CHAR(3) NOT NULL COMMENT 'ISO 4217 code',
    rate DECIMAL(13,4) NOT NULL COMMENT 'US Dollar rate',
    PRIMARY KEY(id),
    UNIQUE(code)
);
