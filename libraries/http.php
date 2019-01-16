<?php
    // Allows the api to be accessed from any source.
    header('Access-Control-Allow-Origin: *');

    // This line specifies header commands we can use.
    // Content-Type and X-Requested-With are standard PHP commands.
    // User-Ref and Auth-Key are custom keywords we'll need for the app.
    header('Access-Control-Allow-Headers: Content-Type, X-Requested-With, User-Ref, Auth-Key');

    // Specifies what commands the website will accept.
    // A REST API (Angular/Ionic) can use all the below.
    header('Access-Control-Allow-Methods: GET, DELETE, OPTIONS, PATCH, POST, PUT');

    // We'll format our output as JSON.
    header('Content-Type: application/json');

    // Ionic has a habit of sending an OPTIONS header.
    // If we receive it, stop doing anything immediately.
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS')
    {
        ok();
    }

    // This function will check that the headers sent by the app
    // are valid.
    function check_login_auth()
    {
        $headers = getallheaders();

        $id     = isset($headers['User-Ref']) ? $headers['User-Ref'] : '';
        $auth   = isset($headers['Auth-Key']) ? $headers['Auth-Key'] : '';

        return check_api_auth($id, $auth);
        
    }

    // This function will format an error that we can use in the app.
    function error($message = "The server could not process your request due to an unknown error.")
    {
        // Bad Request Header - will trigger an error in the app.
        http_response_code(400);

        // Stop the code and print the message.
        exit(json_encode(['message' => $message], JSON_NUMERIC_CHECK + JSON_PRETTY_PRINT));
    }

    // The app will send data as an input stream.
    // This means that we can't use the normal $_POST.
    function get_input_stream(&$data)
    {
        // An app will generate a page php://input containing data.
        // We will read it and send it back to the original page.
        $data = json_decode(file_get_contents('php://input'), TRUE);
    }

    // Instead of writing a full function, we use an existing one.
    // Use OK only for OPTIONS headers.
    function ok()
    {
        success('data', ['m' => 'ok']);
    }

    // Use this function to format your data.
    function success($key = 'data', $data = [])
    {
        // For successful queries, we use 200.
        http_response_code(200);

        // Stop the code and print the message.
        exit(json_encode([$key => $data], JSON_NUMERIC_CHECK + JSON_PRETTY_PRINT));
    }
?>
