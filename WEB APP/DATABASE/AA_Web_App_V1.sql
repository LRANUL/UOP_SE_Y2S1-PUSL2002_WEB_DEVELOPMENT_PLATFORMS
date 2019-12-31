
-- Database Name Addreviation Long Form: Accident Assistance Web Application
-- Creating new database
CREATE DATABASE AAWA;

-- Accessing newly created database
USE AAWA;

-- Creating Table 1 - Driver
CREATE TABLE Driver(
  NIC VARCHAR(12) NOT NULL,
  FirstName VARCHAR(100),
  LastName VARCHAR(100),
  DateOfBirth DATE,
  Email VARCHAR(50),
  ContactNo CHAR(10),
  InsuranceNo VARCHAR(14),
  InsuranceName VARCHAR(25),
  LicenseNo VARCHAR(7),
  PRIMARY KEY (NIC)
)ENGINE=INNODB;

-- Inserting records into Table 1 - Driver


-- Creating Table 2 - Report
CREATE TABLE Report(
  ID VARCHAR(7) NOT NULL,
  NIC VARCHAR(12) NOT NULL,
  Severity TINYINT(10),
  Type VARCHAR(10),
  Description TINYTEXT,
  Date_Time DATETIME,
  Longitude FLOAT(5),
  Latitude FLOAT(5),
  PRIMARY KEY (ID, NIC),
  FOREIGN KEY (NIC) REFERENCES Driver(NIC)
)ENGINE=INNODB;

-- Inserting records into Table 2 login- Report


-- Creating Table 3 - ReportMedia
-- Column with BLOB data type, 'Media', can't be added to a composite primary key without a key length.
-- So, another column was added, 'MediaID', to include in the composite primary key.
CREATE TABLE ReportMedia(
  ID VARCHAR(7) NOT NULL,
  NIC VARCHAR(12) NOT NULL,
  MediaID INT,
  Media BLOB,
  PRIMARY KEY (ID, NIC, MediaID),
  FOREIGN KEY (ID) REFERENCES Report(ID),
  FOREIGN KEY (NIC) REFERENCES Report(NIC)
)ENGINE=INNODB;

-- Inserting records into Table 3 - ReportMedia


-- Creating Table 4 - Complaint
CREATE TABLE Complaint(
  ID VARCHAR(7) NOT NULL,
  NIC VARCHAR(12) NOT NULL,
  Type VARCHAR(10),
  Description TINYTEXT,
  PRIMARY KEY (ID, NIC),
  FOREIGN KEY (NIC) REFERENCES Driver(NIC)
)ENGINE=INNODB;

-- Inserting records into Table 4 - Complaint


-- Creating Table 5 - EmployeeDetails
CREATE TABLE EmployeeDetails(
  EID VARCHAR(7) NOT NULL,
  FirstName VARCHAR(100),
  LastName VARCHAR(100),
  DateOfBirth DATE,
  ContactNo CHAR(10),
  Street VARCHAR(80),
  City VARCHAR(50),
  Provience VARCHAR(40),
  PRIMARY KEY (EID)
)ENGINE=INNODB;

-- Inserting records into Table 5 - EmployeeDetails


-- Creating Table 6 - Police_Agent
CREATE TABLE Police_Agent(
  NIC VARCHAR(12) NOT NULL,
  Name VARCHAR(30),
  Email VARCHAR(50),
  ContactNo CHAR(10),
  EID VARCHAR(7),
  PRIMARY KEY (NIC, EID),
  FOREIGN KEY (EID) REFERENCES EmployeeDetails(EID)
)ENGINE=INNODB;

-- Inserting records into Table 6 - Police_Agent


-- Creating Table 7 - Insurance_Agent
CREATE TABLE Insurance_Agent(
  NIC VARCHAR(12) NOT NULL,
  Name VARCHAR(30),
  Email VARCHAR(50),
  EID VARCHAR(7) NOT NULL,
  InsuranceName VARCHAR(25),
  PRIMARY KEY (NIC, EID),
  FOREIGN KEY (EID) REFERENCES EmployeeDetails(EID)
)ENGINE=INNODB;

-- Inserting records into Table 7 - Insurance_Agent


-- Creating Table 8 - RDA_Agent
CREATE TABLE RDA_Agent(
  NIC VARCHAR(12) NOT NULL,
  Name VARCHAR(30),
  Email VARCHAR(50),
  EID VARCHAR(7) NOT NULL,
  PRIMARY KEY (NIC, EID),
  FOREIGN KEY (EID) REFERENCES EmployeeDetails(EID)
)ENGINE=INNODB;

-- Inserting records into Table 8 - RDA_Agent


-- Creating Table 9 - WebMaster
CREATE TABLE WebMaster(
  NIC VARCHAR(12) NOT NULL,
  Name VARCHAR(30),
  Email VARCHAR(50),
  EID VARCHAR(7) NOT NULL,
  PRIMARY KEY (NIC, EID),
  FOREIGN KEY (EID) REFERENCES EmployeeDetails(EID)
)ENGINE=INNODB;

-- Inserting records into Table 9 - WebMaster


-- Creating Table 10 - Login
CREATE TABLE Login(
  Email VARCHAR(7),
  NIC VARCHAR(12) NOT NULL,
  Type VARCHAR(10),
  PasswordHash BINARY(64),
  PRIMARY KEY (NIC),
  FOREIGN KEY (Email) REFERENCES Driver(Email),
  FOREIGN KEY (Email) REFERENCES Police_Agent(Email),
  FOREIGN KEY (Email) REFERENCES Insurance_Agent(Email),
  FOREIGN KEY (Email) REFERENCES RDA_Agent(Email),
  FOREIGN KEY (Email) REFERENCES WebMaster(Email),
  FOREIGN KEY (NIC) REFERENCES Driver(NIC),
  FOREIGN KEY (NIC) REFERENCES Police_Agent(NIC),
  FOREIGN KEY (NIC) REFERENCES Insurance_Agent(NIC),
  FOREIGN KEY (NIC) REFERENCES RDA_Agent(NIC),
  FOREIGN KEY (NIC) REFERENCES WebMaster(NIC)
)ENGINE=MYISAM;

-- Inserting records into Table 10 - Login
