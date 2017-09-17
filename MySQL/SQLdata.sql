CREATE TABLE Customer(
    CustomerID INT(8) AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(20) NOT NULL,
    LastName VARCHAR(20) NOT NULL,
    Phone VARCHAR(22),
    Email VARCHAR(100)
);

CREATE TABLE Product(
    ModelNumber VARCHAR(32) PRIMARY KEY,
    Manufacturer VARCHAR(32) NOT NULL,
    Price DECIMAL NOT NULL
);

CREATE TABLE Monitor(
    ModelNumber VARCHAR(32) PRIMARY KEY,
    Manufacturer VARCHAR(32) NOT NULL references Product(Manufacturer),
    Price DECIMAL NOT NULL references Product(Price),
    Resolution CHAR(9) NOT NULL,
    RefreshRate VARCHAR(5) NOT NULL,
    Latency VARCHAR(4),
    FOREIGN KEY (ModelNumber) references Product(ModelNumber) ON DELETE CASCADE
);

CREATE TABLE Desktop(
    ModelNumber VARCHAR(32) PRIMARY KEY,
    Manufacturer VARCHAR(32) NOT NULL references Product(Manufacturer),
    Price DECIMAL NOT NULL references Product(Price),
    CPUClock CHAR(6) NOT NULL,
    MemorySize CHAR(4) NOT NULL,
    DiskSize VARCHAR(15),
    DedicatedGPU VARCHAR(3) NOT NULL,
    FOREIGN KEY (ModelNumber) references Product(ModelNumber) ON DELETE CASCADE
);

CREATE TABLE Laptop(
    ModelNumber VARCHAR(32) PRIMARY KEY,
    Manufacturer VARCHAR(32) NOT NULL references Product(Manufacturer),
    Price DECIMAL NOT NULL references Product(Price),
    Convertible VARCHAR(3) NOT NULL,
    Webcam VARCHAR(3) NOT NULL,
    SizeInInches char(3),
    FOREIGN KEY (ModelNumber) references Product(ModelNumber) ON DELETE CASCADE
);

CREATE TABLE CellPhone(
    ModelNumber VARCHAR(32) PRIMARY KEY,
    Manufacturer VARCHAR(32) NOT NULL references Product(Manufacturer),
    Price DECIMAL NOT NULL references Product(Price),
    OperatingSystem VARCHAR(30) NOT NULL,
    4GCompatible VARCHAR(3),
    SizeInInches VARCHAR(4) NOT NULL,
    FOREIGN KEY (ModelNumber) references Product(ModelNumber) ON DELETE CASCADE
);

CREATE TABLE AntiVirus (
    SoftwareVersion VARCHAR(30) NOT NULL,
    ActivationKey VARCHAR(62) NOT NULL,
    ModelNumber VARCHAR(32),
    FOREIGN KEY (ModelNumber) references Product(ModelNumber),
    PRIMARY KEY (ModelNumber, SoftwareVersion)
);

CREATE TABLE CustomerProductIT (
    CustomerID INT(8) NOT NULL,
    ModelNumber VARCHAR(32) NOT NULL,
    PRIMARY KEY (CustomerID, ModelNumber),
    FOREIGN KEY (CustomerID) references Customer(CustomerID),
    FOREIGN KEY (ModelNumber) references Product(ModelNumber)
);

/* Inserting Monitor attributes into the parent Product */
INSERT INTO Product (ModelNumber, Manufacturer, Price) VALUES ('KSJF910', 'INTEL', '$199.00');
INSERT INTO Product (ModelNumber, Manufacturer, Price) VALUES ('DLKA394', 'DELL',  '$299.00');
INSERT INTO Product (ModelNumber, Manufacturer, Price) VALUES ('FI30S9D', 'ASUS',  '$400.00');
INSERT INTO Product (ModelNumber, Manufacturer, Price) VALUES ('DPOEWN4', 'QNIX',  '$349.00');
INSERT INTO Product (ModelNumber, Manufacturer, Price) VALUES ('LG83948', 'LG',    '$99.00');

