<?php 
    $page_title = "Phone Number Validator";

    include('../includes/header.html');
 ?>
    <div class="container" style="text-align: center; padding-top: 50px;">
        <h1>Enter Phone number below</h1>
        <h3>Use format: (000)000-0000</h3>
        <form action="phone_number.php" method="post">
            <input type="text" placeholder="(000)000-0000" name="phone" />
            <input type="submit" />
        </form>

    <?php  // This php script checks that the user input is a valid telephone number
        if (isset($_POST['phone'])) {
            $phone_number = $_POST['phone'];
            $is_valid = check_valid($phone_number);
            echo "<h3>$phone_number is $is_valid phone number</h3>";
        } else {
            // something that happens when the page first loads
        }

        function check_valid($phone_number) {
            $phone_pattern = '(^\()([0-9]{3})(\))([0-9]{3})(\-)([0-9]{4})';

            if (eregi($phone_pattern, $phone_number)) {
                return 'a VALID';
            } else {
                return 'an INVALID';
            }
        }


        include('../includes/footer.html');
     ?>

