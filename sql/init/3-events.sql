DELIMITER $$

CREATE EVENT automaticChargesEvent
    ON SCHEDULE EVERY 1 MONTH
        STARTS '2020-09-01 00:00:00'
    DO BEGIN
    CALL chargeAccounts();
END $$

CREATE EVENT deactivateUserEvent
    ON SCHEDULE EVERY 1 HOUR
    DO BEGIN
    DECLARE n int DEFAULT 0;
    DECLARE i int DEFAULT 1;
    SELECT count(*) FROM Users INTO n;
    SET i = 1;
    WHILE i <= n
        DO
            CALL deactivateUser(i);
            SET i = i + 1;
        END WHILE;
END $$

CREATE PROCEDURE deactivateUser(in_userNumber int)
BEGIN
    UPDATE Users
    SET isActive = IF(TIMESTAMPDIFF(DAY, startSufferingDate, CURRENT_TIMESTAMP) >= 365, 0, isActive)
    WHERE userNumber = in_userNumber;
END $$

CREATE PROCEDURE chargeAccounts()
BEGIN
    DECLARE n int DEFAULT 0;
    DECLARE i int DEFAULT 1;
    SELECT count(*) FROM Users INTO n;
    SET i = 1;
    WHILE i <= n
        DO
            CALL chargeAccount(i);
            SET i = i + 1;
        END WHILE;
END $$

CREATE PROCEDURE chargeAccount(in_userNumber int)
BEGIN
    IF (SELECT isActive FROM Users WHERE userNumber = in_userNumber) = TRUE AND
       (SELECT planID FROM Users WHERE userNumber = in_userNumber) != 6 THEN
        IF (SELECT isAutomatic FROM Users WHERE userNumber = in_userNumber) = TRUE THEN
            INSERT INTO Emails(userID, content, title)
            VALUES ((SELECT userID FROM Users WHERE userNumber = in_userNumber),
                    'The system has automatically charged your account your plan fees',
                    'Monthly Plan Charge');
            INSERT INTO Payments(paymentMethodID, amount)
            VALUES ((SELECT paymentMethodID
                     FROM Payment_Methods
                     WHERE isPreSelected = TRUE
                       AND (SELECT Users.userID FROM Users WHERE userNumber = in_userNumber) = userID),
                    (SELECT price
                     FROM Plans,
                          Users
                     WHERE Plans.planID = Users.planID
                       AND userNumber = in_userNumber));
        ELSEIF (SELECT isAutomatic FROM Users WHERE userNumber = in_userNumber) = FALSE THEN
            INSERT INTO Emails(userID, content, title)
            VALUES ((SELECT userID FROM Users WHERE userNumber = in_userNumber),
                    'The system has automatically debited from your balance your plan fees',
                    'Monthly Plan Charge');
            UPDATE Users
            SET balance = balance - (SELECT price
                                     FROM Plans
                                     WHERE Plans.planID = Users.planID
                                       AND userNumber = in_userNumber)
            WHERE userNumber = in_userNumber;
        END IF;
    END IF;
END $$

DELIMITER ;
