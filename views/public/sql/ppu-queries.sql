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

CREATE TABLE
   student_info (
      student_id INT NOT NULL AUTO_INCREMENT,
      std_custom_id INT NOT NULL,
      l_name VARCHAR(50) NOT NULL,
      f_name VARCHAR(50) NOT NULL,
      m_init_name VARCHAR(10) NOT NULL,
      course VARCHAR(50) NOT NUll,
      major VARCHAR(50),
      department VARCHAR(50),
      PRIMARY KEY (student_id)
   );

CREATE TABLE
   utility (
      utility_id INT NOT NULL AUTO_INCREMENT,
      student_id INT,
      device VARCHAR(50) NOT NULL,
      device_date_time DATETIME,
      PRIMARY KEY (utility_id),
      FOREIGN KEY (student_id) REFERENCES student_info (student_id)
   );