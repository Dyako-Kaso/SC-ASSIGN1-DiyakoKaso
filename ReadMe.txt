
////Hla Abdul Hakeem/////


/////**Application definition**/////
PCR barcode is an application that is used to help laboratories to save the results of PCR tests inside a barcode and send it to the patients.
laboratories can easily add, delete and update all the information required and search among it.
////////////////////////////////////

/////**DATABASE**/////
1. CREATE a new DATABASE and name it "webpcr" in phpmy admin
2. import webpcr.sql file
//////////////////////

/////**FILES ROOT**/////
1. the main file that includes all the source code should be named "wpnew"
2. save it inside htdocs so the root should be "xampp\htdocs\wpnew"
3. open http://localhost/wpnew inside your browser
4. please don't give other name and don't put it inside other file and if "wpnew" file is inside "source code" file then just copy "wpnew" file not "source code" file.
////////////////////////

/////**files**/////
1. blood: it includes output files which includes all the patients files as a pdf file. and it includes the code of adding, editing,
deleting, modifying, searching, table sorting of patients. also it includes javascript file which is used mainly to validate Form input.
****************************************************************************************************************************************
2. db: this is database configuration and connecting. it has two files one of them "db.php" which it uses mysqli to perform the connection
and the other one "db2.php" which it uses PDO to perform the connection.
****************************************************************************************************************************************
3. images: include all the images used in the application.
****************************************************************************************************************************************
4. model: it has two main tables one for the patient that did pcr test and the other one who did blood test(both tests are to check the infection of covid-19)
also the search method inside these two files
****************************************************************************************************************************************
5. pcr:   it includes output files which includes all the patients files as a pdf file. and it includes the code of adding, editing,
deleting, modifying, searching, table sorting of patients. also it includes javascript file which is used mainly to validate Form input.
****************************************************************************************************************************************
6. sql: it has all the required query for creating tables.
****************************************************************************************************************************************
7. style: it has 6 different css styles.
****************************************************************************************************************************************
///////////////////

/////**PDF note!!**/////
PDF file of each patient has its information along with a barcode which
you can scan it but since now it is a local host then you will not be able to open the link  since it is local server
///////////////////

/////**Styles**/////
aboutusstyle.css: it is the style of about us popup in the main page
addpatientstyle.css: it is the style of adding a new patient info form.
indexstyle.css: it is the style of the main page also it is used in all other pages for header, body, and footer styling.
loginstyle.css: it is the style of login page
Sstyle.css: it is the style of the search bar
tablestyle.css: it is the style of the tables
///////////////////

/////**Username and password**/////
username: guest
password: 1234
///////////////////////////////////
