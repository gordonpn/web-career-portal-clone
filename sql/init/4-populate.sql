INSERT INTO Plans(name, price, applyLimit, postLimit, userType)
VALUES ('Employee Basic', 0, 0, 0, 'employee'),
       ('Employee Prime', 10, 5, 0, 'employee'),
       ('Employee Gold', 20, NULL, 0, 'employee'),
       ('Employer Prime', 50, 0, 5, 'employer'),
       ('Employer Gold', 100, 0, NULL, 'employer'),
       ('Admin', 0, 0, 0, 'admin');

INSERT INTO Users (userID, planID, email, password, dateCreated, isActive, balance, isAutomatic)
VALUES ('gordon', 1, 'gordon@comp353.com', 'gordon', '2020-01-15', TRUE, 0, TRUE),
       ('tiffany', 2, 'tiffany@comp353.com', 'tiffany', '2020-02-15', TRUE, 10, FALSE),
       ('simba', 2, 'simba@comp353.com', 'simba', '2019-12-15', TRUE, 0, TRUE),
       ('arun', 3, 'arun@comp353.com', 'arun', '2020-03-15', TRUE, 10, FALSE),
       ('leo', 4, 'leo@comp353.com', 'leo', '2020-04-15', FALSE, 0, TRUE),
       ('bob', 5, 'bob@comp353.com', 'bob', '2020-05-15', TRUE, -100, FALSE),
       ('alice', 6, 'alice@comp353.com', 'alice', '2020-06-15', TRUE, 0, TRUE),
       ('khaled', 1, 'khaled@comp353.com', 'khaled', '2019-06-15', TRUE, -50, TRUE),
       ('sujan', 4, 'sujan@comp353.com', 'sujan', '2019-06-15', FALSE, 50, TRUE),
       ('jcole', 5, 'jcole@comp353.com', 'jcole', '2019-06-15', FALSE, 50, TRUE),
       ('ariana', 4, 'ariana@comp353.com', 'ariana', '2019-06-15', FALSE, 10, TRUE),
       ('joe', 4, 'joe@comp353.com', 'joe', '2020-01-14', TRUE, 0, TRUE),
       ('tyson', 2, 'tyson@comp353.com', 'tyson', '2020-03-15', TRUE, -10, TRUE),
       ('chris', 5, 'chris@comp353.com', 'chris', '2020-08-07 01:43:56', TRUE, 0, TRUE);

INSERT INTO Job_Categories_List (jobCategoriesID, categoryName)
VALUES (8, 'Angular'),
       (3, 'Business'),
       (5, 'Database'),
       (1, 'Finance'),
       (4, 'Information Technology'),
       (7, 'React'),
       (6, 'System Engineering'),
       (2, 'Technology');

INSERT INTO Payment_Methods (paymentMethodID, userID, isPreSelected, paymentType, cardNumber)
VALUES (1, 'gordon', 1, 'debit', 1234),
       (2, 'tiffany', 1, 'credit', 1112),
       (3, 'tiffany', 0, 'credit', 8312),
       (4, 'arun', 1, 'credit', 1718),
       (5, 'leo', 1, 'debit', 2324),
       (6, 'bob', 1, 'credit', 2930),
       (7, 'tyson', 1, 'debit', 3536),
       (8, 'khaled', 1, 'credit', 94364),
       (9, 'sujan', 1, 'debit', 5392),
       (10, 'jcole', 1, 'debit', 6789),
       (11, 'ariana', 1, 'credit', 5566),
       (12, 'simba', 1, 'credit', 12341234),
       (13, 'gordon', 0, 'credit', 1111111111),
       (14, 'tyson', 0, 'credit', 123515),
       (15, 'leo', 0, 'credit', 12341234),
       (16, 'leo', 0, 'credit', 555555),
       (17, 'tiffany', 0, 'credit', 123412341234),
       (18, 'leo', 0, 'credit', 12341234);

INSERT INTO Location (locationID, address, city, postalCode, province)
VALUES (1, '123 Maple', 'Brossard', 'J4Y 1G6', 'Quebec'),
       (2, '456 Oak', 'Laval', 'J8X 1J7', 'Quebec'),
       (3, '789 Palm', 'Toronto', 'B7S 8H6', 'Ontario'),
       (4, '9193 Rainbow Road', 'Burlington', '1001', 'Vermont'),
       (5, '52 Bowser Castle', 'Los Angeles', '2002', 'California'),
       (6, '3269  Brew Creek Rd', 'North Pender Island', 'V0N 2M1', 'British Columbia'),
       (7, '1046  Scotts Lane', 'Cobble Hill', 'V0R 1L1', 'British Columbia'),
       (8, '3719  Toy Avenue', 'Pickering', 'L1S 6L6', 'Ontario'),
       (9, '4470  rue des Églises Est', 'Ile Perrot', 'J0P 1K0', 'Quebec'),
       (10, 'Downtown', 'Montreal', 'H1L 5H3', 'Quebec'),
       (11, 'Downtown', 'Montreal', 'H1L 5H3', 'Qc'),
       (12, 'Downtown', 'Montreal', 'H1L 5H3', 'Qc');

