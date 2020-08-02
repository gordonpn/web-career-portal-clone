DELIMITER $$

CREATE TRIGGER paymentMadeEmail
    AFTER INSERT
    ON Payments
    FOR EACH ROW
BEGIN
    INSERT INTO Emails(userID, content, title)
    VALUES ((SELECT userID
             FROM Payment_Methods
             WHERE NEW.paymentMethodID = Payment_Methods.paymentMethodID),
            concat('Payment made of ', NEW.amount, ' by ', userID, '. Current balance is ', (SELECT balance
                                                                                             FROM Users,
                                                                                                  Payment_Methods
                                                                                             WHERE NEW.paymentMethodID = Payment_Methods.paymentMethodID
                                                                                               AND Payment_Methods.userID = Users.userID),
                   '$.'),
            'Payment Made');
END $$

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

CREATE TRIGGER userUpdate
    AFTER UPDATE
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
    IF NOT NEW.balance <=> OLD.balance THEN
        INSERT INTO System_Activity(description, title)
        VALUES (concat(OLD.userID, ' has changed their balance.'), 'Balance Changed');
    END IF;
    IF NOT NEW.isAutomatic <=> OLD.isAutomatic THEN
        INSERT INTO System_Activity(description, title)
        VALUES (concat(OLD.userID, ' has changed their withdrawal type.'), 'Withdrawal Type Changed');
    END IF;
END $$

CREATE TRIGGER userCreate
    AFTER INSERT
    ON Users
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(NEW.userID, ' has been created.'), 'User Created');
END $$

CREATE TRIGGER userDelete
    AFTER DELETE
    ON Users
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(OLD.userID, ' has been deleted.'), 'User Deleted');
END $$

CREATE TRIGGER jobCreate
    AFTER INSERT
    ON Jobs
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(NEW.jobID, ' has been created.'), 'Job Created');
END $$

CREATE TRIGGER jobDelete
    AFTER DELETE
    ON Jobs
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(OLD.jobID, ' has been deleted.'), 'Job Deleted');
END $$

CREATE TRIGGER paymentMethodCreate
    AFTER INSERT
    ON Payment_Methods
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(NEW.userID, ' created a new payment method.'), 'Payment Method Created');
END $$

CREATE TRIGGER paymentMethodDelete
    AFTER DELETE
    ON Payment_Methods
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(OLD.userID, ' created a new payment method.'), 'Payment Method Deleted');
END $$

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

CREATE TRIGGER applicationCreate
    AFTER INSERT
    ON Applications
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(NEW.userID, ' created an application to job ', NEW.jobID), 'Application Created');
END $$

CREATE TRIGGER applicationDelete
    AFTER DELETE
    ON Applications
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(OLD.userID, ' deleted an application to job ', OLD.jobID), 'Application Deleted');
END $$

CREATE TRIGGER jobCategoryCreate
    AFTER INSERT
    ON Job_Categories_List
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(NEW.categoryName, ' has been created.'), 'Job Category Created');
END $$

CREATE TRIGGER jobCategoryDelete
    AFTER DELETE
    ON Job_Categories_List
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(OLD.categoryName, ' has been deleted.'), 'Job Category Deleted');
END $$

CREATE TRIGGER employerCategoryCreate
    AFTER INSERT
    ON Employer_Categories
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(NEW.categoryName, ' has been created.'), 'Employer Category Created');
END $$

CREATE TRIGGER EmployerCategoryDelete
    AFTER DELETE
    ON Employer_Categories
    FOR EACH ROW
BEGIN
    INSERT INTO System_Activity(description, title)
    VALUES (concat(OLD.categoryName, ' has been deleted.'), 'Employer Category Deleted');
END $$

DELIMITER ;
