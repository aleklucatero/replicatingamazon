-- CREATE DATABASE amazon_database;

-- use sql_workbench;

-- CREATE TABLE users (
--     user_id INT AUTO_INCREMENT PRIMARY KEY,
--     username VARCHAR(50) NOT NULL,
--     email VARCHAR(100) NOT NULL,
--     password VARCHAR(100) NOT NULL,
--     registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );

-- #Examples of how to modify User's table
-- -- INSERT INTO users (username, password, email) VALUES ('Lark', 'password', 'larkthelustrous@gmail.com');
-- -- SELECT * FROM users;
-- -- UPDATE users SET password = 'new_password' WHERE username = 'Lark';
-- -- DELETE FROM users WHERE user_id = 1;

-- CREATE TABLE products (
--     product_id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(255) NOT NULL,
--     description TEXT,
--     price DECIMAL(10, 2) NOT NULL,
--     stock_quantity INT NOT NULL
-- );

-- CREATE TABLE orders (
--     order_id INT AUTO_INCREMENT PRIMARY KEY,
--     user_id INT NOT NULL,
--     order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     total_amount DECIMAL(10, 2) NOT NULL,
--     status ENUM('pending', 'shipped', 'delivered') DEFAULT 'pending',
--     FOREIGN KEY (user_id) REFERENCES users(user_id)
-- );

-- CREATE TABLE order_details (
--     order_detail_id INT AUTO_INCREMENT PRIMARY KEY,
--     order_id INT NOT NULL,
--     product_id INT NOT NULL,
--     quantity INT NOT NULL,
--     price DECIMAL(10, 2) NOT NULL,
--     FOREIGN KEY (order_id) REFERENCES orders(order_id),
--     FOREIGN KEY (product_id) REFERENCES products(product_id)
-- );

-- CREATE TABLE categories (
--     category_id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(50) NOT NULL
-- );

-- CREATE TABLE product_categories (
--     product_id INT NOT NULL,
--     category_id INT NOT NULL,
--     PRIMARY KEY (product_id, category_id),
--     FOREIGN KEY (product_id) REFERENCES products(product_id),
--     FOREIGN KEY (category_id) REFERENCES categories(category_id)
-- );


-- Logic on PROCEDURES
-- CREATE OR REPLACE PROCEDURE InsertEmployee (
--     p_employee_id IN NUMBER,
--     p_employee_name IN VARCHAR2,
--     p_salsary IN NUMBER
-- ) AS
-- BEGIN
--     INSERT INTO employees (emplyee_id, employee_name, salary)
--     VALUE (p_employee_id, p_employee_name, p_salsary);

--     COMMIT;
--     DBMS_OUTPUT.PUT.LINE('Employee inserted successfully.');
-- EXCEPTION
--     WHEN OTHERS THEN
--     ROLLBACK;
--     DBMS_OUTPUT.PUT.LINE('Error inserting employee: ' || SQLERRM);

-- END;
-- /

-- BEGIN
--     InsertEmployee(105, 'Alek Lucatero', 100000);
-- END;
-- /