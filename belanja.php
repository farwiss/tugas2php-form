<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OUTPUT BELANJA</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .tbl {
            border-collapse: collapse;
            justify-content: center;
            display: flex;
            margin: auto;
        }

        .tbl td {
            background-color: beige;
            padding: 15px;
            border: solid 1px #777;
            font-weight: bold;
        }

        .button {
            justify-content: center;
            display: flex;
            margin-top: 1rem;
        }
    </style>
    <?php
    session_start(); //sesi login
    if (!$_SESSION['nama']) {
        header('location: tugas2.php');
    }

    ?>
</head>

<body>
    <h1 style="color:green; text-align:center"> FAKTUR PEMBELANJAAN <?php echo strtoupper($_SESSION['nama']); ?> </h1>
    <div>
        <table class="tbl">
            <tr>
                <td>Nama Lengkap</td>
                <td><?php echo $_SESSION['nama'] ?></td>
            </tr>
            <tr>
                <td>Produk Pilihan</td>
                <td><?php echo $_SESSION['produk']  ?></td>
            </tr>
            <tr>
                <td>Jumlah Beli</td>
                <td><?php echo $_SESSION['jumlah'] ?></td>
            </tr>
            <tr>
                <td>Harga Satuan</td>
                <td><?php echo convert_to_rupiah($_SESSION['harga']) ?></td>
            </tr>
            <tr>
                <td>Total Belanja</td>
                <td><?php echo convert_to_rupiah($_SESSION['total']) ?></td>
            </tr>
            <tr>
                <td>Potongan Diskon</td>
                <td><?php echo convert_to_rupiah($_SESSION['diskon']) ?></td>
            </tr>
            <tr>
                <td>PPN</td>
                <td><?php echo convert_to_rupiah($_SESSION['ppn']) ?></td>
            </tr>
            <tr>
                <td>Harga Bersih</td>
                <td><?php echo convert_to_rupiah($_SESSION['hargabersih']) ?></td>
            </tr>
        </table>
    </div>

    <form action="" method="POST">
        <div class="button">
            <button name="logout" type="submit" class="btn btn-danger">Logout</button>
        </div>
    </form>

</body>

</html>

<?php
function convert_to_rupiah($angka)
{
    return 'Rp. ' . strrev(implode('.', str_split(strrev(strval($angka)), 3)));
}

if (isset($_POST['logout'])) {
    session_destroy(); //lepas sesi login
    header('location:tugas2.php');
}
?>