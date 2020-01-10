-- Database Name Abbreviation Long Form: Accident Assistance Web Application
-- Creating new database
DROP DATABASE IF EXISTS rda_db;
CREATE DATABASE rda_db;

-- Accessing newly created database
USE rda_db;

-- Creating Table 1 - Driver
CREATE TABLE Driver
(
    NIC           VARCHAR(12),
    name          VARCHAR(100),
    LastName      VARCHAR(100),
    DateOfBirth   DATE,
    Email         VARCHAR(50) UNIQUE,
    ContactNo     CHAR(10),
    InsuranceNo   VARCHAR(14),
    InsuranceName VARCHAR(25),
    LicenseNo     VARCHAR(7),
    PRIMARY KEY (NIC)
) ENGINE = INNODB;

-- Inserting records into Table 1 - Driver
INSERT INTO Driver(NIC, name, LastName, DateOfBirth, Email, ContactNo, InsuranceNo, InsuranceName, LicenseNo)
Values (2001345796, "Rohan", "Thomas", "1980-02-16", "Rohan12@gmail.com", 0763489516, "AB603759A", "Celinco Insurance",
        "JB6412"),
       (2001546861, "Peter", "Dissanayake", "1970/06/14", "Peter1@yahoo.com", 0729373776, "DC415615B", "AIG Insurance",
        "SL6721"),
       (3873439372, "Jackson", "Fernando", "1980/09/22", "fjackson@gmail.com", 0717672404, "FG841545V",
        "Softlogic insurance", "KJ2831"),
       (3408672316, "Kalani", "Silva", "1991/12/20", "Kalanisilva@yahoo.com", 0762863478, "XZ541651D",
        "FairFirst Insurance", "MC3670"),
       (7835404537, "Gihan", "Correa", "1999/02/26", "Gihan24@yahoo.com", 0762453387, "RT489651T", "Allianz Insurance",
        "TY3869"),
       (9643045334, "Akila", "Herath", "1975/06/02", "Herath14@yahoo.com", 0727683547, "UB448615I", "Celinco insurance",
        "LV3883"),
       (1042876039, "Albert", "Jayewardene", "1988/09/11", "albert54@gmail.com", 0718686388, "KG735445L",
        "AIG Insurance", "AC8874"),
       (8762858764, "Hasan", "Bandara", "1994/07/18", "bandara21@gmail.com", 0761427867, "UI498794S",
        "Allianz Insurance", "IO3635"),
       (5786227481, "Pasindu", "Ekanayake", "2000/12/14", "Pasindu41@yahoo.com", 0762586878, "MN145488V",
        "Allianz Insurance", "MK2785"),
       (7456780465, "Ajith", "Sirisena", "2001/02/18", "ajith@gmail.com", 0727873389, "AG784186C", "Celinco Insurance",
        "PA9046");


-- Creating Table 2 - Report
CREATE TABLE Report
(
    ID          INT(7)      NOT NULL AUTO_INCREMENT,
    NIC         VARCHAR(12) NOT NULL,
    Severity    TINYINT(1),
    Type        VARCHAR(10),
    Description VARCHAR(255),
    Date_Time   DATETIME,
    Longitude   varchar(20),
    Latitude    varchar(20),
    Media       longblob,
    Status      VARCHAR(20),
    PRIMARY KEY (ID, NIC),
    FOREIGN KEY (NIC) REFERENCES Driver (NIC)
) ENGINE = INNODB;

-- Altering Table 2 - Report, to add starting value for AUTO INCREMENT column
ALTER TABLE Report
    AUTO_INCREMENT = 0000001;