INSERT INTO Jobs (jobID, userID, locationID, title, salary, description, positionsAvailable, datePosted, status)
VALUES (1, 'leo', 1, 'Software Developer', 85000, 'Must have 15 years of experience in PHP', 3, '2020-07-15 04:00:00', 'active'),
       (2, 'bob', 2, 'Human Resources', 120000, 'Must have 20 years experience at any company', 1, '2020-08-02 04:00:00', 'active'),
       (3, 'sujan', 3, 'IT Help Desk', 60000, 'Required Skills: Java, mySQL', 1, '2020-08-13 04:00:00', 'expired'),
       (4, 'jcole', 4, 'Business Analyst', 85000, 'Requirements: Bachelors in Business', 5, '2020-07-15 04:00:00', 'expired'),
       (5, 'jcole', 4, 'Software Developer', 90000, 'Must know C++', 3, '2020-07-15 04:00:00', 'active'),
       (6, 'ariana', 5, 'Database Administrator', 60000, 'Looking for McGill students only', 1, '2020-07-06 04:00:00', 'active'),
       (7, 'joe', 6, 'Python Developer', 80000, 'Must know snakes', 5, '2020-08-01 04:00:00', 'active'),
       (8, 'joe', 7, 'Java Developer', 60000, 'Must like coffee', 2, '2020-08-02 04:00:00', 'active'),
       (9, 'joe', 8, 'JavaScript Developer', 70000, 'Must know all frameworks', 8, '2020-08-03 04:00:00', 'active'),
       (10, 'joe', 9, 'Rust Developer', 85000, 'We will ask about metals', 3, '2020-08-04 04:00:00', 'active'),
       (12, 'joe', 11, 'Software Developer', 100000, 'Work on Angular apps', 4, '2020-08-07 01:40:38', 'active');

INSERT INTO Profiles(userID, locationID, companyName, firstName, lastName, profession, gender, phoneNumber)
VALUES ('leo', 1, 'Siens', 'Leo', 'Silao', 'Senior Developer', 'Male', '514-555-8888'),
       ('bob', 2, 'Stonks', 'Bob', 'Taylor', 'Doctor', 'Male', '514-567-8910'),
       ('sujan', 3, 'Diff', 'Sujan', 'S.', 'Tech Lead', 'Male', '514-676-6767'),
       ('jcole', 4, 'BigMusic', 'Jcole', 'Rapper', 'Singer', 'Male', '514-454-5454'),
       ('joe', 9, 'Logic Industries', 'Logic', 'Joe', 'Musician', 'Male', '514-937-8367'),
       ('ariana', 5, 'SmallMusic', 'Ariana', 'Grande', 'Singer', 'Female', '514-232-2323')
ON DUPLICATE KEY UPDATE locationID  = VALUES(locationID),
                        companyName = VALUES(companyName),
                        firstName   = VALUES(firstName),
                        lastName    = VALUES(lastName),
                        profession  = VALUES(profession),
                        gender      = VALUES(gender),
                        phoneNumber = VALUES(phoneNumber);

INSERT INTO Job_Categories (jobID, jobCategoryID)
VALUES (1, 2),
       (2, 1),
       (3, 4),
       (4, 3),
       (5, 2),
       (6, 6),
       (7, 2),
       (8, 2),
       (9, 2),
       (10, 2),
       (12, 8);

INSERT INTO Applications (jobID, userID, dateApplied, isAcceptedByEmployer, isAcceptedByEmployee)
VALUES (1, 'tiffany', '2020-08-06 19:54:37', 1, NULL),
       (2, 'tiffany', '2020-08-06 19:54:37', NULL, NULL),
       (3, 'tiffany', '2020-08-06 19:54:37', NULL, NULL),
       (4, 'tiffany', '2020-08-06 19:54:37', NULL, NULL),
       (5, 'tiffany', '2020-08-06 19:54:37', NULL, NULL),
       (2, 'simba', '2020-08-07 01:36:06', NULL, NULL),
       (2, 'arun', '2020-08-07 01:36:14', NULL, NULL),
       (2, 'tyson', '2020-08-07 01:40:03', 1, 1);

INSERT INTO Employer_Categories (employerCategoryID, userID, categoryName)
VALUES (1, 'leo', 'STEM'),
       (2, 'bob', 'Stocks'),
       (3, 'sujan', 'Design'),
       (4, 'jcole', 'Music'),
       (5, 'ariana', 'Music'),
       (6, 'joe', 'Software'),
       (13, 'chris', '')
ON DUPLICATE KEY UPDATE categoryName = VALUES(categoryName);
