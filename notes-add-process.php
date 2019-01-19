<?php
    // This file will be used to process the add shows form.
    include 'libraries/form.php';

    include 'libraries/database.php';

    include 'libraries/login-check.php';

    // 1. check that the form has been sent.
    if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    {
        exit('You have no access to this page.');
    }

    // 2. store the form data in case of any errors.
	set_formdata($_POST);

    // 3. retrieve the variables from $_POST.
    $title       = $_POST['title'];
    $note        = $_POST['note-body'];
    $tbl_users_id= $_COOKIE['id'];

    // we'll use a boolean to determine if we have errors on the page.
    $has_errors = FALSE;

    // 4. check the inputs that are required.
    if (empty($title))
    {
    	$has_errors = set_error('title', 'The title field is required.');
    }

	// 5. if there are errors, we should go back and show them.
    if ($has_errors)
    {
        redirect('notes-add');
    }
    // 6. Insert the data in the table.
    // since the function will return a number, we can check it
    // to see if the query worked.

    $check = add_notes($title, $note, $tbl_users_id);
    if (!$check)
    {
        exit("The query was unsuccessful.");
    }

    // 7. Everything worked, go back to the list.
    clear_formdata();
    redirect('notes');



?>
