CREATE DATABASE expense_tracker;
USE expense_tracker;

CREATE TABLE expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    amount DECIMAL(10,2),
    type ENUM('income', 'expense'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
