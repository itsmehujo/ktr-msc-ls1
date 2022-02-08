CREATE DATABASE IF NOT EXISTS ktr-msc-ls1;
USE ktr-msc-ls1;

CREATE TABLE users(
    id INT AUTO_INCREMENT,
    name VARCHAR(25) NOT NULL,
    company_name VARCHAR(50),
    email VARCHAR(255),
    phone INT
);

CREATE TABLE businesses(
    id INT AUTO_INCREMENT,
    name VARCHAR(25),
    company_name VARCHAR(50),
    email VARCHAR(255) NOT NULL,
    phone INT
);

CREATE TABLE associate_users_businesses(
    id_user INT,
    id_business INT,
    PRIMARY KEY(id_user, id_business),

    CONSTRAINT fk_associate_id_user
    FOREIGN KEY(id_user)
    REFERENCES users(id),

    CONSTRAINT fk_associate_id_business
    FOREIGN KEY(id_business)
    REFERENCES businesses(id),
);