/* Inserting Desktop attributes into the parent Product */
INSERT INTO Product (ModelNumber, Manufacturer, Price) VALUES ('PAIRU34',   'CYBERPOWER', '$1999.00');
INSERT INTO Product (ModelNumber, Manufacturer, Price) VALUES ('IVOD1',     'ACER',       '$3000.00');
INSERT INTO Product (ModelNumber, Manufacturer, Price) VALUES ('VI23',      'ASUS',       '$899.00');
INSERT INTO Product (ModelNumber, Manufacturer, Price) VALUES ('MN98830',   'LENOVO',     '$999.00');
INSERT INTO Product (ModelNumber, Manufacturer, Price) VALUES ('XPS8100',   'DELL',       '$1499.00');

/* Inserting laptop attributes into the parent Product */
INSERT INTO Product (ModelNumber, Manufacturer, Price) VALUES ('AC3910',  'ACER',   '$899.00');
INSERT INTO Product (ModelNumber, Manufacturer, Price) VALUES ('MBA491',  'APPLE',  '$9999.00');
INSERT INTO Product (ModelNumber, Manufacturer, Price) VALUES ('HP93710', 'HP',     '$500.00');
INSERT INTO Product (ModelNumber, Manufacturer, Price) VALUES ('LN9234',  'LENOVO', '$978.00');
INSERT INTO Product (ModelNumber, Manufacturer, Price) VALUES ('CB872',   'GOOGLE', '$1000.00');

/* Inserting CellPhone attributes into the parent Product */
INSERT INTO Product (ModelNumber, Manufacturer, Price) VALUES ('MJ39874',  'MOTOROLA', '$299.00');
INSERT INTO Product (ModelNumber, Manufacturer, Price) VALUES ('HTC0245',  'HTC',      '$799.00');
INSERT INTO Product (ModelNumber, Manufacturer, Price) VALUES ('LGV10',    'LG',       '$699.00');
INSERT INTO Product (ModelNumber, Manufacturer, Price) VALUES ('HTC984',   'HTC',      '$400.00');
INSERT INTO Product (ModelNumber, Manufacturer, Price) VALUES ('CSD9201',  'GOOGLE',   '$900.00');


/* Inserting Customer entity instances into Customer*/
INSERT INTO Customer (FirstName, LastName, Phone, Email) VALUES ('Terry',   'Bradshow', '940-879-5642', 'j.williams@gmail.com');
INSERT INTO Customer (FirstName, LastName, Phone, Email) VALUES ('John',   'Williams', '940-879-5642', 'j.williams@gmail.com');
INSERT INTO Customer (FirstName, LastName, Phone, Email) VALUES ('Linus',  'Torvalds', '214-678-2365', 'linus.torvalds@gmail.com');
INSERT INTO Customer (FirstName, LastName, Phone, Email) VALUES ('Larry',  'Page',     '623-501-4832', 'lpage@yahoo.com');
INSERT INTO Customer (FirstName, LastName, Phone, Email) VALUES ('Sergey', 'Brin',     '518-845-6495', 'sergeyb@aol.com');
INSERT INTO Customer (FirstName, LastName, Phone, Email) VALUES ('Gordon', 'Moore',    '316-549-2134', 'gmoore@gmail.com');

/* Inserting Monitor entity instances into the Product SUB TYPE Monitor */
INSERT INTO Monitor (ModelNumber, Manufacturer, Price, Resolution, RefreshRate, Latency) VALUES ('KSJF910', 'Intel', '$199.00', '1920x1080', '60Hz', '1ms');
INSERT INTO Monitor (ModelNumber, Manufacturer, Price, Resolution, RefreshRate, Latency) VALUES ('DLKA394', 'DELL',  '$299.00', '2560x1440', '60Hz', '4ms');
INSERT INTO Monitor (ModelNumber, Manufacturer, Price, Resolution, RefreshRate, Latency) VALUES ('FI30S9D', 'ASUS',  '$400.00', '3840x2160', '96Hz', '3ms');
INSERT INTO Monitor (ModelNumber, Manufacturer, Price, Resolution, RefreshRate, Latency) VALUES ('DPOEWN4', 'QNIX',  '$349.00', '2460x1440', '144Hz', '2ms');
INSERT INTO Monitor (ModelNumber, Manufacturer, Price, Resolution, RefreshRate, Latency) VALUES ('LG83948', 'LG',    '$99.00',  '1280x0720', '60Hz', '7ms');

