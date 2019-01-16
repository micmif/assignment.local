<?php
    include 'libraries/form.php';
    include 'libraries/url.php';
    include 'libraries/database.php';

    # 1. check that the form has been sent.
    if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    {
        exit('You have no access to this page.');
    }

    # 2. store the form data in case of any errors.
    set_formdata($_POST);

    # 3. retrieve the variables from $_POST
    $email      = $_POST['user-email'];
    $password   = $_POST['user-password'];

    # we'll use a boolean to determine if we have errors on the page.
    $has_errors = FALSE;

    # 4. check the inputs that are required.
    if (empty($email) || empty($password))
    {
    	$has_errors = set_error('user-email', 'Please fill in both the email and password fields.');
    }

    # 5. if there are errors, we should go back and show them.
    if ($has_errors)
    {
        redirect('login');
    }

    # 6. check if the email exists and retrieve the password.
    $check = check_password($email, $password);
    if ($check === FALSE)
    {
        exit("Your email or password are incorrect.");
    }

    # 7. The user managed to log in. Keep a record in the database.
    $code = random_code(32);
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $expiration = time() + 60 * 60 * 24 * 30;

    set_login_data($check, $code, $ip_address, $expiration);

    # 8. Get the login data to set in a cookie.
    $userinfo = get_login_data($check, $ip_address);
    if ($userinfo === FALSE)
    {
        exit("You could not be logged in.");
    }

    # 9. Set the cookie data to hold the user information.
    foreach ($userinfo as $key => $value)
    {
        if ($key == 'expiration') continue;
        setcookie($key, $value, $userinfo['expiration']);
    }

    # 10. Redirect to the homepage.
    redirect();
?>
