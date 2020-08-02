SET TIME_ZONE = '-04:00';


CREATE TABLE IF NOT EXISTS Location
(
    locationID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    address    varchar(255),
    city       varchar(255),
    postalCode varchar(255),
    province   varchar(255)
);


CREATE TABLE IF NOT EXISTS Plans
(
    planID     int                                    NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name       varchar(255)                           NOT NULL,
    price      int                                    NOT NULL,
    applyLimit int,
    postLimit  int,
    userType   enum ('admin', 'employer', 'employee') NOT NULL DEFAULT 'employee'
);


CREATE TABLE IF NOT EXISTS Users
(
    userID             varchar(255) NOT NULL PRIMARY KEY,
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


CREATE TABLE IF NOT EXISTS Profiles
(
    userID         varchar(255) NOT NULL,
    locationID     int          NOT NULL,
    firstName      varchar(255),
    lastName       varchar(255),
    profession     varchar(255),
    gender         varchar(255),
    displayPicture varchar(255),
    resume         varchar(255),
    phoneNumber    varchar(255),
    dateOfBirth    date,
    FOREIGN KEY (userID) REFERENCES Users (userID),
    FOREIGN KEY (locationID) REFERENCES Location (locationID)
);


CREATE TABLE IF NOT EXISTS Jobs
(
    jobID              int          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userID             varchar(255) NOT NULL,
    locationID         int          NOT NULL,
    title              varchar(255) NOT NULL,
    salary             int          NOT NULL,
    description        longtext,
    companyName        varchar(255) NOT NULL,
    positionsAvailable int          NOT NULL,
    datePosted         timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status             varchar(255) NOT NULL,
    FOREIGN KEY (userID) REFERENCES Users (userID),
    FOREIGN KEY (locationID) REFERENCES Location (locationID)
);


CREATE TABLE IF NOT EXISTS Payment_Methods
(
    paymentMethodID int          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userID          varchar(255) NOT NULL,
    isPreSelected   boolean      NOT NULL,
    cardNumber      bigint       NOT NULL,
    paymentType     enum ('credit card', 'checking'),
    FOREIGN KEY (userID) REFERENCES Users (userID)
);


CREATE TABLE IF NOT EXISTS Payments
(
    paymentID       int       NOT NULL AUTO_INCREMENT PRIMARY KEY,
    paymentMethodID int       NOT NULL,
    amount          int       NOT NULL,
    paymentDate     timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (paymentMethodID) REFERENCES Payment_Methods (paymentMethodID)
);


CREATE TABLE IF NOT EXISTS Applications
(
    jobID                int          NOT NULL,
    userID               varchar(255) NOT NULL,
    dateApplied          timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    isAcceptedByEmployer boolean               DEFAULT NULL,
    isAcceptedByEmployee boolean               DEFAULT NULL,
    FOREIGN KEY (userID) REFERENCES Users (userID),
    FOREIGN KEY (jobID) REFERENCES Jobs (jobID)
);


CREATE TABLE IF NOT EXISTS Job_Categories_List
(
    jobCategoriesID int          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    categoryName    varchar(255) NOT NULL
);


CREATE TABLE IF NOT EXISTS Job_Categories
(
    jobID         int NOT NULL,
    jobCategoryID int NOT NULL,
    FOREIGN KEY (jobcategoryID) REFERENCES Job_Categories_List (jobCategoriesID),
    FOREIGN KEY (jobID) REFERENCES Jobs (jobID)
);


CREATE TABLE IF NOT EXISTS Emails
(
    emailID  int          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userID   varchar(255) NOT NULL,
    content  longtext     NOT NULL,
    title    varchar(255) NOT NULL,
    dateSent timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (userID) REFERENCES Users (userID)
);


CREATE TABLE IF NOT EXISTS Employer_Categories
(
    employerCategoryID int          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userID             varchar(255) NOT NULL,
    categoryName       varchar(255) NOT NULL,
    FOREIGN KEY (userID) REFERENCES Users (userID)
);
