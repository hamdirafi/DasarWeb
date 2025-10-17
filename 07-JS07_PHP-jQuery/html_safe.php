<form method="post" action="">
    Enter Email: <input type="text" name="email"><br>
    <input type="submit" value="Check Email">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Mengamankan input dari HTML Injection
    $safe_email = htmlspecialchars($email);

    // Memeriksa apakah input adalah email yang valid
    if (filter_var($safe_email, FILTER_VALIDATE_EMAIL)) {
        echo "Valid email: " . $safe_email;
    } else {
        echo "Invalid email format!";
    }
}
?>
