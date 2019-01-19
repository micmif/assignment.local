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
    $sub_title       = $_POST['sub-title'];
    $reason          = $_POST['reason'];
    $sub_date        = $_POST['sub-date'];


    // we'll use a boolean to determine if we have errors on the page.
    $has_errors = FALSE;

    // 4. check the inputs that are required.
    if (empty($sub_title))
    {
    	$has_errors = set_error('sub-title', 'The title field is required.');
    }

    if (empty($reason))
    {
        $has_errors = set_error('reason', 'Please give a reason.');
    }

    if (empty($sub_date))
    {
    	$has_errors = set_error('sub-date', 'The submission date field is required.');
    }

    // to confirm a time, we can use STRTOTIME.
    $sub_date = strtotime($sub_date);

    // If the air time was not converted properly.
    if (!$sub_date)
    {
    	$has_errors = set_error('sub-date', 'The submission date is in a wrong format. Please use DD/MM/YYYY.');
    }

	// 5. if there are errors, we should go back and show them.
    if ($has_errors)
    {
        redirect('extention-add', ['sub-title' => $sub_title]);
    }


    // 6. Insert the data in the table.
    // since the function will return a number, we can check it
    // to see if the query worked.
    $check = add_extention($sub_title, $reason, $sub_date);
    if (!$check)
    {
        exit("The query was unsuccessful.");
    }

    // 7. Everything worked, go back to the list.
    clear_formdata();
    redirect('extention');

?>
