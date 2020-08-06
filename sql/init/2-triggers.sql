DELIMITER $$

DROP TRIGGER IF EXISTS paymentMadeEmail $$
CREATE TRIGGER paymentMadeEmail
    AFTER INSERT
    ON Payments
    FOR EACH ROW
BEGIN
    INSERT INTO Emails(userID, content, title)
    VALUES ((SELECT userID
             FROM Payment_Methods
             WHERE NEW.paymentMethodID = Payment_Methods.paymentMethodID),
            concat('Payment made of $', NEW.amount, ' by ', userID, '. Current balance is ', (SELECT balance
                                                                                              FROM Users,
                                                                                                   Payment_Methods
                                                                                              WHERE NEW.paymentMethodID = Payment_Methods.paymentMethodID
                                                                                                AND Payment_Methods.userID = Users.userID),
                   '$.'),
            'Payment Made');
END $$

DROP TRIGGER IF EXISTS paymentMade $$
CREATE TRIGGER paymentMade
    AFTER INSERT
    ON Payments
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat((SELECT userID
                    FROM Payment_Methods
                    WHERE NEW.paymentMethodID = Payment_Methods.paymentMethodID), ' made payment of ',
                   NEW.amount), 'Payment Made');
END $$

DROP TRIGGER IF EXISTS userUpdate $$
CREATE TRIGGER userUpdate
    BEFORE UPDATE
    ON Users
    FOR EACH ROW
BEGIN
    IF NOT NEW.planID <=> OLD.planID THEN
        INSERT INTO System_Activity(description, title)
        VALUES (concat(OLD.userID, ' has changed their plan.'), 'Plan ID Changed');
    END IF;
    IF NOT NEW.email <=> OLD.email THEN
        INSERT INTO System_Activity(description, title)
        VALUES (concat(OLD.userID, ' has changed their email.'), 'Email Changed');
    END IF;
    IF NOT NEW.password <=> OLD.password THEN
        INSERT INTO System_Activity(description, title)
        VALUES (concat(OLD.userID, ' has changed their password.'), 'Password Changed');
    END IF;
    IF NOT NEW.isActive <=> OLD.isActive THEN
        INSERT INTO System_Activity(description, title)
        VALUES (concat(OLD.userID, ' has changed their activity status.'), 'User Account Status Changed');
    END IF;
    IF NEW.isActive = 1 AND OLD.isActive = 0 THEN
        IF NEW.balance < 0 THEN
            SET NEW.startSufferingDate = CURRENT_TIMESTAMP;
        ELSE
            SET NEW.startSufferingDate = NULL;
        END IF;
    END IF;
    IF NOT NEW.balance <=> OLD.balance THEN
        INSERT INTO System_Activity(description, title)
        VALUES (concat(OLD.userID, ' has changed their balance.'), 'Balance Changed');
    END IF;
    IF NEW.balance < 0 AND OLD.balance >= 0 THEN
        SET NEW.startSufferingDate = CURRENT_TIMESTAMP;
        INSERT INTO Emails(userID, content, title)
        VALUES (OLD.userID, concat('Your account is now suffering starting ', CURRENT_TIMESTAMP), 'Balance Negative');
    END IF;
    IF NEW.balance >= 0 AND OLD.balance < 0 THEN
        SET NEW.startSufferingDate = NULL;
    END IF;
    IF NOT NEW.isAutomatic <=> OLD.isAutomatic THEN
        INSERT INTO System_Activity(description, title)
        VALUES (concat(OLD.userID, ' has changed their withdrawal type.'), 'Withdrawal Type Changed');
    END IF;
END $$

DROP TRIGGER IF EXISTS userCreate $$
CREATE TRIGGER userCreate
    BEFORE INSERT
    ON Users
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(NEW.userID, ' has been created.'), 'User Created');
    IF NEW.balance < 0 THEN
        SET NEW.startSufferingDate = NEW.dateCreated;
    END IF;
END $$

DROP TRIGGER IF EXISTS createEmptyProfile $$
CREATE TRIGGER createEmptyProfile
    AFTER INSERT
    ON Users
    FOR EACH ROW
BEGIN
    INSERT INTO Profiles(userID) VALUES (NEW.userID);
END $$

DROP TRIGGER IF EXISTS createEmptyEmployerCategory $$
CREATE TRIGGER createEmptyEmployerCategory
    AFTER INSERT
    ON Users
    FOR EACH ROW
BEGIN
    IF (SELECT userType
        FROM Plans
                 JOIN Users U ON Plans.planID = U.planID
        WHERE U.userID = NEW.userID) = 'employer' THEN
        INSERT INTO Employer_Categories(userID, categoryName) VALUES (NEW.userID, '');
    END IF;
