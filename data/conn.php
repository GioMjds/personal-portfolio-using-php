<?php
$conn = mysqli_connect('localhost', 'root', '', 'contact_db') or die('connection failed');

if (isset($_POST['send'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $msg = mysqli_real_escape_string($conn, $_POST['message']);

    $select_message = mysqli_query($conn, "SELECT * FROM `contact_form` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

    if (mysqli_num_rows($select_message) > 0) {
        $messagePrompt[] = 'Message Sent Already';
    } else {
        mysqli_query($conn, "INSERT INTO `contact_form`(name, email, number, message) VALUES('$name', '$email', '$number', '$msg')") or die('Query Failed');
        $messagePrompt[] = 'Message Sent Successfully';
    }

    // Fixing the 'Confirm Form Resubmission' problem in order to stop resending the contact messages in the databases when refreshed
    unset($_POST['send']);

    // Every refresh goes to the home section
    echo '<script>window.history.replaceState({}, "", window.location.href);</script>';
}