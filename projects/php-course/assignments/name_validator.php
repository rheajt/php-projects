<?php 
    $page_title = "PHP Variable Name Validator";

    include("../includes/header.html");
 ?>
<!-- PHP variable name validator - Create a Web application that validates user-entered 
variable names to check if they adhere to the PHP variable naming conventions.

Requirements:

*Create a PHP script named name_validator.php.
*Display a descriptive title at the top of the Web page.
*Provide a program description and user instructions.
*Identify to the user the requirements for a legal PHP variable name.
*Provide a single text field to allow the user to input a variable name to validate.
*Using regular expressions, check whether the user input is a legal PHP variable name.
*Display the result to the user.
*Continue to allow the user to input names for verification until the user enters "quit", "Q", or "q".
*Your PHP script must contain at least one function that performs the following:
    *Pass one argument to the function, the user input.
   * Have the function validate the user input using regular expressions.
    *Have the function return a value indicating pass or fail.
*Use good, descriptive variable names in your code.
*Insert blank lines in your script where appropriate to improve readability.
*Provide good comments throughout your code. -->

<div style="text-align: center; padding-top: 50px;">
<!-- Descriptive title and instructions -->
<h1>PHP Variable Name Validator</h1>
<h2>This form will validate that variable names that are entered<br> adhere to PHP variable naming conventions.</h2>
<h4>PHP variables must:<br>Begin with $<br>Followed by a letter<br>Followed by any number of letters, numbers, and underscores</h4>
<h3>Instructions:</h3>
<h4><i>Enter a variable in the form below</i></h4>
<h4><i>Hit submit to find out if it is a valid variable name.</i></h4>

<!-- Single text field to allow user to submit variable to validate -->
<form action="name_validator.php" method="post">
    <input type="text" name="name" />    
    <input type="submit" />
</form>

<?php // This script will validate the variable name entered in the form field
    
    // Check to make sure that something has been posted before it displays anything
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        
        // Check to see if the user tried to quit out first, then if not it runs the validation function
        switch ($name) {
            case "quit":
            case "q":
            case "Q":
                echo "";
                break;
            default:
                $name_validated = validator($name);
                echo "<h1>$name is $name_validated variable in PHP.</h1>";                
        }
    } elseif (!isset($_POST['name'])) {
        echo "";
    }

    // Below is the function that validates the user input
    function validator($variable_name) {
        // Create a variable for the pattern that will be used to determine if the expression is valid
        $variable_pattern = '(^\$)([[:alpha:]]{1})([0-9a-z_]*)$';

        if (eregi($variable_pattern, $variable_name)) {
            $variable_name_result = "a VALID";
        } else {
            $variable_name_result = "an INVALID";
        }

        // Returns a pass (VALID) or fail (INVALID)
        return $variable_name_result;
    }
 
    include('../includes/footer.html')
 ?>
