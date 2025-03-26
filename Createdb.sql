DROP DATABASE IF EXISTS User_2406;

CREATE DATABASE User_2406;

USE User_2406;

CREATE TABLE User (
                      Id INT AUTO_INCREMENT PRIMARY KEY,
                      vorname VARCHAR(50),
                      nachname VARCHAR(51),
                      bildungsgutschein bool,
                      ausbildungsbeginn DATETIME,
                      augenfarbe VARCHAR(15),
                      groesse int (3),
                      haarfarbe VARCHAR(25),
                      dna TEXT,
                      fingerabdruck VARCHAR(255)
);