<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Dengan Ajax</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php" style="color: #fff;">
        CRUD Dengan Ajax
    </a>
</nav>

<div class="container">
    <h2 align="center" style="margin: 30px;">Data Anggota</h2>

    <form method="post" class="form-data" id="form-data">

        <div class="row">
            <div class="col-sm-9">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="hidden" name="id" id="id">
                    <input type="text" name="nama" id="nama" class="form-control">
                    <p class="text-danger" id="err_nama"></p>
                </div>
            </div>

            <div class="col-sm-3">
                <label>Jenis Kelamin</label><br>
                <input type="radio" name="jenis_kelamin" id="jenkel1" value="L"> Laki-laki
                <input type="radio" name="jenis_kelamin" id="jenkel2" value="P"> Perempuan
                <p class="text-danger" id="err_jenis_kelamin"></p>
            </div>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control"></textarea>
            <p class="text-danger" id="err_alamat"></p>
        </div>

        <div class="form-group">
            <label>No Telepon</label>
            <input type="number" name="no_telp" id="no_telp" class="form-control">
            <p class="text-danger" id="err_no_telp"></p>
        </div>

        <div class="form-group">
            <button type="button" name="simpan" id="simpan" class="btn btn-primary">
                <i class="fa fa-save"></i> Simpan
            </button>
        </div>
    </form>

    <hr>
    <div class="data"></div>
</div>

<div class="text-center">&copy; <?php echo date('Y'); ?> | CRUD Ajax</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {

    $('.data').load("data.php");

    $("#simpan").click(function() {

        var data = $('.form-data').serialize();

        var jenkel1 = document.getElementById("jenkel1").checked;
        var jenkel2 = document.getElementById("jenkel2").checked;

        var nama   = $("#nama").val();
        var alamat = $("#alamat").val();
        var no_telp = $("#no_telp").val();

        $(".text-danger").text("");

        if(nama == "") { $("#err_nama").text("Nama Harus Diisi"); }
        if(alamat == "") { $("#err_alamat").text("Alamat Harus Diisi"); }
        if(!jenkel1 && !jenkel2) { $("#err_jenis_kelamin").text("Jenis Kelamin Harus Dipilih"); }
        if(no_telp == "") { $("#err_no_telp").text("No Telepon Harus Diisi"); }

        if(nama != "" && alamat != "" && (jenkel1 || jenkel2) && no_telp != ""){

            $.ajax({
                type: 'POST',
                url: 'form_action.php',
                data: data,
                success: function() {
                    $('.data').load("data.php");
                    $("#id").val("");
                    $("#form-data")[0].reset();
                },
                error: function(response){
                    console.log(response.responseText);
                }
            });

        }

    });

});
</script>

</body>
</html>
