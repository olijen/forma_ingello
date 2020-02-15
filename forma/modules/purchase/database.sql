CREATE TABLE purchase
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  supplier_id INT(11) NOT NULL,
  warehouse_id INT(11) NOT NULL,
  name VARCHAR(100) NOT NULL,
  date_create DATETIME,
  date_complete DATETIME,
  state INT(11) NOT NULL
) CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE warehouse.purchase
  ADD CONSTRAINT purchase_supplier_id_fk
  FOREIGN KEY (supplier_id) REFERENCES supplier (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.purchase
  ADD CONSTRAINT purchase_warehouse_id_fk
  FOREIGN KEY (warehouse_id) REFERENCES warehouse (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE purchase_product
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  product_id int(11) NOT NULL,
  pack_unit_id INT(11),
  purchase_id int(11) NOT NULL,
  quantity int(10) NOT NULL,
  cost DOUBLE(10,2) NOT NULL,
  tax_rate_id DOUBLE(10,2),
  overhead_cost_id INT(11),
  prepayment DOUBLE(10,2),
  currency_id INT(11) NOT NULL
) CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE warehouse.purchase_product
  ADD CONSTRAINT purchase_product_currency_id_fk
  FOREIGN KEY (currency_id) REFERENCES currency (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.purchase_product
  ADD CONSTRAINT purchase_product_pack_unit_id_fk
  FOREIGN KEY (pack_unit_id) REFERENCES pack_unit (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.purchase_product
  ADD CONSTRAINT purchase_product_product_id_fk
  FOREIGN KEY (product_id) REFERENCES product (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.purchase_product
  ADD CONSTRAINT purchase_product_purchase_id_fk
  FOREIGN KEY (purchase_id) REFERENCES purchase (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.purchase_product
  ADD CONSTRAINT purchase_product_overhead_cost_id_fk
  FOREIGN KEY (overhead_cost_id) REFERENCES overhead_cost (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE purchase_overhead_cost(
  id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  purchase_id INT(11) NOT NULL,
  overhead_cost_id INT(11) NOT NULL
);

ALTER TABLE warehouse.purchase_overhead_cost
  ADD CONSTRAINT purchase_overhead_cost_purchase_id_fk
  FOREIGN KEY(purchase_id) REFERENCES purchase(id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.purchase_overhead_cost
  ADD CONSTRAINT purchase_overhead_cost_overhead_cost_id_fk
  FOREIGN KEY(overhead_cost_id) REFERENCES overhead_cost(id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.purchase_product
  ADD CONSTRAINT purchase_product_tax_rate_id_fk
  FOREIGN KEY (tax_rate_id) REFERENCES tax_rate (id)
  ON DELETE CASCADE ON UPDATE CASCADE;
