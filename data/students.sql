DROP DATABASE IF EXISTS studentdb;
CREATE DATABASE IF NOT EXISTS studentdb;
USE studentdb;

CREATE TABLE school_table(
	school_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	school_name varchar(60)
);

INSERT INTO school_table
	VALUES
	(null,'MULTIMEDIA');


CREATE TABLE program_table(
	prog_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	prog_name varchar(40),
	school_id INT NOT NULL,
	FOREIGN KEY (school_id) REFERENCES school_table(school_id)
);

INSERT INTO program_table
	VALUES
	(null,'WEB DESIGN',1);

CREATE TABLE student_table (
  stud_id int PRIMARY KEY auto_increment NOT NULL,
  prog_id INT NOT NULL,
  stud_name varchar(75),
  image varchar(100),
  quarter enum('1st','2nd','3rd','4th','5th','6th','7th','8th'),
  description text,
  award enum('Nominee','Winner','Honorable-Mention'),
  FOREIGN KEY (prog_id) REFERENCES program_table(prog_id)
) ENGINE=InnoDB, AUTO_INCREMENT=1;

INSERT INTO student_table
	(stud_id, prog_id, stud_name, image, quarter, description, award)
	VALUES 
	(null,1,'Dennis Cupp','test.image', '1st', 'I''m Freaking Awesome!','Winner');

CREATE TABLE service_table (
	serv_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	stud_id INT NOT NULL,
	service_desc text,
	FOREIGN KEY (stud_id) REFERENCES student_table(stud_id)
);

/* SHOW TABLES ROWS */
SHOW TABLES;

/* SHOW DATA */
SELECT * FROM student_table;
SELECT * FROM service_table;
SELECT * FROM program_table;
SELECT * FROM school_table;