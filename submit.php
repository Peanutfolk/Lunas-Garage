<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and trim
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    // Basic validation
    if (empty($name) || empty($email) || empty($message)) {
        header("Location: lunagarage.html?error=1");
        exit;
    }

    // (Optional) Save the data or send an email

    // Redirect back to the form with success
    header("Location: lunagarage.html?success=1");
    exit;
}
?>
