<?php 
session_start();

$page_title = "PHP Course Assignments";
include ('includes/header.html');

 ?>
<h1><span class="glyphicon glyphicon-check"></span>  MODULE 3 - Programming Assignment</h1>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          <h3>Web-based registration - Create a database-driven registration form that takes user information and stores that information on the server. You will need to create the necessary database, as well as the table.</h3>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <p>Requirements:</p>
        <p>Allow the user to enter a User Name and check the database to see if an entry already exists.</p>
        <p>Allow the user to create a new record in the database if the User Name does not exist.</p>
        <p>First Name</p>
        <p>Last Name</p>
        <p>User Name</p>
        <p>Password</p>
        <p>Display database information to the user.</p>
        <p>Allow the user to update database information.</p>
        <p>Allow the user to upload a file and save it to the server.</p>
        <p>Maintain on the server a simple log file called registration_log.txt that keeps a log that a user has accessed the database. Use append to store the User Name to the registration_log.txt file for each logon.</p>
        <p>Submit your files and scripts as attachments to the Programming Assignment 3 Drop Box available at the end of this module. Please just attach your scripts and DO NOT compress the files with .zip, .sit, .tar, or similar packages. Be sure to title your submission by typing your name and "PHP Assignment 3".</p>
      </div>
    </div>
  </div>


<h1><span class="glyphicon glyphicon-check"></span>  MODULE 4 - Programming Assignment</h1>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <h3>Enhanced Web-based registration - Take the existing user-registration system you have developed and add these features:</h3>
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        <p>Requirements:</p>
        <p>E-mail confirmation upon registration</p>
        <p class="bg-success">A log-in process that checks the username and password against stored information</p>
        <p class="bg-success">Redirects the user to the appropriate page based upon a valid or invalid log-in</p>
        <p class="bg-success">The use of cookies or sessions to track the user over multiple (at least three) pages</p>
        <p class="bg-success">You should also continue to use the PHP/HTML template system you developed at the beginning of this module.</p>
        <p>Submit your files and scripts as attachments to the Programming Assignment 4 Drop Box available at the end of this module. Please just attach your scripts and DO NOT compress the files with .zip, .sit, .tar, or similar packages. Be sure to title your submission by typing your name and "PHP Assignment 4".</p>
      </div>
    </div>
  </div>

<h1><span class="glyphicon glyphicon-check"></span>  MODULE 5 - Programming Assignment</h1>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <h3>Error management - Improve two of your existing scripts by incorporating error management.</h3>
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        <p>Requirements:</p>
        <p class="bg-success">Incorporate the headers_sent() function on one of your existing scripts. ('phone_number.php')</p>
        <p class="bg-success">Incorporate the "or die()" function on another one of your existing scripts. ('update_user.php')</p>
        <p>Submit your files and scripts as attachments to the Programming Assignment 5 Drop Box available at the end of this module. Please just attach your scripts and DO NOT compress the files with .zip, .sit, .tar, or similar packages. Be sure to title your submission by typing your name and "PHP Assignment 5".</p>
      </div>
    </div>
  </div>

<?php include('includes/footer.html'); ?>