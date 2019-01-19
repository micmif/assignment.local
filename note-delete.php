<?php

    include 'libraries/database.php';
    include 'libraries/login-check.php';

    // 1. Store the id for the show in a variable.
    $noteid = $_GET['note_id'];

    // 2. Checking if note exists

    if (!$noteid = get_notes($noteid))
    {
        exit("This note doesn't exist.");
    }

    if (!delete_note($noteid))
    {
        exit("The note could not be deleted.");
    }

    redirect('notes', ['note' => $_GET['note']]);
?>
