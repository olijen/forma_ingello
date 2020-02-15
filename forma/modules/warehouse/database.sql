CREATE TABLE warehouse
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  country_id INT(11),
  address VARCHAR(32)
) CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE warehouse.warehouse
ADD CONSTRAINT `warehouse-country_id_fk`
FOREIGN KEY (country_id) REFERENCES country (id)
ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE warehouse_product
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  product_id int(11) NOT NULL,
  warehouse_id int(11) NOT NULL,
  quantity int(10) NOT NULL,
  purchase_cost DOUBLE(10,2),
  recommended_cost DOUBLE(10,2),
  consumer_cost DOUBLE(10,2),
  trade_cost DOUBLE(10,2),
  tax DOUBLE(10,2),
  overhead_cost DOUBLE(10,2),
  currency_id INT(11) NOT NULL
) CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE warehouse.warehouse_product
ADD CONSTRAINT `warehouse_product_currency_id_fk`
FOREIGN KEY (currency_id) REFERENCES currency (id)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.warehouse_product
ADD CONSTRAINT `warehouse_product_product_id_fk`
FOREIGN KEY (product_id) REFERENCES product (id)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.warehouse_product
ADD CONSTRAINT `warehouse_product_warehouse_id_fk`
FOREIGN KEY (warehouse_id) REFERENCES warehouse (id)
ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE warehouse_user
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  warehouse_id INT(11) NOT NULL,
  user_id INT(11) NOT NULL
) CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE warehouse.warehouse_user
  ADD CONSTRAINT `warehouse_user_warehouse_id_fk`
  FOREIGN KEY (warehouse_id) REFERENCES warehouse (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.warehouse_user
  ADD CONSTRAINT `warehouse_customer_user_id_fk`
  FOREIGN KEY (user_id) REFERENCES `user` (id)
  ON DELETE CASCADE ON UPDATE CASCADE;