END $$

DROP TRIGGER IF EXISTS userDelete $$
CREATE TRIGGER userDelete
    AFTER DELETE
    ON Users
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(OLD.userID, ' has been deleted.'), 'User Deleted');
END $$

DROP TRIGGER IF EXISTS jobCreate $$
CREATE TRIGGER jobCreate
    BEFORE INSERT
    ON Jobs
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(NEW.jobID, ' has been created.'), 'Job Created');
    IF (SELECT planID FROM Users WHERE Users.userID = NEW.userID) = 4 AND
       (SELECT count(*) FROM Jobs WHERE userID = NEW.userID) > 4 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Employer Prime plan cannot post to more than 5 jobs';
    ELSEIF (SELECT userType
            FROM Plans
                     JOIN Users U ON Plans.planID = U.planID
            WHERE U.userID = NEW.userID) = 'employee' THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Employees do not make job postings';
    END IF;
END $$

DROP TRIGGER IF EXISTS jobDelete $$
CREATE TRIGGER jobDelete
    AFTER DELETE
    ON Jobs
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(OLD.jobID, ' has been deleted.'), 'Job Deleted');
END $$

DROP TRIGGER IF EXISTS paymentMethodCreate $$
CREATE TRIGGER paymentMethodCreate
    AFTER INSERT
    ON Payment_Methods
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(NEW.userID, ' created a new payment method.'), 'Payment Method Created');
END $$

DROP TRIGGER IF EXISTS paymentMethodDelete $$
CREATE TRIGGER paymentMethodDelete
    AFTER DELETE
    ON Payment_Methods
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(OLD.userID, ' created a new payment method.'), 'Payment Method Deleted');
END $$

DROP TRIGGER IF EXISTS paymentMethodUpdate $$
CREATE TRIGGER paymentMethodUpdate
    AFTER UPDATE
    ON Payment_Methods
    FOR EACH ROW
BEGIN
    IF NOT (NEW.isPreSelected <=> OLD.isPreSelected AND NEW.paymentType <=> OLD.paymentType AND
            NEW.cardNumber <=> OLD.cardNumber) THEN
        INSERT INTO System_Activity(description, title)
        VALUES (concat(OLD.userID, ' updated a payment method.'), 'Payment Method Updated');
    END IF;
END $$

DROP TRIGGER IF EXISTS applicationCreate $$
CREATE TRIGGER applicationCreate
    BEFORE INSERT
    ON Applications
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(NEW.userID, ' created an application to job ', NEW.jobID), 'Application Created');
    IF (SELECT planID FROM Users WHERE Users.userID = NEW.userID) = 1 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Employee Basic plan cannot apply';
    ELSEIF (SELECT planID FROM Users WHERE Users.userID = NEW.userID) = 2 AND
           (SELECT count(*) FROM Applications WHERE userID = NEW.userID) > 4 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Employee Prime plan cannot apply to more than 5 jobs';
    ELSEIF (SELECT userType
            FROM Plans
                     JOIN Users U ON Plans.planID = U.planID
            WHERE U.userID = NEW.userID) = 'employer' THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Employers do not apply to jobs';
    END IF;
END $$

DROP TRIGGER IF EXISTS applicationDelete $$
CREATE TRIGGER applicationDelete
    AFTER DELETE
    ON Applications
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(OLD.userID, ' deleted an application to job ', OLD.jobID), 'Application Deleted');
END $$

DROP TRIGGER IF EXISTS jobCategoryCreate $$
CREATE TRIGGER jobCategoryCreate
    AFTER INSERT
    ON Job_Categories_List
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(NEW.categoryName, ' has been created.'), 'Job Category Created');
END $$

DROP TRIGGER IF EXISTS jobCategoryDelete $$
CREATE TRIGGER jobCategoryDelete
    AFTER DELETE
    ON Job_Categories_List
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(OLD.categoryName, ' has been deleted.'), 'Job Category Deleted');
END $$

DROP TRIGGER IF EXISTS employerCategoryCreate $$
CREATE TRIGGER employerCategoryCreate
    AFTER INSERT
    ON Employer_Categories
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(NEW.categoryName, ' has been created.'), 'Employer Category Created');
END $$

DROP TRIGGER IF EXISTS employerCategoryDelete $$
CREATE TRIGGER employerCategoryDelete
    AFTER DELETE
    ON Employer_Categories
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(OLD.categoryName, ' has been deleted.'), 'Employer Category Deleted');
END $$

DELIMITER ;
