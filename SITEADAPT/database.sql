CREATE DATABASE tda_shop;
USE tda_shop;

CREATE TABLE categories (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(255)
);

CREATE TABLE products (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(255),
 price INT,
 old_price INT NULL,
 image VARCHAR(255),
 category_id INT,
 description TEXT
);

CREATE TABLE news (
 id INT AUTO_INCREMENT PRIMARY KEY,
 title VARCHAR(255),
 image VARCHAR(255),
 text TEXT,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE orders (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(255),
 phone VARCHAR(50),
 address TEXT,
 total INT
);

CREATE TABLE order_items (
 id INT AUTO_INCREMENT PRIMARY KEY,
 order_id INT,
 product_id INT,
 qty INT,
 price INT
);