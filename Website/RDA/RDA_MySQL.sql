
-- Database Name Addreviation Long Form: Accident Assistance Web Application
-- Creating new database
DROP DATABASE IF EXISTS rda_db;
CREATE DATABASE rda_db;

-- Accessing newly created database
USE rda_db;

-- Creating Table 1 - Driver
CREATE TABLE Driver(
  NIC VARCHAR(12),
  name VARCHAR(100),
  LastName VARCHAR(100),
  DateOfBirth DATE,
  Email VARCHAR(50) UNIQUE,
  ContactNo CHAR(10),
  InsuranceNo VARCHAR(14),
  InsuranceName VARCHAR(25),
  LicenseNo VARCHAR(7),
  PRIMARY KEY (NIC)
)ENGINE=INNODB;

-- Inserting records into Table 1 - Driver
INSERT INTO Driver(NIC, name, LastName, DateOfBirth, Email, ContactNo, InsuranceNo, InsuranceName, LicenseNo)
Values (2001345796, "Rohan", "Thomas", "1980-02-16", "Rohan12@gmail.com", 0763489516, "AB603759A", "Celinco Insurance", "JB6412"),
(2001546861, "Peter", "Dissanayake", "1970/06/14", "Peter1@yahoo.com", 0729373776, "DC415615B", "AIG Insurance", "SL6721"),
(3873439372, "Jackson", "Fernando", "1980/09/22", "fjackson@gmail.com", 0717672404, "FG841545V", "Softlogic insurance", "KJ2831"),
(3408672316, "Kalani", "Silva", "1991/12/20", "Kalanisilva@yahoo.com", 0762863478, "XZ541651D", "FairFirst Insurance", "MC3670"),
(7835404537, "Gihan", "Correa", "1999/02/26", "Gihan24@yahoo.com", 0762453387, "RT489651T", "Allianz Insurance", "TY3869"),
(9643045334, "Akila", "Herath", "1975/06/02", "Herath14@yahoo.com", 0727683547, "UB448615I", "Celinco insurance", "LV3883"),
(1042876039, "Albert", "Jayewardene", "1988/09/11", "albert54@gmail.com", 0718686388, "KG735445L", "AIG Insurance" ,"AC8874"),
(8762858764, "Hasan", "Bandara", "1994/07/18", "bandara21@gmail.com", 0761427867, "UI498794S", "Allianz Insurance" ,"IO3635"),
(5786227481, "Pasindu", "Ekanayake", "2000/12/14", "Pasindu41@yahoo.com", 0762586878, "MN145488V", "Allianz Insurance" ,"MK2785"),
(7456780465, "Ajith", "Sirisena", "2001/02/18", "ajith@gmail.com", 0727873389, "AG784186C", "Celinco Insurance", "PA9046");


-- Creating Table 2 - Report
CREATE TABLE Report(
  ID INT(7) NOT NULL AUTO_INCREMENT,
  NIC VARCHAR(12) NOT NULL,
  Severity TINYINT(1),
  Type VARCHAR(1),
  Description TINYTEXT,
  Date_Time DATETIME,
  Longitude FLOAT(5),
  Latitude FLOAT(5),
  PRIMARY KEY (ID, NIC),
  FOREIGN KEY (NIC) REFERENCES Driver(NIC)
)ENGINE=INNODB;

-- Altering Table 2 - Report, to add starting value for AUTO INCREMENT column
ALTER TABLE Report AUTO_INCREMENT = 0000001;

-- Inserting records into Table 2 login- Report
INSERT INTO Report(NIC, Severity, Type, Description, Date_Time, Longitude, Latitude)
VALUES (7835404537, 1, "full", "A small accident with a small amount of damage", "2019/02/18 07:15:25", 79.980607, 6.834806),
(5786227481, 3, "Third-party", "An accident with many injuries", "2019/012/30 09:58:49", 80.583487, 7.254586),
(7456780465, 2, "full", "A major accident with many injuries", "2019/10/11 11:03:52", 80.991042, 6.838624);