/* Inserting Desktop entity instanMes into the Product SUB TYPE Desktop */
INSERT INTO Desktop (ModelNumber, Manufacturer, Price, CPUClock, MemorySize, DiskSize, DedicatedGPU) VALUES ('PAIRU34', 'CYBERPOWER', '$1999.00', '3.8GHz', '16GB', '2.5 TB', 'YES');
INSERT INTO Desktop (ModelNumber, Manufacturer, Price, CPUClock, MemorySize, DiskSize, DedicatedGPU) VALUES ('IVOD1',   'ACER',       '$3000.00', '4.6GHz', '32GB', '4.0 TB', 'YES');
INSERT INTO Desktop (ModelNumber, Manufacturer, Price, CPUClock, MemorySize, DiskSize, DedicatedGPU) VALUES ('VI23',    'ASUS',       '$899.00',  '3.7GHz', '08GB', '800 GB', 'NO');
INSERT INTO Desktop (ModelNumber, Manufacturer, Price, CPUClock, MemorySize, DiskSize, DedicatedGPU) VALUES ('MN98830', 'LENOVO',     '$999.00',  '4.2GHz', '12GB', '900 GB', 'NO');
INSERT INTO Desktop (ModelNumber, Manufacturer, Price, CPUClock, MemorySize, DiskSize, DedicatedGPU) VALUES ('XPS8100', 'DELL',       '$1499.00', '4.5GHz', '16GB', '2.0 TB', 'YES');
INSERT INTO Desktop (ModelNumber, Manufacturer, Price, CPUClock, MemorySize, DiskSize, DedicatedGPU) VALUES ('XP8', 'DELL',       '$399.00', '4.8GHz', '08GB', '1.0 TB', 'YES');
/* Inserting Laptop entity instances into the Product SUB TYPE Laptop */
INSERT INTO Laptop (ModelNumber, Manufacturer, Price, Convertible, Webcam, SizeInInches) VALUES ('AC3910',   'ACER',   '$899.00',  'YES', 'NO',  '15"');
INSERT INTO Laptop (ModelNumber, Manufacturer, Price, Convertible, Webcam, SizeInInches) VALUES ('MBA491',   'APPLE',  '$9999.00', 'NO', 'YES',  '11"');
INSERT INTO Laptop (ModelNumber, Manufacturer, Price, Convertible, Webcam, SizeInInches) VALUES ('HP93710',  'HP',     '$500.00',  'YES', 'YES', '17"');
INSERT INTO Laptop (ModelNumber, Manufacturer, Price, Convertible, Webcam, SizeInInches) VALUES ('LN9234',   'LENOVO', '$978.00',  'NO', 'NO',   '15"');
INSERT INTO Laptop (ModelNumber, Manufacturer, Price, Convertible, Webcam, SizeInInches) VALUES ('CB872',    'GOOGLE', '$1000.00', 'YES', 'YES', '12"');

/* Inserting CellPhone entity instances into the Product SUB TYPE CellPhone */
INSERT INTO CellPhone (ModelNumber, Manufacturer, Price, OperatingSystem, 4GCompatible, SizeInInches) VALUES ('MJ39874',  'MOTOROLA', '$299.00', 'Android KitKat',    'YES', '7.0"');
INSERT INTO CellPhone (ModelNumber, Manufacturer, Price, OperatingSystem, 4GCompatible, SizeInInches) VALUES ('HTC0245',  'HTC',      '$799.00', 'LineageOS',         'YES', '5.5"');
INSERT INTO CellPhone (ModelNumber, Manufacturer, Price, OperatingSystem, 4GCompatible, SizeInInches) VALUES ('LGV10',    'LG',       '$699.00', 'Android Jellybean', 'YES', '6.1"');
INSERT INTO CellPhone (ModelNumber, Manufacturer, Price, OperatingSystem, 4GCompatible, SizeInInches) VALUES ('HTC984',   'HTC',      '$400.00', 'CyanogenOS 12',     'YES', '5.7"');
INSERT INTO CellPhone (ModelNumber, Manufacturer, Price, OperatingSystem, 4GCompatible, SizeInInches) VALUES ('CSD9201',  'GOOGLE',   '$900.00', 'Android KitKat',    'YES', '4.9"');

