<?php 
$page_title = "New KWL Chart";
include('includes/header.html');

if (!isset($_SESSION['first_name'])){
    include 'includes/kwl_functions.inc.php';
    redirect_user();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Check for an uploaded file:
    if (isset($_FILES['upload'])) {
        
        // Validate the type. Should be TXT
        $allowed = array('text/plain');
        if (in_array($_FILES['upload']['type'], $allowed)) {
            require('kwldb_conn.php');
            $ti = $_SESSION['teacher_id'];
            $fn = $_FILES['upload']['name'];
            $cn = mysqli_real_escape_string($dbc, trim($_POST['upload_name']));

            $q = "INSERT INTO charts (teacher_id, chart_name, chart_file) VALUES ('$ti', '$cn', '$fn')";
            $r = @mysqli_query($dbc, $q);

            // Move the file over.
            if (move_uploaded_file ($_FILES['upload']['tmp_name'], "./uploads/{$_FILES['upload']['name']}")) {
                echo '<p><em>The file has been uploaded!</em></p>';
            } // End of move... IF.
            
        } else { // Invalid type.
            echo '<p class="bg-danger">Please upload a TEXT file.</p>';
        }

    } // End of isset($_FILES['upload']) IF.
    
    // Check for an error:
    if ($_FILES['upload']['error'] > 0) {
        echo '<p class="bg-danger">The file could not be uploaded because: <strong>';
    
        // Print a message based upon the error.
        switch ($_FILES['upload']['error']) {
            case 1:
                print 'The file exceeds the upload_max_filesize setting in php.ini.';
                break;
            case 2:
                print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.';
                break;
            case 3:
                print 'The file was only partially uploaded.';
                break;
            case 4:
                print 'No file was uploaded.';
                break;
            case 6:
                print 'No temporary folder was available.';
                break;
            case 7:
                print 'Unable to write to the disk.';
                break;
            case 8:
                print 'File upload stopped.';
                break;
            default:
                print 'A system error occurred.';
                break;
        } // End of switch.
        
        print '</strong></p>';
    
    } // End of error IF.
    
    // Delete the file if it still exists:
    if (file_exists ($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name']) ) {
        unlink ($_FILES['upload']['tmp_name']);
    }
            
} // End of the submitted conditional.
 ?>
<div class="col-md-4"></div>

<div class="col-md-4">
<div class="input-group">
    <form enctype="multipart/form-data" action="new_kwl.php" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="524288" />

        <fieldset><legend>Select a TEXT file of 512KB or smaller to be uploaded:</legend>
        
        <p><b>Name:</b> <input class="form-control" type="text" name="upload_name" /></p>
        <p><b>File:</b> <input class="form-control" type="file" name="upload" /></p>
        </fieldset>
        <input class="form-control btn btn-primary" type="submit" name="submit" value="Submit" />
    </form>
</div>
</div>
<div class="col-md-4"></div>


<?php
include('includes/footer.html');
 ?>