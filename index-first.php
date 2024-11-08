<!DOCTYPE html>
<html>

<head>
    <title>First Query</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <center>
            <h2>Query Pertama</h2>
        </center>
        <br>
        <br>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nomor</th>
                    <th>Kemasan</th>
                    <th>Satuan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $json = file_get_contents("http://localhost/ilcs-test-2024/first.php");
                $data =  json_decode($json, true);
                $nomor = 1;

                if (count($data) != 0) {
                    foreach ($data as $data) {
                ?>
                        <tr>
                            <td>
                                <?php echo $nomor++; ?>
                            </td>
                            <td>
                                <?php echo $data['mbrg_kemasan']; ?>;
                            </td>
                            <td>
                                <?php echo $data['kd_satuan']; ?>
                            </td>
                            <td>
                                <?php echo $data['jumlah']; ?>
                            </td>
                        </tr>
                <?php
                    }
                }


                ?>
            </tbody>
        </table>
    </div>
</body>

</html>