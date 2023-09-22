

create database moonlightfestival

go

use moonlightfestival

go

-- Create the Users table
CREATE TABLE Users (
  UserID INT PRIMARY KEY IDENTITY(1,1),
  Username VARCHAR(40) UNIQUE,
  Password VARCHAR(40),
  Email VARCHAR(50) UNIQUE,
  Created_at DATETIME,
  Updated_at DATETIME,
  Role INT
);

-- Create the Contact table
CREATE TABLE Contact (
  ID INT PRIMARY KEY IDENTITY(1,1),
  Name VARCHAR(40),
  Email VARCHAR(50),
  PhoneNumber VARCHAR(20),
  Created_at DATETIME,
  Message TEXT
);

-- Create the Country table
CREATE TABLE Country (
  CountryID INT PRIMARY KEY IDENTITY(1,1),
  CountryName VARCHAR(50) UNIQUE,
  ImageID INT
);

-- Create the Gallery table
CREATE TABLE Gallery (
  ImageID INT PRIMARY KEY IDENTITY(1,1),
  ImageTitle VARCHAR(50),
  ImagePath VARCHAR(255),
  UploadDate DATETIME
);

-- Create the Festivals table
CREATE TABLE Festivals (
  FesID INT PRIMARY KEY,
  FesName VARCHAR(50),
  DateStart DATE,
  ImagePath VARCHAR(255),
  CountryID INT,
  FOREIGN KEY (CountryID) REFERENCES Country(CountryID)
);

-- Create the Festivals_Gallery table
CREATE TABLE Festivals_Gallery (
  id INT PRIMARY KEY,
  gallery_id INT,
  festival_id INT,
  FOREIGN KEY (gallery_id) REFERENCES Gallery(ImageID),
  FOREIGN KEY (festival_id) REFERENCES Festivals(FesID)
);