-- Creating Table 3 - ReportMedia
-- Column with BLOB data type, 'Media', can't be added to a composite primary key without a key length.
-- So, another column was added, 'MediaID', to include in the composite primary key.
CREATE TABLE ReportMedia(
  ID INT(7) NOT NULL AUTO_INCREMENT,
  NIC VARCHAR(12) NOT NULL,
  MediaID INT,
  Media BLOB,
  PRIMARY KEY (ID, NIC, MediaID),
  FOREIGN KEY (MediaID) REFERENCES Report(ID),
  FOREIGN KEY (NIC) REFERENCES Report(NIC)
)ENGINE=INNODB;

-- Inserting records into Table 3 - ReportMedia
INSERT INTO ReportMedia(NIC, MediaID, Media) /*this NIC should be a driver */
VALUES
(7835404537, 0000001, LOAD_FILE("d:/data.txt"));

-- Creating Table 4 - Complaint
CREATE TABLE Complaint(
  ID INT(7) NOT NULL AUTO_INCREMENT,
  NIC VARCHAR(12) NOT NULL,
  Type VARCHAR(10),
  Description TINYTEXT,
  PRIMARY KEY (ID, NIC),
  FOREIGN KEY (NIC) REFERENCES Driver(NIC)
)ENGINE=INNODB;

-- Altering Table 4 - Complaint, to add starting value for AUTO INCREMENT column
ALTER TABLE Complaint AUTO_INCREMENT = 6000000;


-- Inserting records into Table 4 - Complaint
INSERT INTO Complaint(NIC, Type, Description)
VALUES (7835404537, "Error","Can''t login"),
       (7835404537, "Error","Can''t login"),
       (7835404537, "Error","Can''t login");




-- Creating Table 5 - EmployeeDetails
CREATE TABLE EmployeeDetails(
  EID INT(7) NOT NULL AUTO_INCREMENT,
  DateOfBirth DATE,
  Street VARCHAR(80),
  City VARCHAR(50),
  Province VARCHAR(40),
  PRIMARY KEY (EID)
)ENGINE=INNODB;

-- Altering Table 5 - EmployeeDetails, to add starting value for AUTO INCREMENT column
ALTER TABLE EmployeeDetails AUTO_INCREMENT = 9000001;

-- Inserting records into Table 5 - EmployeeDetails
INSERT INTO EmployeeDetails(DateOfBirth,Street,City,Province)VALUES
('2000-01-01','Abdul Caffoor Mawatha','Colombo','Western'),
('1999-02-01','Alan Mathiniyarama Rd','Colombo','Western'),
('1999-03-01','Alexandra Rd','Colombo','Western'),
('1998-03-01','Alfred House Gardens Rd','Colombo','Western'),
('1998-12-01','Andarewatta Rd','Colombo','Western'),
('2018-12-01','Anula Rd','Colombo','Western'),
('2018-12-01','Bagatalle Rd','Colombo','Western'),
('2018-12-02','Balapokuna Rd','Colombo','Western'),
('2018-12-02','Buchanan St','Colombo','Western'),
('2018-12-02','Charlemont Rd','Colombo','Western'),
('2018-12-02','Colombo Plan Rd','Colombo','Western'),
('2018-12-02','Davidson Rd','Colombo','Western'),
('2018-12-03','Dhammarama Rd','Colombo','Western'),
('2018-12-03','Dharmaraja Mawatha','Colombo','Western'),
('2018-12-03','Dutugemunu St','Colombo','Western'),
('2018-12-03','Edmond Rd','Colombo','Western'),
('2018-12-03','Elvitigala Mawatha','Colombo','Western'),
('2018-12-04','Fernando Rd','Colombo','Western'),
('2018-12-04','Fredrica Rd','Colombo','Western'),
('2018-12-04','Girton School Rd','Colombo','Western'),
('2018-12-04','Handunge Mawatha','Colombo','Western'),
('2018-12-21','Harischandra Mawatha','Colombo','Western'),
('2018-12-21','Havelock Rd','Colombo','Western'),
('2018-12-21','Iswari Rd','Colombo','Western'),
('2018-12-21','Jaya Rd','Colombo','Western'),
('2018-12-21','Jayasinghe Rd','Colombo','Western'),
('2018-12-21','Kalinga Mawatha','Colombo','Western'),
('2018-12-11','Kalinga Rd','Colombo','Western'),
('2018-12-10','Kalyani Rd','Colombo','Western'),
('2018-12-10','Kokila Rd','Colombo','Western'),
('2018-12-11','Lauries Rd','Colombo','Western'),
('2018-12-11','Lorensz Rd','Colombo','Western'),
('2018-12-11','Lower Bagatalle Rd','Colombo','Western'),
('2018-12-11','Macleod Rd','Colombo','Western'),
('2018-12-11','Maheswari Rd','Colombo','Western'),
('2018-12-11','Mahinda Rd','Colombo','Western'),
('2018-12-11','Mugalan Rd','Colombo','Western'),
('2018-12-03','Mumtaz Mahal Rd','Colombo','Western'),
('2018-12-04','Nimal Rd','Colombo','Western'),
('2018-12-05','Nimalka Gardens Rd','Colombo','Western');

