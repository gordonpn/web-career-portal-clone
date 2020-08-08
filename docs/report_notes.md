# COMP 353: Databases - Summer 2020 <br  /> Main Project
<br  />
## ** Important notes from our team

1.  We have decided to rename **Categories** to **Plans** to denote the Basic/Prime/Gold pricing as it made more sense to us and creates less confusion with Job Categories.

2.  We interpreted **Employer Category** as the field of work that a certain employer works in. e.g., construction, software development, marketing, etc.

3. We decided to treat **Job Categories** as tags (like Instagram # tags), meaning an employer can choose any category that the job posting will belong in by typing any string he/she desires when they are creating a new job posting.

4. We have decided to make **City** dependent on postalCode.

5. We interpreted that **Administrators** do not have payment methods, as their function in the structure is to maintain users and oversee the system as a whole, and therefore do not have any balance associated to their accounts.

6. We have concluded that **Employers** can create a new job posting, but cannot delete nor edit.

7. The following requirements:**"[Users] Should be able to maintain new users and update the user table."** is interpreted as employees can create or delete their accounts and are able to update their account information.

8. The following requirement: **"Employer dashboard should have a contact us section to help user with contact information/helpline."** is interpreted as displaying the contact information of the Employer whom have created the job posting (it is displayed as a button; onClick will display their contact info) in the Employee's Jobs' postings table.

9. Attached in this report is the E/R Diagram, Relational Database Schema and its Normalization, and the SQL declarations of the relations. See the Implementation Code, Relation Instances, SQL scripts for the queries and transactions and the Sample Data in the attached ZIP file.
 
