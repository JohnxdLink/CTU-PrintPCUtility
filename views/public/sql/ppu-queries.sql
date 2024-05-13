CREATE DATABASE print_pc_utility_db;

CREATE TABLE
   admin (
      admin_id INT NOT NULL AUTO_INCREMENT,
      username VARCHAR(20) NOT NULL,
      password VARCHAR(20) NOT NULL,
      PRIMARY KEY (admin_id)
   );

INSERT INTO
   admin (username, password)
VALUES
   ('admin', 'admin');

DROP TABLE utility;

DROP TABLE school;

DROP TABLE student_info;

CREATE TABLE
   student_info (
      student_id INT NOT NULL AUTO_INCREMENT,
      std_custom_id INT NOT NULL,
      l_name VARCHAR(50) NOT NULL,
      f_name VARCHAR(50) NOT NULL,
      m_init_name VARCHAR(10) NOT NULL,
      PRIMARY KEY (student_id)
   );

CREATE TABLE
   school (
      school_id INT NOT NULL AUTO_INCREMENT,
      fk_student_id INT,
      course VARCHAR(50) NOT NUll,
      major VARCHAR(50),
      department VARCHAR(50),
      PRIMARY KEY (school_id),
      FOREIGN KEY (fk_student_id) REFERENCES student_info (student_id)
   );

CREATE TABLE
   utility (
      utility_id INT NOT NULL AUTO_INCREMENT,
      fk_student_id INT,
      device VARCHAR(50) NOT NULL,
      device_date_time DATETIME,
      PRIMARY KEY (utility_id),
      FOREIGN KEY (fk_student_id) REFERENCES student_info (student_id)
   );

INSERT INTO
   student_info (std_custom_id, l_name, f_name, m_init_name)
VALUES
   (1001, 'Smith', 'John', 'A'),
   (1002, 'Doe', 'Jane', 'B'),
   (1003, 'Johnson', 'Michael', 'C'),
   (1004, 'Williams', 'Emily', 'D'),
   (1005, 'Brown', 'Christopher', 'E');

INSERT INTO
   school (fk_student_id, course, major, department)
VALUES
   (
      1,
      'Computer Science',
      'Software Engineering',
      'Engineering'
   ),
   (
      2,
      'Business Administration',
      'Marketing',
      'Business'
   ),
   (3, 'Biology', 'Genetics', 'Science'),
   (
      4,
      'Psychology',
      'Clinical Psychology',
      'Social Science'
   ),
   (
      5,
      'Mechanical Engineering',
      'Thermal Engineering',
      'Engineering'
   );

INSERT INTO
   utility (fk_student_id, device, device_date_time)
VALUES
   (1, 'Laptop', '2024-05-13 09:00:00'),
   (2, 'Smartphone', '2024-05-13 10:30:00'),
   (3, 'Tablet', '2024-05-13 11:45:00'),
   (4, 'Desktop', '2024-05-13 13:15:00'),
   (5, 'Smartwatch', '2024-05-13 14:30:00');

-- ! SELECT JOIN
SELECT
   si.std_custom_id,
   si.l_name,
   si.f_name,
   si.m_init_name,
   sc.course,
   sc.major,
   sc.department,
   ut.device,
   ut.device_date_time
FROM
   student_info si
   JOIN school sc ON si.student_id = sc.fk_student_id
   JOIN utility ut ON si.student_id = ut.fk_student_id;