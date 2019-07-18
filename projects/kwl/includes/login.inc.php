<?php /* This file included by the index.php */

include('includes/kwl_functions.inc.php');


// $check is the boolean, $data is the value of either $errors or $row
list ($check, $data) = check_login ($dbc, $_POST['email'], $_POST['pass']);

if ($check) {
    // $_SESSION['teacher_id'] = $data['teacher_id'];
    // $_SESSION['first_name'] = $data['first_name'];

    $_SESSION = $data;

    if ($data['role'] == 'teacher') {
        redirect_user('teacher_profile.php');
    } else {
        redirect_user('student_profile.php');
    }
    
} else {
    $errors = $data;
}
mysqli_close($dbc);