CREATE TABLE interview
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  worker_id INT(11) NOT NULL,
  project_id INT(11) NOT NULL,
  name VARCHAR(100) NOT NULL,
  date_create DATETIME,
  date_complete DATETIME,
  state INT NOT NULL
) CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE warehouse.interview
  ADD CONSTRAINT interview_worker_id_fk
  FOREIGN KEY (worker_id) REFERENCES worker (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.interview
  ADD CONSTRAINT interview_project_id_fk
  FOREIGN KEY (project_id) REFERENCES project (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE interview_vacancy
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  vacancy_id int(11) NOT NULL,
  interview_id int(11) NOT NULL,
  quantity int(10) NOT NULL,
  cost DOUBLE(10,2),
  cost_type INT(11),
  overhead_cost_id INT(11),
  currency_id INT(11) NOT NULL,
  pack_unit_id INT(11)
) CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE warehouse.interview_vacancy
  ADD CONSTRAINT interview_vacancy_currency_id_fk
  FOREIGN KEY (currency_id) REFERENCES currency (id)
  ON DELETE CASCADE ON UPDATE CASCADE;
  
ALTER TABLE warehouse.interview_vacancy
  ADD CONSTRAINT interview_vacancy_pack_unit_id_fk
  FOREIGN KEY (pack_unit_id) REFERENCES pack_unit (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.interview_vacancy
  ADD CONSTRAINT interview_vacancy_vacancy_id_fk
  FOREIGN KEY (vacancy_id) REFERENCES vacancy (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.interview_vacancy
  ADD CONSTRAINT interview_vacancy_interview_id_fk
  FOREIGN KEY (interview_id) REFERENCES interview (id)
  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE warehouse.interview_vacancy
  ADD CONSTRAINT interview_vacancy_overhead_cost_id_fk
  FOREIGN KEY (overhead_cost_id) REFERENCES overhead_cost (id)
  ON DELETE CASCADE ON UPDATE CASCADE;
