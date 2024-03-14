# Technical Support Web Application

This web application is designed to provide technical support services to users. It allows users to submit support tickets, view their ticket status, search the knowledgebase for articles and communicate with support agents.

## Features

- User authentication: Users can register accounts and log in securely.
- Ticket submission: Users can submit support tickets, providing details about their technical issues.
- Ticket management: Support agents can view and manage support tickets, including assigning priorities and resolving issues.
- Article search: Users can search the knowledgebase for the articles for their problems.
- Communication: Users and support agents can communicate through the ticketing system, facilitating efficient troubleshooting and issue resolution.

## Technologies Used

- HTML: Used for structuring the web pages.
- CSS: Used for styling the user interface and improving visual appeal.
- JavaScript: Used for client-side interactions and dynamic content.
- PHP: Used for server-side processing and interacting with the database.

## Download and Installation

1. Clone the repository to your local machine:
   git clone https://github.com/ovindumandith/WebProject_IS1109.git

2. Configure the database settings in `config.php` file according to your DB or use the default configuaration.

3. Import the database schema from `https://drive.google.com/drive/folders/1ZuR5MJ89fHsoiKBVcnLc9StCX15cLvPC?usp=sharing` into your MySQL database.
   (First create a database named web_test and then import the web_test.sql file in to the created database)

4. Start a PHP server or configure a web server like Apache to serve the application.

5. Access the application through your web browser.

## Accessing and Logins

1. The landing page will be available in ../php/index.php.

2. From there login as a user or admin.

3. The other login are available in the tables userdetails and admindetails in the sql file.

### admin login

- username-adminAmy
- password-123

### user login

- username-userMark
- password-123

# Usage

1. After loggin successfully ypo can perform the functionalities according to your desire.

2. Logout from the respectives user views and login back to admin view o see the functionalities of the admin.

## License

- This project is licensed under the [Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License](https://creativecommons.org/licenses/by-nc-sa/4.0/).
- This project was developed as part of the module IS-1109 at the University of Colombo School of Computing (UCSC).

You are free to:

- Share: Copy and redistribute the material in any medium or format.
- Adapt: Remix, transform, and build upon the material.

Under the following terms:

- Attribution: You must give appropriate credit, provide a link to the license, and indicate if changes were made. You may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.
- NonCommercial: You may not use the material for commercial purposes.
- ShareAlike: If you remix, transform, or build upon the material, you must distribute your contributions under the same license as the original.
