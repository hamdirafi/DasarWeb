<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Data Dosen</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f9f9f9;
            }
            table {
                border-collapse: collapse;
                width: 50%;
                margin: 30px auto;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                background-color: #fff;
            }
            th, td {
                border: 1px solid #333;
                padding: 10px;
                text-align: left;
            }
            th {
                background-color: #4CAF50;
                color: white;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            h2 {
                text-align: center;
                color: #333;
            }
        </style>
    </head>
    <body>
        <?php
            $Dosen = [
                'Nama' => "Elok Nur Hamadana",
                'Domisili' => "Malang",
                'Jenis Kelamin' => "Perempuan"
            ];
        ?>

        <h2>Data Dosen</h2>
        <table>
            <tr>
                <th>Data</th>
                <th>Keterangan</th>
            </tr>
            <?php
                foreach ($Dosen as $key => $value) {
                    echo "<tr>";
                    echo "<td>$key</td>";
                    echo "<td>$value</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>