## Contributions
**Arunraj Adlee**

* E/R Diagram
* Relational Database Schema
* Normalization Process Details
* SQL queries + Sample test data

**Gordon Pham-Nguyen**

* Setting up the project structure (Organization)
* SQL declarations and scripts
* Web Interface (3/4)
* Additional features

**Leo Jr Silao**

* E/R Diagram
* Relational Database Schema
* Normalization Process Details
* SQL queries + Sample test data

**Tiffany Zeng**

* Web Interface (1/4)
* SQL scripts
* Report Content

## Report
The files currently attached in this **report** are: 

* E/R Diagram
* Relational Database Schema
* Normalization Process Details
* SQL queries + 5 tuples of each query result

For the files related to our **Web Application**, please refer to the following directories in the ZIP folder: 
 
* <ins>SQL Declarations</ins>: sql-declarations/
* <ins>Relation Instances</ins>: sql-declarations/1-tables.sql 
* <ins>SQL scripts for the queries and transactions</ins>: web-application/model
<br  /> * Each of these php files represent an entity of the database; they are functions to access the database. 


## Important notes from our team
1.  We have decided to rename **Categories** to **Plans** to denote the Basic/Prime/Gold pricing as it made more sense to us and creates less confusion with Job Categories.

2.  We interpreted **Employer Category** as the field of work that a certain employer works in. e.g., construction, software development, marketing, etc.

3. We decided to treat **Job Categories** as tags (like Instagram # tags), meaning an employer can choose any category that the job posting will belong in by typing any string he/she desires when they are creating a new job posting.

4. We interpreted that **Administrators** do not have payment methods, as their function in the structure is to maintain users and oversee the system as a whole, and therefore do not have any balance associated to their accounts.

5. The following requirements:**"[Users] Should be able to maintain new users and update the user table."** is interpreted as employees can create or delete their accounts and are able to update their account information.

6. The following requirement: **"Employer dashboard should have a contact us section to help user with contact information/helpline."** is interpreted as displaying the contact information of the Employer whom have created the job posting (it is displayed as a button; onClick will display their contact info) in the Employee's Jobs' postings table.


## Additional Features
* If a user whose logged in does not have any activity (they do not click anything) within 30 minutes, they are automatically logged out.
