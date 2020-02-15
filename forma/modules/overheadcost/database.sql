CREATE TABLE overhead_cost
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `type` INT(11),
  `sum` DOUBLE(10,2),
  currency_id INT(11) NOT NULL,
  comment VARCHAR(255)
);

ALTER TABLE warehouse.overhead_cost
  ADD CONSTRAINT overhead_cost_currency_id_fk
  FOREIGN KEY (currency_id) REFERENCES currency (id)
  ON DELETE CASCADE ON UPDATE CASCADE;
