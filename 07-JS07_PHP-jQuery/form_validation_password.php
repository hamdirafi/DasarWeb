<!DOCTYPE html>
<html>
<head>
    <title>Form Validation with Password (AJAX + jQuery)</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Form Validation using AJAX and jQuery</h2>

    <form id="formValidation">
        Name: <input type="text" name="nama" id="nama"><br>
        <span id="errorName" style="color:red;"></span><br>

        Email: <input type="text" name="email" id="email"><br>
        <span id="errorEmail" style="color:red;"></span><br>

        Password: <input type="password" name="password" id="password"><br>
        <span id="errorPassword" style="color:red;"></span><br>

        <input type="submit" value="Submit">
    </form>

    <div id="result" style="margin-top:15px; font-weight:bold;"></div>

    <script>
        $(document).ready(function(){
            $("#formValidation").submit(function(e){
                e.preventDefault(); // Mencegah reload halaman

                // --- Validasi di sisi jQuery (client side) ---
                var nama = $("#nama").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var valid = true;

                // Reset pesan error
                $("#errorName").text("");
                $("#errorEmail").text("");
                $("#errorPassword").text("");

                if (nama === "") {
                    $("#errorName").text("Name is required!");
                    valid = false;
                }
                if (email === "") {
                    $("#errorEmail").text("Email is required!");
                    valid = false;
                } else if (!/^[^ ]+@[^ ]+\.[a-z]{2,3}$/.test(email)) {
                    $("#errorEmail").text("Invalid email format!");
                    valid = false;
                }
                if (password.length < 8) {
                    $("#errorPassword").text("Password must be at least 8 characters!");
                    valid = false;
                }

                // Jika valid, kirim data ke server via AJAX
                if (valid) {
                    $.ajax({
                        url: "validate_password_process.php",
                        type: "POST",
                        data: $(this).serialize(),
                        success: function(response){
                            $("#result").html(response);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
