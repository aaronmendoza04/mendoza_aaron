-- Database Setup Script for Student Management System
-- Run this script in your new Aiven MySQL database to create the required table

-- Create the students table
CREATE TABLE IF NOT EXISTS `students` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `first_name` varchar(100) NOT NULL,
    `last_name` varchar(100) NOT NULL,
    `email` varchar(255) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Insert some sample data for testing
INSERT INTO `students` (`first_name`, `last_name`, `email`) VALUES
('John', 'Doe', 'john.doe@example.com'),
('Jane', 'Smith', 'jane.smith@example.com'),
('Michael', 'Johnson', 'michael.johnson@example.com'),
('Sarah', 'Williams', 'sarah.williams@example.com'),
('David', 'Brown', 'david.brown@example.com'),
('Emily', 'Davis', 'emily.davis@example.com'),
('James', 'Miller', 'james.miller@example.com'),
('Lisa', 'Wilson', 'lisa.wilson@example.com'),
('Robert', 'Moore', 'robert.moore@example.com'),
('Jennifer', 'Taylor', 'jennifer.taylor@example.com');

-- Show the created table structure
DESCRIBE `students`;

-- Show the inserted sample data
SELECT * FROM `students` LIMIT 10;
