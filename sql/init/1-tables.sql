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
    FOREIGN KEY (userID) REFERENCES Users (userID) ON DELETE CASCADE,
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
    datePosted         timestamp    NOT NULL      DEFAULT CURRENT_TIMESTAMP,
    status             enum ('active', 'expired') DEFAULT 'active',
    FOREIGN KEY (userID) REFERENCES Users (userID) ON DELETE CASCADE,
    FOREIGN KEY (locationID) REFERENCES Location (locationID)
);


CREATE TABLE IF NOT EXISTS Payment_Methods
(
    paymentMethodID int          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userID          varchar(255) NOT NULL,
    isPreSelected   boolean      NOT NULL,
    cardNumber      bigint       NOT NULL,
    paymentType     enum ('credit', 'debit'),
    FOREIGN KEY (userID) REFERENCES Users (userID) ON DELETE CASCADE
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
    FOREIGN KEY (userID) REFERENCES Users (userID) ON DELETE CASCADE,
    FOREIGN KEY (jobID) REFERENCES Jobs (jobID) ON DELETE CASCADE
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
    FOREIGN KEY (jobID) REFERENCES Jobs (jobID) ON DELETE CASCADE
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
    FOREIGN KEY (userID) REFERENCES Users (userID) ON DELETE CASCADE
);

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 9a0c31c... feat: define all necessary triggers for now
CREATE TABLE IF NOT EXISTS System_Activity
(
    activityID   int          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    description  longtext     NOT NULL,
    title        varchar(255) NOT NULL,
    dateRecorded timestamp    NOT NULL DEFAULT current_timestamp
);
<<<<<<< HEAD
=======
DELIMITER $$

CREATE TRIGGER paymentMade
    AFTER INSERT
    ON Payments
    FOR EACH ROW
BEGIN
    INSERT INTO Emails(userID, content, title)
    VALUES ((SELECT userID
             FROM Payment_Methods
             WHERE NEW.paymentMethodID = Payment_Methods.paymentMethodID),
            CONCAT('Payment made of ', NEW.amount, ' by ', userID, '. Current balance is ', (SELECT balance
                                                                                             FROM Users,
                                                                                                  Payment_Methods
                                                                                             WHERE NEW.paymentMethodID = Payment_Methods.paymentMethodID
                                                                                               AND Payment_Methods.userID = Users.userID),
                   '$.'),
            'Payment made');
END $$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER userUpdate
    AFTER UPDATE
    ON Users
    FOR EACH ROW
BEGIN
    IF NEW.planID IS NOT NULL THEN
        INSERT INTO Emails(userID, content, title)
        VALUES (OLD.userID, concat(OLD.userID, ' has changed their plan.'), 'Plan ID Changed');
    END IF;
    IF NEW.email IS NOT NULL THEN
        INSERT INTO Emails(userID, content, title)
        VALUES (OLD.userID, concat(OLD.userID, ' has changed their email.'), 'Email Changed');
    END IF;
    IF NEW.password IS NOT NULL THEN
        INSERT INTO Emails(userID, content, title)
        VALUES (OLD.userID, concat(OLD.userID, ' has changed their password.'), 'Password Changed');
    END IF;
    IF NEW.isActive IS NOT NULL THEN
        INSERT INTO Emails(userID, content, title)
        VALUES (OLD.userID, concat(OLD.userID, ' has changed their activity status.'), 'User Account Status Changed');
    END IF;
    IF NEW.balance IS NOT NULL THEN
        INSERT INTO Emails(userID, content, title)
        VALUES (OLD.userID, concat(OLD.userID, ' has changed their balance.'), 'Balance Changed');
    END IF;
    IF NEW.isAutomatic IS NOT NULL THEN
        INSERT INTO Emails(userID, content, title)
        VALUES (OLD.userID, concat(OLD.userID, ' has changed their withdrawal type.'), 'Withdrawal Type Changed');
    END IF;
END $$

DELIMITER ;
>>>>>>> 7d78019... feat: add trigger to track payments and user account changes
=======
>>>>>>> 9a0c31c... feat: define all necessary triggers for now
