CREATE DATABASE db_vcontrol;
USE db_vcontrol;
CREATE TABLE offiziersbursche(german varchar(255), english varchar(255));
CREATE TABLE ordenanza(spanish varchar(255), english varchar(255));
CREATE TABLE db_patches(patch_id int NOT NULL AUTO_INCREMENT, patch_name varchar(255), updated date, PRIMARY KEY (patch_id));
