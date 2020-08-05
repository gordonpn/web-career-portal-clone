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
       ('tyson', 2, 'tyson@comp353.com', 'tyson', '2020-03-15', TRUE, -10, TRUE);

INSERT INTO Job_Categories_List(categoryName)
VALUES ('Finance'),
       ('Technology'),
       ('Busines'),
       ('IT'),
       ('Database'),
       ('System');

INSERT INTO Payment_Methods(userID, isPreSelected, cardNumber, paymentType)
VALUES ('gordon', TRUE, 1234, 'debit'),
       ('tiffany', TRUE, 1112, 'credit'),
       ('tiffany', FALSE, 8312, 'credit'),
       ('arun', TRUE, 1718, 'credit'),
       ('leo', TRUE, 2324, 'debit'),
       ('bob', TRUE, 2930, 'credit'),
       ('tyson', TRUE, 3536, 'debit'),
       ('khaled', TRUE, 94364, 'credit'),
       ('sujan', TRUE, 5392, 'debit'),
       ('jcole', TRUE, 6789, 'debit'),
       ('ariana', TRUE, 5566, 'credit'),
       ('simba', TRUE, 12341234, 'credit');

INSERT INTO Location(address, city, postalCode, province)
VALUES ('123 Maple', 'Brossard', 'J4Y 1G6', 'Quebec'),
       ('456 Oak', 'Laval', 'J8X 1J7', 'Quebec'),
       ('789 Palm', 'Toronto', 'B7S 8H6', 'Ontario'),
       ('9193 Rainbow Road', 'Burlington', '1001', 'Vermont'),
       ('52 Bowser Castle', 'Los Angeles', '2002', 'California'),
       ('3269  Brew Creek Rd', 'North Pender Island', 'V0N 2M1', 'British Columbia'),
       ('1046  Scotts Lane', 'Cobble Hill', 'V0R 1L1', 'British Columbia'),
       ('3719  Toy Avenue', 'Pickering', 'L1S 6L6', 'Ontario'),
       ('4470  rue des Églises Est', 'Ile Perrot', 'J0P 1K0', 'Quebec');

INSERT INTO Jobs(userID, locationID, title, salary, description, positionsAvailable, datePosted, status)
VALUES ('leo', 1, 'Software Developer', 85000, 'Must have 15 years of experience in PHP', 3, '2020-07-15', 'active'),
       ('bob', 2, 'Human Resources', 120000, 'Must have 20 years experience at any company', 1, '2020-08-02', 'active'),
       ('sujan', 3, 'IT Help Desk', 60000, 'Required Skills: Java, mySQL', 1, '2020-08-13', 'expired'),
       ('jcole', 4, 'Business Analyst', 85000, 'Requirements: Bachelors in Business', 5, '2020-07-15', 'expired'),
       ('jcole', 4, 'Software Developer', 90000, 'Must know C++', 3, '2020-07-15', 'active'),
       ('ariana', 5, 'Database Administrator', 60000, 'Looking for McGill students only', 1, '2020-07-06', 'active'),
       ('joe', 6, 'Python Developer', 80000, 'Must know snakes', 5, '2020-08-01', 'active'),
       ('joe', 7, 'Java Developer', 60000, 'Must like coffee', 2, '2020-08-02', 'active'),
       ('joe', 8, 'JavaScript Developer', 70000, 'Must know all frameworks', 8, '2020-08-03', 'active'),
       ('joe', 9, 'Rust Developer', 85000, 'We will ask about metals', 3, '2020-08-04', 'active');

INSERT INTO Profiles(userID, locationID, companyName, firstName, lastName, profession, gender, phoneNumber)
VALUES ('leo', 1, 'Siens', 'Leo', 'Silao', 'Senior Developer', 'Male', '514-555-8888'),
       ('bob', 2, 'Stonks', 'Bob', 'Taylor', 'Doctor', 'Male', '514-567-8910'),
       ('sujan', 3, 'Diff', 'Sujan', 'S.', 'Tech Lead', 'Male', '514-676-6767'),
       ('jcole', 4, 'BigMusic', 'Jcole', 'Rapper', 'Singer', 'Male', '514-454-5454'),
       ('ariana', 5, 'SmallMusic', 'Ariana', 'Grande', 'Singer', 'Female', '514-232-2323')
ON DUPLICATE KEY UPDATE locationID  = VALUES(locationID),
                        companyName = VALUES(companyName),
                        firstName   = VALUES(firstName),
                        lastName    = VALUES(lastName),
                        profession  = VALUES(profession),
                        gender      = VALUES(gender),
                        phoneNumber = VALUES(phoneNumber);

INSERT INTO Job_Categories(jobID, jobCategoryID)
VALUES (1, 2),
       (2, 1),
       (3, 4),
       (4, 3),
       (5, 2),
       (6, 6),
       (7, 2),
       (8, 2),
       (9, 2),
       (10, 2);

INSERT INTO Applications (jobID, userID)
VALUES (1, 'tiffany'),
       (2, 'tiffany'),
       (3, 'tiffany'),
       (4, 'tiffany'),
       (5, 'tiffany');
