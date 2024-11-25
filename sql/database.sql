DROP DATABASE IF EXISTS tourist_management;
CREATE DATABASE tourist_management;

USE tourist_management;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL,
    address TEXT NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'manager', 'admin') DEFAULT 'user'
);

CREATE TABLE packages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    manager_id INT,
    hotel_name VARCHAR(255) NOT NULL,
    bed_type ENUM('Single', 'Double') NOT NULL,
    pool_status ENUM('Yes', 'No') NOT NULL,
    guide_status ENUM('Yes', 'No') NOT NULL,
    go_date DATE,
    back_date DATE,
    price DECIMAL(10, 2) NOT NULL,
    discount_percentage INT DEFAULT 0,
    status ENUM('Available', 'Sold Out') DEFAULT 'Available',
    FOREIGN KEY (manager_id) REFERENCES users(id)
);

CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    package_id INT,
    payment_method ENUM('Mobile Banking', 'Bank') NOT NULL,
    payment_details TEXT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (package_id) REFERENCES packages(id)
);
