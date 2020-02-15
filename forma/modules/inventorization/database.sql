CREATE TABLE inventorization
(
  `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `warehouse_id` INT(11) NOT NULL,
  `name` VARCHAR(255),
  `date` DATETIME,
  `state` INT(11)
) CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE warehouse.inventorization
ADD CONSTRAINT inventorization_warehouse_id_fk
FOREIGN KEY (warehouse_id) REFERENCES warehouse (id)
ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE inventorization_product
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  product_id INT(11) NOT NULL,
  inventorization_id INT(11) NOT NULL,
  accounting_quantity INT(11),
  fact_quantity INT(11)
) CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE warehouse.inventorization_product
ADD CONSTRAINT inventorization_product_product_id_fk
FOREIGN KEY (product_id) REFERENCES product (id)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.inventorization_product
ADD CONSTRAINT iinventorization_product_warehouse_id_fk
FOREIGN KEY (inventorization_id) REFERENCES inventorization (id)
ON DELETE CASCADE ON UPDATE CASCADE;
