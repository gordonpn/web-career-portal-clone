SET GLOBAL event_scheduler = ON;

DELIMITER $$

DROP EVENT IF EXISTS automaticChargesEvent $$
CREATE EVENT automaticChargesEvent
    ON SCHEDULE EVERY '1' MONTH
        STARTS '2020-09-01 00:00:00'
    DO BEGIN
END $$

DROP EVENT IF EXISTS deactivateUserEvent $$
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

DROP PROCEDURE IF EXISTS deactivateUser $$
CREATE PROCEDURE deactivateUser(in_userNumber int)
BEGIN
    UPDATE Users
    SET isActive = IF(TIMESTAMPDIFF(DAY, startSufferingDate, CURRENT_TIMESTAMP) >= 365, 0, isActive)
    WHERE userNumber = in_userNumber;

END $$

DELIMITER ;
