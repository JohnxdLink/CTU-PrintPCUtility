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

-- ! SELECT JOIN
SELECT
   si.student_id,
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