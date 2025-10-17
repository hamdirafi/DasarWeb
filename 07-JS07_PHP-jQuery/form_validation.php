<!DOCTYPE html>
<html>
<head>
    <title>Form Validation (AJAX Version)</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Form Validation using AJAX</h2>

    <form id="formValidation">
        Name: <input type="text" name="nama" id="nama"><br>
        <span id="errorName" style="color:red;"></span><br>

        Email: <input type="text" name="email" id="email"><br>
        <span id="errorEmail" style="color:red;"></span><br>

        <input type="submit" value="Submit">
    </form>

    <div id="result" style="margin-top:15px; font-weight:bold;"></div>

    <script>
        $(document).ready(function(){
            $("#formValidation").submit(function(e){
                e.preventDefault(); // Mencegah reload halaman

                // Kirim data form ke PHP via AJAX
                $.ajax({
                    url: "validate_ajax_process.php",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response){
                        $("#result").html(response);
                    }
                });
            });
        });
    </script>
</body>
</html>