-- Inserting records into Table 2 login- Report
INSERT INTO Report(NIC, Severity, Type, Description, Date_Time, Longitude, Latitude, Status)
VALUES (7835404537, 1, "Car", "A small accident with a small amount of damage", "2019/02/18 07:15:25", 79.980607,
        6.834806, "Pending"),
       (5786227481, 3, "Bus", "An accident with many injuries", "2019/12/30 09:58:49", 80.583487, 7.254586, "Approved"),
       (3408672316, 3, "SUV", "An accident with vehical damage", "2019/12/30 19:58:49", 80.683487, 7.154586,
        "Approved"),
       (7456780465, 2, "Bike", "A major accident with many injuries", "2019/10/11 11:03:52", 80.991042, 6.838624,
        "Help Sent");

/*
  Possible Values for Status column in the Report Table:
  Pending, Approved, Disapproved, Help Sent
*/

-- Creating Table 4 - Support
CREATE TABLE Support
(
    ID          INT(7)      NOT NULL AUTO_INCREMENT,
    NIC         VARCHAR(12) NOT NULL,
    Subject     VARCHAR(30),
    Description VARCHAR(255),
    Status      VARCHAR(20),
    PRIMARY KEY (ID, NIC),
    FOREIGN KEY (NIC) REFERENCES Driver (NIC)
) ENGINE = INNODB;

-- Altering Table 4 - Support, to add starting value for AUTO INCREMENT column
ALTER TABLE Support
    AUTO_INCREMENT = 6000000;

-- Inserting records into Table 4 - Support
INSERT INTO Support(NIC, Subject, Description, Status)
VALUES (7835404537, "Car Issue", "Flat Tire", 'Help Sent'),
       (5786227481, "Report Not Seen", "My report not checked still", 'Pending'),
       (5786227481, "Bus Insurance", "Accident with bike on station no insurance help still", 'Pending');


-- Creating Table 5 - EmployeeDetails
CREATE TABLE EmployeeDetails
(
    EID         INT(7) NOT NULL AUTO_INCREMENT,
    DateOfBirth DATE,
    Street      VARCHAR(80),
    City        VARCHAR(50),
    Province    VARCHAR(40),
    PRIMARY KEY (EID)
) ENGINE = INNODB;

-- Altering Table 5 - EmployeeDetails, to add starting value for AUTO INCREMENT column
ALTER TABLE EmployeeDetails
    AUTO_INCREMENT = 9000001;

