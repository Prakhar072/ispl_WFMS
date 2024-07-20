<h1>WorkForce Management System (WFMS)</h1>
This Project has been created by students at BITS Pilani University in collaboration with an internship at Indovision Services Pvt. Ltd.
The aim of the project is to create a comprehensive, modular web application that helps enhance corporate productivity and eases the daily operations management tasks.
<br>
<h2>Code Status</h2>
Currently, the HR modules have been completed fully, the employee code requires refining. The project is to be hosted online on AWS for a trial/experience. In the long-term, organisations using the project must setup their own live servers
<h2>Installation</h2>
The Web application can be used by simply downloading and extracting the files and running as is on LocalHost, XAMPP, a free live server can be used to import the .sql file to setup the database, Currently the website is not hosted live but AWS can be used to host. It is recommended to create an initial database entry for an HR admin manually to gain access to all modules and continue from that point naturally.
<h2>Delegation of Privilages</h2>
The project works with two major separations of privilages.
<ul>
  <li>HR</li>
  <li>Employee</li>
</ul>
The HR user acts as the superadmin with privellages to access information regarding all the users, whereas Employee users only have partial access to the neccessary modules.
<h2>HR Modules</h2>
The following modules/features are available to use for an HR user on the system:
<ul>
  <li>Corporate Metric Dashboard</li>
  <li>Employee database (CRUD Operations)</li>
  <li>System Log (Notifications)</li>
  <li>Vacancy detection</li>
  <li>Personal information</li>
  <li>Fill Request Page</li>
</ul>
<br>
The Corporate Metric dashboard provides all necessary information at a glance such as gender ratio, headcount, average salaries by department, average labour turnover etc, with fully functioning dynamic charts.
<br>
<br>
The database is the heart of any HR deligation software which gives access to adding new employees, accepting resignations and accessing each indivisiual's personal information from where one can update data regarding basic information or salary components.
<br>
<br>
The system log is a powerful tool that keeps track of all changes that occur in the system, along with their date & time and the user who took the action. This log system is key to any security feature.
<br>
<br>
The vacancy detection module finds all projects that have been reported as understaffed by their managers and requires immediate hiring or internal transfers. A graph displays all requirements department wise for an efficient glance.
<br>
<br>
The Fill Request page works with the vacancy detection and can be used to assign employees to the understaffed projects.
<h2>Employee Modules</h2>
<ul>
  <li>Quick Access Dashboard</li>
  <li>Attendance Portal</li>
  <li>Leave Portal</li>
  <li>Position Request Portal</li>
  <li>Tasks</li>
  <li>Project</li>
  <li>Personal Information</li>
</ul>
<h2>Tech Stack</h2>
The following languages were used (Vanilla) :
<ul>
  <li>HTML</li>
  <li>CSS</li>
  <li>JavaScript</li>
  <li>PHP</li>
  <li>SQL</li>
  <li>GIT</li>
  <li>REST APIs</li>
</ul>
<br>
The following Softwares were used : Figma (design), VSCode, XAMPP, PHPMYADMIN (MySQL), AWS
<h2>Libraries Used</h2>
The following were used either downloaded, or via a CDN : Jquery, chart.js, datatables.js (with respective CSS Files)
<h2>API Integration</h2>
This program utilises email.js API to send an email to the user when using the forget password feature
<h2>Credits</h2>
<ul>
  <li>Mentors</li>
  <ul>
  <li>Mr. Dinesh Sharma (Indovision)</li>
  <li>Dr. Piyush Verma (BITS Pilani)</li>
  </ul>
  <li>Contributors</li>
  <ul>
  <li>Prakhar Mittal (f20220426@pilani.bits-pilani.ac.in)</li>
  <li>Riddhi Garg (f20220763@hyderabad.bits-pilani.ac.in)</li>
  <li>Aryan Arora (f20220110@pilani.bits-pilani.ac.in)</li>
  <li>Shobhit Jha (f20221805@hyderabad.bits-pilani.ac.in)</li>
  </ul>
</ul>
