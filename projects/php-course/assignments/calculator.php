<!-- Programming Assignment 1

Web-based calculator - Create a Web application calculator that allows a user to input up to 10 numbers and then displays the sum of the numbers entered.
Requirements:
*DONE Create two files: calculator.html and calculator.php.
*DONE Display a descriptive title at the top of each Web page.
*DONE Provide a program description and user instructions.
*DONE Using an HTML form, allow the user to input up to 10 numbers.
*DONE In the calculator.php script, use an array to store the numbers input by the user.
*DONE Use a foreach statement to sum the numbers together.
*DONE Display all the numbers input by the user and their total.
*DONE (I think...) Use good descriptive variable names in your code.
*DONE Insert blank lines where appropriate to improve readability.
*DONE Provide good comments throughout your code. -->

<?php   # Module 1 Calculator script

    $page_title = "Simple Calculator";

    include('../includes/header.html');

    if(isset($_POST['numbers'])) {

        // Get the string of numbers from the html form
        $numbers = $_POST['numbers'];

        // Remove any whitespaces from the string
        $numbers_replaced = str_replace(' ', '', $numbers);
        
        // Take the string of numbers and turn it into an array using the explode() function
        $numbers_array = explode(",",$numbers_replaced);

        // Check to see which numbers are being discarded if more than 10 numbers were entered
        if (count($numbers_array) > 10) {
            // Set the value of $numbers_array_end to the values after the first 10
            $numbers_array_end = array_slice($numbers_array, 10);
            $numbers_array_end = implode(', ', $numbers_array_end);
            
            // Print out the values of the end values
            print ("<div style='border: 1px solid black; text-align: center;'>");
            print ("<h1>You entered more than 10 numbers.</h1>");
            print ("<h1>The numbers that I discarded are:</h1>");
            print ("<h2>$numbers_array_end</h2>");
            print ("</div>");
        }
        
        // Set the values of the array to only the first 10 numbers entered
        $numbers_array = array_slice($numbers_array, 0, 10);
        
        // An easier way to do it using array_sum() that I used before I reread the directions...
        // $numbers_sum = array_sum($numbers_array);

        // Declaring the $numbers_sum variable
        $numbers_sum = 0;

        // foreach loop to sum the array
        foreach($numbers_array as $numbers_sum_loop) {
            $numbers_sum = $numbers_sum + $numbers_sum_loop;
        }

        // Print out the numbers that the user entered
        print ("<div style='text-align: center;'>");
        print ("<h1>The numbers that you entered are...</h1>");
        print ("<h2>". $numbers ."</h2>");
        print ("</div>");

        // Print out the sum of the array
        print ("<h1 style='text-align: center;'>The sum of your numbers is...</h1>");
        print ("<h2 style='text-align: center;'>$numbers_sum</h2>");

        echo '<form action="" method="post" style="text-align: center;">
                <input type="submit" value="Calculate again?" />
            </form>';
    } else {
        echo '<div style="text-align: center;">

                <h1>Calculate Sums!</h1>
                <h2>In the field below, calculate the sum of up to 10 numbers.</h2>
                <h2>Seperate each number with a comma.</h2>
                <h2>If you type more than 10 numbers, any extras will be discarded.</h2>

                <!-- Create the form where users type in a list of numbers -->
                <form action="" method="post">
                    <input type="text" name="numbers" />
                    <input type="submit" />
                </form>

            </div>';
    }

    include ('../includes/footer.html');
?>