-- Inserting records into Table 5 - EmployeeDetails
INSERT INTO EmployeeDetails(DateOfBirth, Street, City, Province)
VALUES ('2000-01-01', 'Abdul Caffoor Mawatha', 'Colombo', 'Western'),
       ('1999-02-01', 'Alan Mathiniyarama Rd', 'Colombo', 'Western'),
       ('1999-03-01', 'Alexandra Rd', 'Colombo', 'Western'),
       ('1998-03-01', 'Alfred House Gardens Rd', 'Colombo', 'Western'),
       ('1998-12-01', 'Andarewatta Rd', 'Colombo', 'Western'),
       ('2018-12-01', 'Anula Rd', 'Colombo', 'Western'),
       ('2018-12-01', 'Bagatalle Rd', 'Colombo', 'Western'),
       ('2018-12-02', 'Balapokuna Rd', 'Colombo', 'Western'),
       ('2018-12-02', 'Buchanan St', 'Colombo', 'Western'),
       ('2018-12-02', 'Charlemont Rd', 'Colombo', 'Western'),
       ('2018-12-02', 'Colombo Plan Rd', 'Colombo', 'Western'),
       ('2018-12-02', 'Davidson Rd', 'Colombo', 'Western'),
       ('2018-12-03', 'Dhammarama Rd', 'Colombo', 'Western'),
       ('2018-12-03', 'Dharmaraja Mawatha', 'Colombo', 'Western'),
       ('2018-12-03', 'Dutugemunu St', 'Colombo', 'Western'),
       ('2018-12-03', 'Edmond Rd', 'Colombo', 'Western'),
       ('2018-12-03', 'Elvitigala Mawatha', 'Colombo', 'Western'),
       ('2018-12-04', 'Fernando Rd', 'Colombo', 'Western'),
       ('2018-12-04', 'Fredrica Rd', 'Colombo', 'Western'),
       ('2018-12-04', 'Girton School Rd', 'Colombo', 'Western'),
       ('2018-12-04', 'Handunge Mawatha', 'Colombo', 'Western'),
       ('2018-12-21', 'Harischandra Mawatha', 'Colombo', 'Western'),
       ('2018-12-21', 'Havelock Rd', 'Colombo', 'Western'),
       ('2018-12-21', 'Iswari Rd', 'Colombo', 'Western'),
       ('2018-12-21', 'Jaya Rd', 'Colombo', 'Western'),
       ('2018-12-21', 'Jayasinghe Rd', 'Colombo', 'Western'),
       ('2018-12-21', 'Kalinga Mawatha', 'Colombo', 'Western'),
       ('2018-12-11', 'Kalinga Rd', 'Colombo', 'Western'),
       ('2018-12-10', 'Kalyani Rd', 'Colombo', 'Western'),
       ('2018-12-10', 'Kokila Rd', 'Colombo', 'Western'),
       ('2018-12-11', 'Lauries Rd', 'Colombo', 'Western'),
       ('2018-12-11', 'Lorensz Rd', 'Colombo', 'Western'),
       ('2018-12-11', 'Lower Bagatalle Rd', 'Colombo', 'Western'),
       ('2018-12-11', 'Macleod Rd', 'Colombo', 'Western'),
       ('2018-12-11', 'Maheswari Rd', 'Colombo', 'Western'),
       ('2018-12-11', 'Mahinda Rd', 'Colombo', 'Western'),
       ('2018-12-11', 'Mugalan Rd', 'Colombo', 'Western'),
       ('2018-12-03', 'Mumtaz Mahal Rd', 'Colombo', 'Western'),
       ('2018-12-04', 'Nimal Rd', 'Colombo', 'Western'),
       ('2018-12-05', 'Nimalka Gardens Rd', 'Colombo', 'Western');

-- Creating Table 6 - Police_Agent
CREATE TABLE Police_Agent
(
    NIC       VARCHAR(12) NOT NULL,
    Name      VARCHAR(30),
    Email     VARCHAR(50) UNIQUE,
    ContactNo CHAR(10),
    EID       INT(7),
    PRIMARY KEY (NIC, EID),
    FOREIGN KEY (EID) REFERENCES EmployeeDetails (EID)
) ENGINE = INNODB;

-- Inserting records into Table 6 - Police_Agent
INSERT INTO Police_Agent(NIC, Name, Email, ContactNo, EID)
VALUES (2016341862, "Sahan", "general@police.lk", 0763619401, 9000001),
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
CREATE TABLE Insurance_Agent
(
    NIC           VARCHAR(12) NOT NULL,
    Name          VARCHAR(30),
    Email         VARCHAR(50) UNIQUE,
    ContactNo     INT(10),
    EID           INT(7)      NOT NULL,
    InsuranceName VARCHAR(25),
    PRIMARY KEY (NIC, EID),
    FOREIGN KEY (EID) REFERENCES EmployeeDetails (EID)
) ENGINE = INNODB;

-- Inserting records into Table 7 - Insurance_Agent
INSERT INTO Insurance_Agent(NIC, Name, Email, ContactNo, EID, InsuranceName)
VALUES (7841561006, "Ajantha", "manager@fairfirst.lk", 0761848923, 9000011, "Celinco Insurance"),
       (4484521004, "Rajitha", "Rajitha31@yahoo.com", 0761984123, 9000012, "AIG Insurance"),
       (9485158941, "Ramesh", "Rames3@yahoo.com", 0713843831, 9000013, "Celinco insurance"),
       (5961489561, "Nuwan", "Nuwan8@gmail.com", 0726898499, 9000014, "Allianz Insurance"),
       (5962303894, "Udana", "Udana54@yahoo.com", 0763498423, 9000015, "Celinco insurance"),
       (2659264529, "Gamini", "Gamini314@yahoo.com", 0716884921, 9000016, "AIG Insurance"),
       (2051514121, "Ranga", "tranga@gmail.com", 0761348984, 9000017, "Allianz Insurance"),
       (3226448941, "Tharindu", "Tharindu98@gmail.com", 0719873428, 9000018, "AIG Insurance"),
       (1949168441, "Kamal", "Kamal7@yahoo.com", 0728792129, 9000019, "Celinco insurance"),
       (4897457846, "Pavan", "Pavan1@yahoo.com", 0761423890, 9000020, "Allianz Insurance");