/* Inserting AntiVirus entity instances into AntiVirus*/
INSERT INTO AntiVirus (SoftwareVersion, ActivationKey, ModelNumber) VALUES ('Kaspersky 11.2', 'AGDF8-NDWER-BR456-DFDS9-S9DF7', 'XPS8100');
INSERT INTO AntiVirus (SoftwareVersion, ActivationKey, ModelNumber) VALUES ('AVG 14.6', 'HOFDI-DUJF8-IER38-FUDS8-DFHG8', 'MN98830');
INSERT INTO AntiVirus (SoftwareVersion, ActivationKey, ModelNumber) VALUES ('Kaspersky 11.2', 'D2BE3-EC3D7-DA922-BB344-B2EC7', 'LN9234');
INSERT INTO AntiVirus (SoftwareVersion, ActivationKey, ModelNumber) VALUES ('ESET 9.8', '672DA-6818D-B98F7-16EAC-C33C2', 'MBA491');
INSERT INTO AntiVirus (SoftwareVersion, ActivationKey, ModelNumber) VALUES ('ESET 9.8', '9DF2B-81985-6E3D2-BA4C6-4F2F9', 'AC3910');

/* Insert Customer-Product associations into Customer Product Intersection Table*/
INSERT INTO CustomerProductIT (CustomerID, ModelNumber) VALUES (1, 'CSD9201');
INSERT INTO CustomerProductIT (CustomerID, ModelNumber) VALUES (2, 'CSD9201');
INSERT INTO CustomerProductIT (CustomerID, ModelNumber) VALUES (4, 'KSJF910');
INSERT INTO CustomerProductIT (CustomerID, ModelNumber) VALUES (5, 'CB872');
INSERT INTO CustomerProductIT (CustomerID, ModelNumber) VALUES (3, 'VI23');
INSERT INTO CustomerProductIT (CustomerID, ModelNumber) VALUES (2, 'LN9234');
INSERT INTO CustomerProductIT (CustomerID, ModelNumber) VALUES (4, 'LN9234');
INSERT INTO CustomerProductIT (CustomerID, ModelNumber) VALUES (5, 'HTC984');
INSERT INTO CustomerProductIT (CustomerID, ModelNumber) VALUES (2, 'FI30S9D');
INSERT INTO CustomerProductIT (CustomerID, ModelNumber) VALUES (1, 'PAIRU34');
INSERT INTO CustomerProductIT (CustomerID, ModelNumber) VALUES (1, 'XPS8100');
INSERT INTO CustomerProductIT (CustomerID, ModelNumber) VALUES (2, 'XPS8100');
INSERT INTO CustomerProductIT (CustomerID, ModelNumber) VALUES (4, 'HP93710');
INSERT INTO CustomerProductIT (CustomerID, ModelNumber) VALUES (4, 'HTC0245');
INSERT INTO CustomerProductIT (CustomerID, ModelNumber) VALUES (5, 'CSD9201');
INSERT INTO CustomerProductIT (CustomerID, ModelNumber) VALUES (3, 'DPOEWN4');
INSERT INTO CustomerProductIT (CustomerID, ModelNumber) VALUES (2, 'MBA491');
INSERT INTO CustomerProductIT (CustomerID, ModelNumber) VALUES (1, 'LGV10');
INSERT INTO CustomerProductIT (CustomerID, ModelNumber) VALUES (2, 'DLKA394');
INSERT INTO CustomerProductIT (CustomerID, ModelNumber) VALUES (3, 'HP93710');







DELIMITER //
CREATE PROCEDURE cursor9()
BEGIN
  DECLARE done INT DEFAULT FALSE;
  DECLARE x INT;
  DECLARE customer_cursor CURSOR FOR SELECT CustomerID FROM Customer;
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

  OPEN customer_cursor;

  read_loop: LOOP
    FETCH customer_cursor INTO x;
    IF done THEN
      LEAVE read_loop;
    END IF;

    IF x > 9  THEN
      DELETE FROM Customer WHERE CustomerID = x;
    END IF;
  END LOOP;

  CLOSE customer_cursor;
END;
//
