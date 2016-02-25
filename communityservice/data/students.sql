DROP DATABASE IF EXISTS studentdb;
CREATE DATABASE IF NOT EXISTS studentdb;
USE studentdb;

CREATE TABLE school_table(
	school_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	school_name varchar(60)
);

INSERT INTO school_table
	VALUES
	(null,'Trades Technology'),
	(null,'Business'),
	(null,'Criminal Justince'),
	(null,'Hospitality & Culinary Arts'),
	(null,'Design'),
	(null,'Healthcare'),
	(null,'Nursing'),
	(null,'Information Technology'),
	(null,'Energy & Electronics Technology');
	

CREATE TABLE program_table(
	prog_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	prog_name varchar(40),
	school_id INT NOT NULL,
	FOREIGN KEY (school_id) REFERENCES school_table(school_id)
);

INSERT INTO program_table
	VALUES
	(null,'HVAC Technology', 1),
	(null,'Welding Technology', 1),
	(null,'Accounting', 2),
	(null,'Management', 2),
	(null,'Criminal Justice', 3),
	(null,'Culinary Arts', 4),
	(null,'Hospitality Management Administration', 4),
	(null,'Hotel & Restaurant Management', 4),
	(null,'Travel & Tourism Management', 4),
	(null,'Computer Aided Drafting', 5),
	(null,'Architectural Drafting', 5),
	(null,'Mechanical Drafting', 5),
	(null,'Graphic Design', 5),
	(null,'Video Production', 5),
	(null,'Web Design/Development', 5),
	(null,'Medical Assisting', 6),
	(null,'Medical Coding', 6),
	(null,'Medical Office Administration', 6),
	(null,'Surgical Technology', 6),
	(null,'Therapeutic Massage Practitioner', 6),
	(null,'Practical Nursing', 7),
	(null,'Computer Programming', 8),
	(null,'Information Technology', 8),
	(null,'Network Administration', 8),
	(null,'Network Security & Computer Forensics', 8),
	(null,'Electronics Engineering Technology', 9),
	(null,'Oil & Gas Electronics', 9),
	(null,'Smart Building Technology', 9);
	

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
	(null,15,'Dennis Cupp','test.image', '4th', 'I''m Freaking Awesome!','Winner'),
	(null,6,'Suzzie Que','test.image', '1st', 'I''m Less Awesome than Dennis!','Nominee');

CREATE TABLE service_table (
	serv_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	stud_id INT NOT NULL,
	service_desc text,
	FOREIGN KEY (stud_id) REFERENCES student_table(stud_id)
);

INSERT INTO service_table
	(serv_id, stud_id, service_desc)
	VALUES
	(null, 1, 'Sample Description #1'),
	(null, 1, 'Sample Description #2'),
	(null, 1, 'Sample Description #3'),
	(null, 2, 'Sample Description #1');

/* SHOW TABLES ROWS */
SHOW TABLES;

/* SHOW DATA */
SELECT * FROM student_table;
SELECT * FROM service_table;
SELECT * FROM program_table;
SELECT * FROM school_table;

SELECT stud.stud_name, stud.image, stud.quarter, prog.prog_name, school.school_name, stud.description, stud.award
FROM student_table AS stud
INNER JOIN program_table AS prog
ON stud.prog_id = prog.prog_id
INNER JOIN school_table AS school
ON prog.school_id = school.school_id;

SELECT stud.stud_name, serve.service_desc
FROM service_table AS serve
INNER JOIN student_table AS stud
ON stud.stud_id = serve.stud_id
WHERE serve.stud_id = 1;
