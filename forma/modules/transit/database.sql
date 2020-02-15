CREATE TABLE transit
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  from_warehouse_id INT(11) NOT NULL,
  to_warehouse_id INT(11) NOT NULL,
  name VARCHAR(100) NOT NULL,
  date_create DATETIME,
  date_complete DATETIME,
  state INT(11) NOT NULL
) CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE warehouse.transit
  ADD CONSTRAINT transit_from_warehouse_id_fk
  FOREIGN KEY (from_warehouse_id) REFERENCES warehouse (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.transit
  ADD CONSTRAINT transit_to_warehouse_id_fk
  FOREIGN KEY (to_warehouse_id) REFERENCES warehouse (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE transit_product
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  product_id int(11) NOT NULL,
  transit_id int(11) NOT NULL,
  quantity int(10) NOT NULL,
  overhead_cost_id INT(11),
  pack_unit_id INT(11)
) CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE warehouse.transit_product
  ADD CONSTRAINT transit_product_pack_unit_id_fk
  FOREIGN KEY (pack_unit_id) REFERENCES pack_unit (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.transit_product
  ADD CONSTRAINT transit_product_product_id_fk
  FOREIGN KEY (product_id) REFERENCES product (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.transit_product
  ADD CONSTRAINT transit_product_transit_id_fk
  FOREIGN KEY (transit_id) REFERENCES transit (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.transit_product
  ADD CONSTRAINT transit_product_overhead_cost_id_fk
  FOREIGN KEY (overhead_cost_id) REFERENCES overhead_cost (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE transit_overhead_cost(
  id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  transit_id INT(11) NOT NULL,
  overhead_cost_id INT(11) NOT NULL
);

ALTER TABLE warehouse.transit_overhead_cost
  ADD CONSTRAINT transit_overhead_cost_transit_id_fk
  FOREIGN KEY(transit_id) REFERENCES transit(id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.transit_overhead_cost
  ADD CONSTRAINT transit_overhead_cost_overhead_cost_id_fk
  FOREIGN KEY(overhead_cost_id) REFERENCES overhead_cost(id)
  ON DELETE CASCADE ON UPDATE CASCADE;
