# Technical Support Web Application

Welcome to the Technical Support Web Application! This web application provides a platform for users to submit support tickets, access knowledge base articles, and communicate with support agents for efficient troubleshooting and issue resolution.

## Features

- **User Authentication**: Secure user registration and login functionality.
- **Ticket Submission**: Users can submit support tickets, providing detailed descriptions of their technical issues.
- **Ticket Management**: Support agents can manage tickets, assign priorities, and track ticket status for effective resolution.
- **Knowledge Base**: Users can search and browse through a collection of knowledge base articles to find solutions to common problems.
- **Communication**: Seamless communication between users and support agents through the ticketing system.

## Technologies Used

- HTML: For creating the structure of web pages.
- CSS: For styling the user interface and enhancing visual appeal.
- JavaScript: For client-side interactions and dynamic content.
- PHP: For server-side processing and interaction with the database.

## Installation

1. **Clone the Repository**:
   git clone https://github.com/ovindumandith/WebProject_IS1109.git

2. **Database Configuration**:

- Configure the database settings in `config.php` file according to your database setup.

3. **Database Setup**:

- Import the database schema from the provided SQL file (`web_test.sql`) into your MySQL database.
- Create a database named `web_test` and import the `web_test.sql` file into the created database.

4. **Start the Application**:

- Start a PHP server or configure a web server like Apache to serve the application.
- Access the application through your web browser.

## Accessing and Logins

1. **Landing Page**: The landing page of the application is available at `../php/index.php`.

2. **User and Admin Login**:

- Navigate to the landing page.
- Choose to login either as a user or admin.
- Use the following credentials to login:
  - **User Login**:
    - Username: userMark
    - Password: 123
  - **Admin Login**:
    - Username: adminAmy
    - Password: 123

3. **Alternative Logins**: Additional login details can be found in the database tables `userdetails` and `admindetails` included in the provided SQL file.

## Usage

1. After logging in, users can submit support tickets, browse knowledge base articles, and communicate with support agents.
2. Admins can manage support tickets, view user feedback, and perform administrative tasks.
3. Logout from the respective user views to switch between user and admin functionalities.

## License

- This project is licensed under the [Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License](https://creativecommons.org/licenses/by-nc-sa/4.0/).
- Developed as part of the module IS-1109 at the University of Colombo School of Computing (UCSC).

You are free to:

- Share: Copy and redistribute the material in any medium or format.
- Adapt: Remix, transform, and build upon the material.

Under the following terms:

- Attribution: You must give appropriate credit, provide a link to the license, and indicate if changes were made.
- NonCommercial: You may not use the material for commercial purposes.
- ShareAlike: If you remix, transform, or build upon the material, you must distribute your contributions under the same license as the original.
