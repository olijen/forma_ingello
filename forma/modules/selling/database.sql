CREATE TABLE selling
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  customer_id INT(11) NOT NULL,
  warehouse_id INT(11) NOT NULL,
  name VARCHAR(100) NOT NULL,
  date_create DATETIME,
  date_complete DATETIME,
  state INT NOT NULL
) CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE warehouse.selling
  ADD CONSTRAINT selling_customer_id_fk
  FOREIGN KEY (customer_id) REFERENCES customer (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.selling
  ADD CONSTRAINT selling_warehouse_id_fk
  FOREIGN KEY (warehouse_id) REFERENCES warehouse (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE selling_product
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  product_id int(11) NOT NULL,
  selling_id int(11) NOT NULL,
  quantity int(10) NOT NULL,
  cost DOUBLE(10,2),
  cost_type INT(11),
  overhead_cost_id INT(11),
  currency_id INT(11) NOT NULL,
  pack_unit_id INT(11)
) CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE warehouse.selling_product
  ADD CONSTRAINT selling_product_currency_id_fk
  FOREIGN KEY (currency_id) REFERENCES currency (id)
  ON DELETE CASCADE ON UPDATE CASCADE;
  
ALTER TABLE warehouse.selling_product
  ADD CONSTRAINT selling_product_pack_unit_id_fk
  FOREIGN KEY (pack_unit_id) REFERENCES pack_unit (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.selling_product
  ADD CONSTRAINT selling_product_product_id_fk
  FOREIGN KEY (product_id) REFERENCES product (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.selling_product
  ADD CONSTRAINT selling_product_selling_id_fk
  FOREIGN KEY (selling_id) REFERENCES selling (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.selling_product
  ADD CONSTRAINT selling_product_overhead_cost_id_fk
  FOREIGN KEY (overhead_cost_id) REFERENCES overhead_cost (id)
  ON DELETE CASCADE ON UPDATE CASCADE;