-- Creating Table 6 - Police_Agent
CREATE TABLE Police_Agent(
  NIC VARCHAR(12) NOT NULL,
  Name VARCHAR(30),
  Email VARCHAR(50) UNIQUE,
  ContactNo CHAR(10),
  EID INT(7),
  PRIMARY KEY (NIC, EID),
  FOREIGN KEY (EID) REFERENCES EmployeeDetails(EID)
)ENGINE=INNODB;

-- Inserting records into Table 6 - Police_Agent
INSERT INTO Police_Agent(NIC, Name, Email, ContactNo, EID)
VALUES (2016341860, "Sahan", "Shan12@gmail.com", 0763619401, 9000001),
(4891656189, "Oshan", "woshan@gmail.com", 0721416462, 9000002),
(2165189489, "Ashane", "ashane41@gmail.com", 0761348431, 9000003),
(9415618913, "Athula", "Athula7@yahoo.com", 0713184169, 9000004),
(9526223252, "Chamara", "chamaraw@yahoo.com", 0713189494, 9000005),
(8423210065, "Iranga", "Iranag13@gmail.com", 0721841984, 9000006),
(8451122198, "Chaminda", "Chaminda3@yahoo.com", 0761816218, 9000007),
(1349841297, "Lasitha", "Lasitha65@yahoo.com", 0711894923, 9000008),
(7156213980, "Sandun", "Sandun62@yahoo.com", 0724984949, 9000009),
(8451016196, "Sanjeeva", "Sanjeeva8@gmail.com", 0716498348, 9000010);


-- Creating Table 7 - Insurance_Agent
CREATE TABLE Insurance_Agent(
  NIC VARCHAR(12) NOT NULL,
  Name VARCHAR(30),
  Email VARCHAR(50) UNIQUE,
  ContactNo INT(10),
  EID INT(7) NOT NULL,
  InsuranceName VARCHAR(25),
  PRIMARY KEY (NIC, EID),
  FOREIGN KEY (EID) REFERENCES EmployeeDetails(EID)
)ENGINE=INNODB;

-- Inserting records into Table 7 - Insurance_Agent
INSERT INTO Insurance_Agent(NIC, Name, Email,ContactNo, EID, InsuranceName)
VALUES(7841561006, "Ajantha", "ajantha12@gmail.com", 0761848923, 9000011, "Celinco Insurance"),
(4484521004, "Rajitha", "Rajitha31@yahoo.com", 0761984123, 9000012, "AIG Insurance"),
(9485158941, "Ramesh", "Rames3@yahoo.com", 0713843831, 9000013, "Celinco insurance"),
(5961489561, "Nuwan", "Nuwan8@gmail.com", 0726898499, 9000014, "Allianz Insurance"),
(5962303894, "Udana", "Udana54@yahoo.com", 0763498423, 9000015, "Celinco insurance"),
(2659264529, "Gamini", "Gamini314@yahoo.com", 0716884921, 9000016, "AIG Insurance"),
(2051514121, "Ranga", "tranga@gmail.com", 0761348984, 9000017, "Allianz Insurance"),
(3226448941, "Tharindu", "Tharindu98@gmail.com", 0719873428, 9000018, "AIG Insurance"),
(1949168441, "Kamal", "Kamal7@yahoo.com", 0728792129, 9000019, "Celinco insurance"),
(4897457846, "Pavan" , "Pavan1@yahoo.com", 0761423890, 9000020, "Allianz Insurance");



-- Creating Table 8 - RDA_Agent
CREATE TABLE RDA_Agent(
  NIC VARCHAR(12) NOT NULL,
  Name VARCHAR(30),
  Email VARCHAR(50) UNIQUE,
  EID INT(7) NOT NULL,
  PRIMARY KEY (NIC, EID),
  FOREIGN KEY (EID) REFERENCES EmployeeDetails(EID)
)ENGINE=INNODB;