-- Creating Table 8 - RDA_Agent
CREATE TABLE RDA_Agent
(
    NIC   VARCHAR(12) NOT NULL,
    Name  VARCHAR(30),
    Email VARCHAR(50) UNIQUE,
    EID   INT(7)      NOT NULL,
    PRIMARY KEY (NIC, EID),
    FOREIGN KEY (EID) REFERENCES EmployeeDetails (EID)
) ENGINE = INNODB;

-- Inserting records into Table 8 - RDA_Agent
INSERT INTO RDA_Agent(NIC, Name, Email, EID)
VALUES (4894198994, "Chamara", "editor@rda.lk", 9000021),
       (7481984123, "Chathura", "wchathura@yahoo.com", 9000022),
       (4986516165, "Banduka", "banduka23@yahoo.com", 9000023),
       (84911849123, "Akith", "Akith64@gmail.com", 9000024),
       (3164946139, "Andrew", "Andrew74@gmail.com", 9000025),
       (7415112056, "Dulan", "Dulan13@yahoo.com", 9000026),
       (6321984891, "Vishal", "Vishal9@yahoo.com", 9000027),
       (0561489418, "Thilak", "thilak34@gmail.com", 9000028),
       (4135494138, "Marvan", "Marvan792@yahoo.com", 9000029),
       (8431257632, "Lavindra", "Lavindra476@yahoo.com", 9000030);

-- Creating Table 9 - Verified Report
CREATE TABLE vReport
(
    ID          INT(7) NOT NULL AUTO_INCREMENT,
    pNIC        VARCHAR(12),
    rNIC        VARCHAR(12),
    ReportID    INT,
    Severity    TINYINT(1),
    Type        VARCHAR(10),
    Description TINYTEXT,
    Date_Time   DATETIME,
    Longitude   varchar(20),
    Latitude    varchar(20),
    Status      VARCHAR(20),
    PRIMARY KEY (ID, ReportID),
    FOREIGN KEY (ReportID) REFERENCES Report (ID),
    FOREIGN KEY (pNIC) REFERENCES Police_Agent (NIC),
    FOREIGN KEY (rNIC) REFERENCES RDA_Agent (NIC)
) ENGINE = INNODB;
-- Altering Table 9 - Report, to add starting value for AUTO INCREMENT column
ALTER TABLE vReport
    AUTO_INCREMENT = 0000001;

INSERT INTO vReport(ReportID, pNIC, Severity, Type, Description, Date_Time, Longitude, Latitude)
VALUES (0000001, 4891656189, 1, "Car", "A small accident with a small amount of damage", "2019/02/18 07:15:25",
        79.980607, 6.834806),
       (0000002, 2016341862, 3, "Bus", "An accident with many injuries", "2019/12/30 09:58:49", 80.583487, 7.254586),
       (0000003, 2016341862, 3, "SUV", "An accident with vehical damage", "2019/12/30 19:58:49", 80.683487, 7.154586),
       (0000004, 4891656189, 2, "Bike", "A major accident with many injuries", "2019/10/11 11:03:52", 80.991042,
        6.838624);

-- Creating Table 10 - WebMaster
CREATE TABLE WebMaster
(
    NIC   VARCHAR(12) NOT NULL,
    Name  VARCHAR(30),
    Email VARCHAR(50) UNIQUE,
    EID   INT(7)      NOT NULL,
    PRIMARY KEY (NIC, EID),
    FOREIGN KEY (EID) REFERENCES EmployeeDetails (EID)
) ENGINE = INNODB;

