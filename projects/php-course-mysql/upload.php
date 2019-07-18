<?php 

session_start();

// Make sure the user is logged in
if (!isset($_SESSION['users_id'])) {
    require ('includes/login_functions.inc.php');
    redirect_user('login.php');  
}
$page_title = 'Upload';
include('includes/header.html');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Check for an uploaded file:
    if (isset($_FILES['upload'])) {
        
        // Validate the type. Should be TXT
        $allowed = array('text/plain');
        if (in_array($_FILES['upload']['type'], $allowed)) {
        
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

<form enctype="multipart/form-data" action="upload.php" method="post">

    <input type="hidden" name="MAX_FILE_SIZE" value="524288" />
    
    <fieldset><legend>Select a TEXT file of 512KB or smaller to be uploaded:</legend>
    
    <p><b>File:</b> <input type="file" name="upload" /></p>
    
    </fieldset>
    <input type="submit" name="submit" value="Submit" />

</form>
<br>
<br>
<br>
<?php 

echo '<fieldset><legend>The files in the upload directory are: </legend>';
$open = opendir ("uploads");
while ($files = readdir ($open)) {
    if ($files != "." && $files != "..") {
        echo "<a href='./uploads/{$files}'>$files</a><br>";
    }
}
closedir ($open);
echo '</fieldset>';
include ('includes/footer.html'); 

?>
