SET TIME_ZONE = '-04:00';

CREATE TABLE Location
(
    locationID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    address    varchar(255),
    city       varchar(255),
    postalCode varchar(255),
    province   varchar(255)
);

CREATE TABLE Plans
(
    planID     int                                    NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name       varchar(255)                           NOT NULL,
    price      int                                    NOT NULL,
    applyLimit int,
    postLimit  int,
    userType   enum ('admin', 'employer', 'employee') NOT NULL DEFAULT 'employee'
);

CREATE TABLE Users
(
    userNumber         int          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userID             varchar(255) NOT NULL UNIQUE,
    planID             int,
    email              varchar(255) NOT NULL UNIQUE,
    password           varchar(255) NOT NULL,
    dateCreated        timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    isActive           boolean      NOT NULL DEFAULT TRUE,
    startSufferingDate timestamp,
    balance            int          NOT NULL DEFAULT 0,
    isAutomatic        boolean      NOT NULL DEFAULT TRUE,
    FOREIGN KEY (planID) REFERENCES Plans (planID)
);

CREATE TABLE Profiles
(
    userID         varchar(255) NOT NULL PRIMARY KEY,
    locationID     int,
    companyName    varchar(255),
    firstName      varchar(255),
    lastName       varchar(255),
    profession     varchar(255),
    gender         varchar(255),
    displayPicture varchar(255),
    resume         varchar(255),
    phoneNumber    varchar(255),
    dateOfBirth    date,
    FOREIGN KEY (userID) REFERENCES Users (userID) ON DELETE CASCADE,
    FOREIGN KEY (locationID) REFERENCES Location (locationID)
);

CREATE TABLE Jobs
(
    jobID              int          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userID             varchar(255) NOT NULL,
    locationID         int          NOT NULL,
    title              varchar(255) NOT NULL,
    salary             int          NOT NULL,
    description        longtext,
    positionsAvailable int          NOT NULL,
    datePosted         timestamp    NOT NULL      DEFAULT CURRENT_TIMESTAMP,
    status             enum ('active', 'expired') DEFAULT 'active',
    FOREIGN KEY (userID) REFERENCES Users (userID) ON DELETE CASCADE,
    FOREIGN KEY (locationID) REFERENCES Location (locationID)
);

CREATE TABLE Payment_Methods
(
    paymentMethodID int                      NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userID          varchar(255)             NOT NULL,
    isPreSelected   boolean                  NOT NULL,
    paymentType     enum ('credit', 'debit') NOT NULL,
    cardNumber      bigint                   NOT NULL,
    FOREIGN KEY (userID) REFERENCES Users (userID) ON DELETE CASCADE
);

CREATE TABLE Payments
(
    paymentID       int       NOT NULL AUTO_INCREMENT PRIMARY KEY,
    paymentMethodID int       NOT NULL,
    amount          int       NOT NULL,
    paymentDate     timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (paymentMethodID) REFERENCES Payment_Methods (paymentMethodID) ON DELETE CASCADE
);

CREATE TABLE Applications
(
    jobID                int          NOT NULL,
    userID               varchar(255) NOT NULL,
    dateApplied          timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    isAcceptedByEmployer boolean               DEFAULT NULL,
    isAcceptedByEmployee boolean               DEFAULT NULL,
    FOREIGN KEY (userID) REFERENCES Users (userID) ON DELETE CASCADE,
    FOREIGN KEY (jobID) REFERENCES Jobs (jobID) ON DELETE CASCADE
);

CREATE TABLE Job_Categories_List
(
    jobCategoriesID int          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    categoryName    varchar(255) NOT NULL UNIQUE
);

CREATE TABLE Job_Categories
(
    jobID         int NOT NULL,
    jobCategoryID int NOT NULL,
    FOREIGN KEY (jobcategoryID) REFERENCES Job_Categories_List (jobCategoriesID),
    FOREIGN KEY (jobID) REFERENCES Jobs (jobID) ON DELETE CASCADE
);

CREATE TABLE Emails
(
    emailID  int          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userID   varchar(255) NOT NULL,
    content  longtext     NOT NULL,
    title    varchar(255) NOT NULL,
    dateSent timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (userID) REFERENCES Users (userID) ON DELETE CASCADE
);

CREATE TABLE Employer_Categories
(
    employerCategoryID int          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userID             varchar(255) UNIQUE NOT NULL,
    categoryName       varchar(255) NOT NULL,
    FOREIGN KEY (userID) REFERENCES Users (userID) ON DELETE CASCADE
);

CREATE TABLE System_Activity
(
    activityID   int          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    description  longtext     NOT NULL,
    title        varchar(255) NOT NULL,
    dateRecorded timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP
);
