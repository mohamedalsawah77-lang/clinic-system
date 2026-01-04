CREATE DATABASE clinic_system;
USE clinic_system;

CREATE TABLE admin (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50),
  password VARCHAR(50)
);

INSERT INTO admin (username, password)
VALUES ('admin', '1234');

CREATE TABLE doctors (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(100),
  specialty VARCHAR(100),
  address VARCHAR(150),
  phone VARCHAR(20)
);

CREATE TABLE patients (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(100),
  doctor VARCHAR(100),
  department VARCHAR(100),
  disease VARCHAR(200),
  check_in DATE,
  check_out DATE
);