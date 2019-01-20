<?php
    // Connects to the MySQL database.
    function connect()
    {
        // 1. Assign a new connection to a new variable.
        $link = mysqli_connect('localhost', 'root', '', 'db_assignment')
            or die('Could not connect to the database.');

        // 2. Give back the variable so we can always use it.
        return $link;
    }

    // verifies the password according to the email generated.
    function check_password($email, $password)
    {
        // 1. Connect to the database.
        $link = connect();

        // 2. Protect variables to avoid any SQL injection
        $email = mysqli_real_escape_string($link, $email);

        // 3. Generate a query and return the result.
        $result = mysqli_query($link, "
            SELECT id, password, salt
            FROM tbl_users
            WHERE email = '{$email}'
        ");

        // 4. Disconnect from the database.
        disconnect($link);

        // 5. If no record exists, we can stop here.
        if (!$record =  mysqli_fetch_assoc($result))
        {
            return FALSE;
        }
        // 6. We can check that the password matches what is on record.
        $password = $record['salt'].$password;
        if(!password_verify($password, $record['password']))
        {
            return FALSE;
        }
        // 7. all is fine
        return $record ['id'];
    }

    // Disconnects the website from the database.
    function disconnect(&$link)
    {
        mysqli_close($link);
    }

    // adds new extension
    function add_extension($sub_title, $reason, $sub_date, $tbl_users_id)
    {
        // 1. Connect to the database.
        $link = connect();

        // 2. Prepare the statement using mysqli
        // to take care of any potential SQL injections.
        $stmt = mysqli_prepare($link, "
            INSERT INTO tbl_submission
                (sub_title, reason, sub_date, tbl_users_id)
            VALUES
                (?, ?, ?, ?)
        ");

        // 3. Bind the parameters so we don't have to do the work ourselves.
        // the sequence means: string string integer integer
        mysqli_stmt_bind_param($stmt, 'ssii', $sub_title, $reason, $sub_date, $tbl_users_id);

        // 4. Execute the statement.
        mysqli_stmt_execute($stmt);

        // 5. Disconnect from the database.
        disconnect($link);

        // 6. If the query worked, we should have a new primary key ID.
        return mysqli_stmt_insert_id($stmt);
    }

    // adds post
    function add_posts($content, $time, $tbl_users_id)
    {
      // 1. Connect to the database.
      $link = connect();

      // 2. Prepare the statement using mysqli
      // to take care of any potential SQL injections.
      $stmt = mysqli_prepare($link, "
          INSERT INTO tbl_post
              (post_content, time, tbl_users_id)
          VALUES
              (?, ?, ?)
      ");

      // 3. Bind the parameters so we don't have to do the work ourselves.
      // the sequence means: string string integer
      mysqli_stmt_bind_param($stmt, 'sii', $content, $time, $tbl_users_id);

      mysqli_stmt_execute($stmt);
      // 5. Disconnect from the database.
      disconnect($link);

      // 6. If the query worked, we should have a new primary key ID.
      return mysqli_stmt_insert_id($stmt);

    }

    // Add a new note to the table.
    function add_notes($title, $note, $tbl_users_id)
    {
        // 1. Connect to the database.
        $link = connect();

        // 2. Prepare the statement using mysqli
        // to take care of any potential SQL injections.
        $stmt = mysqli_prepare($link, "
            INSERT INTO tbl_notes
                (title, note, tbl_users_id)
            VALUES
                (?, ?, ?)
        ");

        // 3. Bind the parameters so we don't have to do the work ourselves.
        // the sequence means: string string integer
        mysqli_stmt_bind_param($stmt, 'ssi', $title, $note, $tbl_users_id);

        mysqli_stmt_execute($stmt);
        // 5. Disconnect from the database.
        disconnect($link);

        // 6. If the query worked, we should have a new primary key ID.
        return mysqli_stmt_insert_id($stmt);
    }

    // Checks that the userdata is valid
    function check_api_auth($id, $auth)
    {
        // 1. Connect to the database.
        $link = connect();

        // 2. Protect variables to avoid any SQL injection
        $id = mysqli_real_escape_string($link, $id);
        $auth_code = mysqli_real_escape_string($link, $auth_code);
        $expiration = mysqli_real_escape_string($link, time());

        // 3. Generate a query and return the result.
        $result = mysqli_query($link, "
            SELECT tbl_users_id
            FROM tbl_user_auth
            WHERE
                tbl_users_id = {$id} AND
                auth_code = '{$auth_code}' AND
                expiration > {$expiration}
        ");

        // 4. Disconnect from the database.
        disconnect($link);

        // 5. There should only be one row, or FALSE if nothing.
        return mysqli_num_rows($result) == 1;
    }

    // Clears the login data from a table.
    function clear_login_data($id, $auth_code)
    {
        // 1. Connect to the database.
        $link = connect();

        // 2. Prepare the statement using mysqli
        // to take care of any potential SQL injections.
        $stmt = mysqli_prepare($link, "
            DELETE FROM tbl_user_auth
            WHERE tbl_users_id = ? AND auth_code = ?
        ");

        // 3. Bind the parameters so we don't have to do the work ourselves.
        // the sequence means: integer string
        mysqli_stmt_bind_param($stmt, 'is', $id, $auth);

        // 4. Execute the statement.
        mysqli_stmt_execute($stmt);

        // 5. Disconnect from the database.
        disconnect($link);

        // 6. If the query worked, we should have changed one row.
        return mysqli_stmt_affected_rows($stmt) == 1;
    }

    function delete_extension($id)
    {

      // 1. Connect to the database.
      $link = connect();

      // 2. Prepare the statement using mysqli
      // to take care of any potential SQL injections.
      $stmt = mysqli_prepare($link, "
          DELETE FROM tbl_submission
          WHERE sub_id = ?
      ");

      // 3. Bind the parameters so we don't have to do the work ourselves.
      // the sequence means: integer
      mysqli_stmt_bind_param($stmt, 'i', $id);

      // 4. Execute the statement.
      mysqli_stmt_execute($stmt);

      // 5. Disconnect from the database.
      disconnect($link);

      // 6. If the query worked, we should have changed one row.
      return mysqli_stmt_affected_rows($stmt) == 1;

    }

    // Deletes a note from the table.
    function delete_note($noteid)
    {
        // 1. Connect to the database.
        $link = connect();

        // 2. Prepare the statement using mysqli
        // to take care of any potential SQL injections.
        $stmt = mysqli_prepare($link, "
            DELETE FROM tbl_notes
            WHERE note_id = ?
        ");

        // 3. Bind the parameters so we don't have to do the work ourselves.
        // the sequence means: integer
        mysqli_stmt_bind_param($stmt, 'i', $noteid);

        // 4. Execute the statement.
        mysqli_stmt_execute($stmt);

        // 5. Disconnect from the database.
        disconnect($link);

        // 6. If the query worked, we should have changed one row.
        return mysqli_stmt_affected_rows($stmt) == 1;
    }

    // Checks if an email is already registered.
    function email_exists($email)
    {
        // 1. Connect to the database.
        $link = connect();

        // 2. Protect variables to avoid any SQL injection
        $email = mysqli_real_escape_string($link, $email);

        // 3. Generate a query and return the result.
        $result = mysqli_query($link, "
            SELECT id
            FROM tbl_users
            WHERE email = '{$email}'
        ");

        // 4. Disconnect from the database.
        disconnect($link);

        // 5. There should only be one row, or FALSE if nothing.
        return mysqli_num_rows($result) >= 1;
    }

    // Retrieves all the extensions
    function get_all_extensions($id)
    {
      // 1. Connect to the database.
      $link = connect();

      // 2. Retrieve all the rows from the table.
      $result = mysqli_query($link, "
          SELECT *
          FROM tbl_submission
          WHERE tbl_users_id = '{$id}'
      ");

      echo mysqli_error($link);

      // 3. Disconnect from the database.
      disconnect($link);

      // 4. Return the result set.
      return $result;

  }
    // Retrieves all the notes
    function get_all_notes($id)
    {
        // 1. Connect to the database.
        $link = connect();

        // 2. Protect the variables.
        $id = mysqli_real_escape_string($link, $id);

        // 3. Retrieve all the rows from the table.
        $result = mysqli_query($link, "
            SELECT *
            FROM tbl_notes
            WHERE tbl_users_id = '{$id}'
        ");

        echo mysqli_error($link);

        // 3. Disconnect from the database.
        disconnect($link);

        // 4. Return the result set.
        return $result;
    }

    // Retreives all the posts
    function get_all_posts()
    {
      // 1. Connect to the database.
        $link = connect();

        // 2. Retrieve all the rows from the table.
        $result = mysqli_query($link, "
            SELECT
                a. post_id,
                a. post_content,
                a. time,
                c. tbl_users_id,
                c. name,
                c. surname
            FROM
                tbl_post a
            LEFT JOIN
                tbl_users b
            ON
                a.tbl_users_id = b.id

            LEFT JOIN
                tbl_user_details c
            ON
                b.id = c.tbl_users_id
            ORDER BY time DESC


        ");

        // 3. Disconnect from the database.
        disconnect($link);

        // 4. Return the result set.
        return $result;
    }

    // Retreives a single extension from the database
    function get_extension($id)
    {
        // 1. Connect to the database.
        $link = connect();

        // 2. Protect variables to avoid any SQL injection
        $id = mysqli_real_escape_string($link, $id);

        // 3. Generate a query and return the result.
        $result = mysqli_query($link, "
        SELECT
              sub_title AS 'title',
              reason AS 'reason',
              sub_date AS 'date'
          FROM tbl_submission
          WHERE sub_id = {$id}
        ");

        // 4. Disconnect from the database.
        disconnect($link);

        // 5. There should only be one row, or FALSE if nothing.
        return mysqli_fetch_assoc($result) ?: FALSE;
    }

    // Retrieves a single note from the database.
    function get_notes($noteid)
    {
        // 1. Connect to the database.
        $link = connect();

        // 2. Protect variables to avoid any SQL injection
        $noteid = mysqli_real_escape_string($link, $noteid);

        // 3. Generate a query and return the result.
        $result = mysqli_query($link, "
        SELECT
              title AS 'title',
              note AS 'note-body'
          FROM tbl_notes
          WHERE note_id = {$noteid}
        ");

        // 4. Disconnect from the database.
        disconnect($link);

        // 5. There should only be one row, or FALSE if nothing.
        return mysqli_fetch_assoc($result) ?: FALSE;
    }

    // Checks that a user is logged into the system
    function is_logged()
    {
        // 1. Connect to the database.
        $link = connect();

        // 2. we'll need the information from the cookies.
        $id         = array_key_exists('id', $_COOKIE) ? $_COOKIE['id'] : 0;
        $auth_code  = array_key_exists('auth_code', $_COOKIE) ? $_COOKIE['auth_code'] : '';

        // 3. Protect variables to avoid any SQL injection
        $id = mysqli_real_escape_string($link, $id);
        $auth_code = mysqli_real_escape_string($link, $auth_code);
        $expiration = mysqli_real_escape_string($link, time());

        // 4. Generate a query and return the result.
        $result = mysqli_query($link, "
            SELECT tbl_users_id
            FROM tbl_user_auth
            WHERE
                tbl_users_id = {$id} AND
                auth_code = '{$auth_code}' AND
                expiration > {$expiration}
        ");

        // 5. Disconnect from the database.
        disconnect($link);

        // 6. There should only be one row, or FALSE if nothing.
        return mysqli_num_rows($result) == 1;
    }

    // Writes the new login data to the auth table.
    function set_login_data($id, $code, $ip_address, $expiration)
    {
        // 1. Connect to the database.
        $link = connect();

        // 2. Prepare the statement using mysqli
        // to take care of any potential SQL injections.
        $stmt = mysqli_prepare($link, "
            INSERT INTO tbl_user_auth
                (tbl_users_id, auth_code, ip_address, expiration)
            VALUES
                (?, ?, ?, ?)
        ");

        // 3. Bind the parameters so we don't have to do the work ourselves.
        // the sequence means: string string double integer double
        mysqli_stmt_bind_param($stmt, 'issi', $id, $code, $ip_address, $expiration);

        // 4. Execute the statement.
        mysqli_stmt_execute($stmt);

        // 5. Disconnect from the database.
        disconnect($link);

        // 6. If the query worked, we should have a new primary key ID.
        return mysqli_stmt_affected_rows($stmt);
    }

    // Retrieves the login data for a user.
    function get_login_data($id, $ip_address)
    {
    // 1. Connect to the database.
    $link = connect();

    // 2. Protect variables to avoid any SQL injection
    $id = mysqli_real_escape_string($link, $id);
    $ip_address = mysqli_real_escape_string($link, $ip_address);

    // 3. Generate a query and return the result.
    $result = mysqli_query($link, "
        SELECT
            a.id,
            a.email,
            b.name,
            b.surname,
            c.auth_code,
            c.expiration
        FROM
            tbl_users a
        LEFT JOIN
            tbl_user_details b
        ON
            a.id = b.tbl_users_id
        LEFT JOIN
            tbl_user_auth c
        ON
            a.id = c.tbl_users_id
        WHERE
            a.id = {$id} AND c.ip_address = '{$ip_address}'
    ");

    // 4. Disconnect from the database.
    disconnect($link);

    // 5. There should only be one row, or FALSE if nothing.
    return mysqli_fetch_assoc($result) ?: FALSE;
    }

    // generates a random code
    function random_code($limit = 8)
    {
    return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
  }

    // Registers a user's login data.
    function register_login_data($email, $password, $salt)
    {
      // 1. Connect to the database.
      $link = connect();

      // 2. protect the password using blowfish.
      $password = password_hash($salt.$password, CRYPT_BLOWFISH);

      $time = time();

      // 3. Prepare the statement using mysqli
      // to take care of any potential SQL injections.
      $stmt = mysqli_prepare($link, "
          INSERT INTO tbl_users
              (email, password, salt, creation_date)
          VALUES
              (?, ?, ?, ?)
      ");

      // 4. Bind the parameters so we don't have to do the work ourselves.
      // the sequence means: string string double integer double
      mysqli_stmt_bind_param($stmt, 'sssi', $email, $password, $salt, $time);

      // 5. Execute the statement.
      mysqli_stmt_execute($stmt);

      echo mysqli_error($link);

      // 6. Disconnect from the database.
      disconnect($link);

      // 7. If the query worked, we should have a new primary key ID.
      return mysqli_stmt_insert_id($stmt);
  }

    // Registers a user's login data.
    function register_user_details($id, $name, $surname)
    {
        // 1. Connect to the database.
        $link = connect();

        // 2. Prepare the statement using mysqli
        // to take care of any potential SQL injections.
        $stmt = mysqli_prepare($link, "
            INSERT INTO tbl_user_details
                (tbl_users_id, name, surname)
            VALUES
                (?, ?, ?)
        ");

        // 3. Bind the parameters so we don't have to do the work ourselves.
        // the sequence means: string string double integer double
        mysqli_stmt_bind_param($stmt, 'iss', $id, $name, $surname);

        // 4. Execute the statement.
        mysqli_stmt_execute($stmt);

        echo mysqli_error($link);

        // 5. Disconnect from the database.
        disconnect($link);

        // 6. If the query worked, we should have a new primary key ID.
        return mysqli_stmt_affected_rows($stmt);
    }
?>