-- Inserting records into Table 10 - WebMaster
INSERT INTO WebMaster(NIC, Name, Email, EID)
VALUES (1234568994, "Sydney", "admin@rda.lk", 9000031),
       (7487894563, "Mazie", "Mazie41@yahoo.com", 9000032),
       (4978962565, "Nicholas", "Nicholas49@yahoo.com", 9000033),
       (9638549123, "Mckinney", "Mckinney96@gmail.com", 9000034),
       (1213141589, "Torres", "Torres12@gmail.com", 9000035),
       (3625912056, "IshanC7", "IshanC7@yahoo.com", 9000036),
       (7418524891, "Dougie", "Dougie74@yahoo.com", 9000037),
       (0321458941, "Kumar", "Kumar03@gmail.com", 9000038),
       (0456124138, "Filip", "Filip0456@yahoo.com", 9000039),
       (0000007632, "Sydney", "Sydney000@yahoo.com", 9000040);


-- Creating Table 11 - Login
CREATE TABLE USERS
(
    NIC      VARCHAR(12),
    Name     VARCHAR(100),
    Type     VARCHAR(30),
    Email    VARCHAR(50)  NULL DEFAULT NULL,
    Password VARCHAR(255) NULL DEFAULT NULL,
    PRIMARY KEY (Email)
) ENGINE = INNODB;

-- Inserting records into Table 11 - Login
INSERT INTO USERS (NIC, Name, Email, Type, Password)
VALUES (2001345796, "Rohan", "Rohan12@gmail.com", "Driver",
        "$2y$04$7KpmRVvdA30PToLBAxQ7RuAhSjocUlKqXS5vNRKLR0VdTfaktJysS"), /*rat*/
       (2016341862, "Sahan", "general@police.lk", "Police_Agent",
        "$2y$04$QZeZEri.kHsfV1n0wA6.TOY7/W9c.c25.mqvUo3h4T3mYRVs/B0GK"), /*police*/
       (7841561006, "Ajantha", "manager@fairfirst.lk", "Insurance_Agent",
        "$2y$04$lsQCyYNi1/fdvYOgQCxX9.mGC0UFlbfx4QEr46wW2fIZ3l6FrAHiu"), /*fair*/
       (4894198994, "Chamara", "editor@rda.lk", "RDA_Agent",
        "$2y$04$ANEHhfw73SGe18px1HTk9u7BIx55HHDoIvyUMgkIcHZQ7oABp6mpC"), /*agent*/
       (1234568994, "Sydney", "admin@rda.lk", "WebMaster",
        "$2y$04$.yxXBlATPRJotOiE8m41KuRwLKTzVK8aPIWWtmvhSW0LQUsSWSs6W");
/*root*/


-- Creating Table 12 - Insurance Managed Reports
/*Completed records go here*/
CREATE TABLE Managed_Reports
(
    ID        INT(7) NOT NULL AUTO_INCREMENT,
    NIC       VARCHAR(12),
    ReportID  INT,
    Date_Time DATETIME,
    PRIMARY KEY (ID, ReportID),
    FOREIGN KEY (ReportID) REFERENCES Report (ID),
    FOREIGN KEY (NIC) REFERENCES Insurance_Agent (NIC)
) ENGINE = INNODB;

-- Creating Table 13 - Feedback
CREATE TABLE Feedback
(
    ID          INT(7)      NOT NULL AUTO_INCREMENT,
    Name        VARCHAR(50),
    Email         VARCHAR(50) NOT NULL,
    Subject     VARCHAR(30),
    Description VARCHAR(255),
    PRIMARY KEY (ID)
) ENGINE = INNODB;

-- Altering Table 4 - Support, to add starting value for AUTO INCREMENT column
ALTER TABLE Feedback
    AUTO_INCREMENT = 6000000;
