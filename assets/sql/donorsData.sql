-- Create Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert Dummy Data into Users Table
INSERT INTO users (name, username, password) 
VALUES
('John Doe', 'johndoe', '$2y$10$yQkhxDnBdswHjO0/JD3SOew11SmrMQN8X.lA3/OpZj/5fPEUhP/aW'),
('Jane Smith', 'janesmith', '$2y$10$Xt0PlQHFR.mnmTiWgfEzqOM9Jz7mN8lJYZJofvzh4Oyx2tnMjk4mu');

-- Passwords are hashed using PHP's password_hash function for security
-- johndoe's password is 'password123'
-- janesmith's password is 'mypassword'


-- Create Blood Donors Table
CREATE TABLE blood_donors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    blood_group ENUM('A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-') NOT NULL,
    contact_number VARCHAR(15) NOT NULL,
    email_address VARCHAR(100) NOT NULL,
    last_donation_date DATE
);

-- Insert Dummy Data into Blood Donors Table
INSERT INTO blood_donors (full_name, age, gender, blood_group, contact_number, email_address, last_donation_date)
VALUES
('John Doe', 30, 'Male', 'A+', '123-456-7890', 'johndoe@gmail.com', '2023-08-15'),
('Jane Smith', 28, 'Female', 'B+', '987-654-3210', 'janesmith@yahoo.com', '2023-06-20'),
('Emily Johnson', 25, 'Female', 'O-', '555-123-4567', 'emilyj@example.com', '2023-07-30'),
('Michael Brown', 35, 'Male', 'AB-', '321-654-9870', 'mbrown@hotmail.com', '2023-04-10'),
('Alice White', 40, 'Female', 'O+', '777-888-9999', 'alicewhite@domain.com', '2022-12-25');
