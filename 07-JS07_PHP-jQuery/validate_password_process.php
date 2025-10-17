<?php
$name = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

if (empty($name) || empty($email) || empty($password)) {
    echo "<span style='color:red;'>All fields must be filled!</span>";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<span style='color:red;'>Invalid email format!</span>";
} elseif (strlen($password) < 8) {
    echo "<span style='color:red;'>Password must be at least 8 characters!</span>";
} else {
    echo "<span style='color:green;'>Validation successful! Data is valid and secure.</span>";
}
?>
