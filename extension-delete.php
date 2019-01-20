<?php

    include 'libraries/database.php';
    include 'libraries/login-check.php';

    // 1. Store the id for the show in a variable.
    $id = $_GET['id'];

    // 2. Checking if note exists

    if (!$ext = get_extension($id))
    {
        exit("This note doesn't exist.");
    }

    if (!delete_extension($id))
    {
        exit("The note could not be deleted.");
    }

    redirect('extension');
?>