-- Inserting records into Table 8 - RDA_Agent
INSERT INTO RDA_Agent(NIC, Name, Email, EID)
VALUES(4894198994, "Chamara", "chamara24@gmail.com", 9000021),
(7481984123, "Chathura", "wchathura@yahoo.com", 9000022),
(4986516165, "Banduka", "banduka23@yahoo.com", 9000023),
(84911849123, "Akith", "Akith64@gmail.com", 9000024),
(3164946139, "Andrew", "Andrew74@gmail.com", 9000025),
(7415112056, "Dulan", "Dulan13@yahoo.com", 9000026),
(6321984891, "Vishal", "Vishal9@yahoo.com", 9000027),
(0561489418, "Thilak", "thilak34@gmail.com", 9000028),
(4135494138, "Marvan", "Marvan792@yahoo.com", 9000029),
(8431257632, "Lavindra", "Lavindra476@yahoo.com", 9000030);


-- Creating Table 9 - WebMaster
CREATE TABLE WebMaster(
  NIC VARCHAR(12) NOT NULL,
  Name VARCHAR(30),
  Email VARCHAR(50) UNIQUE,
  EID INT(7) NOT NULL,
  PRIMARY KEY (NIC, EID),
  FOREIGN KEY (EID) REFERENCES EmployeeDetails(EID)
)ENGINE=INNODB;

-- Inserting records into Table 9 - WebMaster
INSERT INTO WebMaster(NIC, Name, Email, EID)
VALUES(1234568994, "Sydney", "Sydney12@gmail.com", 9000031),
(7487894563, "Mazie", "Mazie41@yahoo.com", 9000032),
(4978962565, "Nicholas", "Nicholas49@yahoo.com", 9000033),
(9638549123, "Mckinney", "Mckinney96@gmail.com", 9000034),
(1213141589, "Torres", "Torres12@gmail.com", 9000035),
(3625912056, "IshanC7", "IshanC7@yahoo.com", 9000036),
(7418524891, "Dougie", "Dougie74@yahoo.com", 9000037),
(0321458941, "Kumar", "Kumar03@gmail.com", 9000038),
(0456124138, "Filip", "Filip0456@yahoo.com", 9000039),
(0000007632, "Sydney", "Sydney000@yahoo.com", 9000040);


-- Creating Table 10 - Login
CREATE TABLE Login_EMP(
  Type VARCHAR(30),
  EID INT(7),
  PasswordHash VARCHAR(10),
  PRIMARY KEY (EID,Type),
  FOREIGN KEY (EID) REFERENCES EmployeeDetails(EID)
/* FOREIGN KEY (NIC) REFERENCES Driver(NIC),
  FOREIGN KEY (NIC) REFERENCES Police_Agent(NIC),
  FOREIGN KEY (NIC) REFERENCES Insurance_Agent(NIC),
  FOREIGN KEY (NIC) REFERENCES RDA_Agent(NIC),
  FOREIGN KEY (NIC) REFERENCES WebMaster(NIC),
  FOREIGN KEY (Email) REFERENCES Driver(Email),
  FOREIGN KEY (Email) REFERENCES Police_Agent(Email),
  FOREIGN KEY (Email) REFERENCES Insurance_Agent(Email),
  FOREIGN KEY (Email) REFERENCES RDA_Agent(Email),
  FOREIGN KEY (Email) REFERENCES WebMaster(Email)*/
)ENGINE=INNODB;

-- Inserting records into Table 10 - Login

INSERT INTO Login_EMP(EID, Type, PasswordHash)
VALUES
(9000001,"Police_Agent", "xyz"),
(9000011, "Insurance_Agent", "789"),
(9000021, "RDA_Agent", "abc"),
(9000031, "WebMaster", "");



CREATE TABLE Login_Driver(
  NIC VARCHAR(12),
  Type VARCHAR(30),
  PasswordHash VARCHAR(10),
  PRIMARY KEY (NIC,type),
  FOREIGN KEY (NIC) REFERENCES Driver(NIC)
)ENGINE=INNODB;

-- Inserting records into Table 10 - Login

INSERT INTO Login_Driver(NIC, Type, PasswordHash)
VALUES
(2001345796,"Driver","xyz");
