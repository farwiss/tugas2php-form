<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas 2 PHP - FORM BELANJA</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .container {
      position: absolute;
      margin-top: -200px;
      margin-left: -250px;
      left: 50%;
      top: 45%;
      width: 500px;
      height: 220px;
      border: solid;
      background-color: khaki;
    }

    .output {
      position: absolute;
      margin-top: 50px;
      margin-left: -250px;
      left: 50%;
      top: 45%;
      width: 500px;
      height: 350px;
      border: solid;
      text-align: center;
    }
  </style>
</head>

<body>
  <?php
  session_start();
  ?>
  <form action="" method="POST">
    <h1 style="text-align:center; background-color:yellow">FORM BELANJA</h1>
    <div class="container">
      <div class="form-group row">
        <label for="nama" class="col-4 col-form-label">Nama Pelanggan</label>
        <div class="col-8">
          <input id="nama" name="nama" placeholder="Masukkan nama anda" type="text" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="produk" class="col-4 col-form-label">Pilih Produk</label>
        <div class="col-8">
          <select id="produk" name="produk" class="custom-select">
            <option value="">--- Pilih Produk ---</option>
            <option value="TV">TV</option>
            <option value="Kulkas">KULKAS</option>
            <option value="Mesin Cuci">MESIN CUCI</option>
            <option value="AC">AC</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="jumlah" class="col-4 col-form-label">Jumlah Beli</label>
        <div class="col-8">
          <input id="jumlah" name="jumlah" placeholder="Masukkan jumlah pembelian" type="text" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <div class="offset-4 col-8">
          <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </form>
</body>

</html>

<?php
if (isset($_POST['submit'])) {

  $nama = $_POST['nama'];
  $produk = $_POST['produk'];
  $jumlah = $_POST['jumlah'];
  // $harsat = $_POST['harsat'];
  // $total = $_POST['total'];
  // $diskon = $_POST['diskon'];
  // $ppn = $_POST['ppn'];
  // $hargabersih = $_POST['hargabersih'];

  switch ($produk) {
    case 'TV':
      $harga = '3000000';
      break;
    case 'Kulkas':
      $harga = '5000000';
      break;
    case 'Mesin Cuci':
      $harga = '500000';
      break;
    case 'AC':
      $harga = '1500000';
      break;
    default:
      $harga = '';
  }

  $total = $jumlah * $harga;
  $diskon = 0.20 * $total;
  $ppn = 0.10 * ($total - $diskon);
  $hargabersih = ($total - $diskon) + $ppn;

  // $nama = $_POST['nama'];
  // $produk = $_POST['produk'];
  // $jumlah = $_POST['jumlah'];
  $_SESSION['nama'] = $nama;
  $_SESSION['produk'] = $produk;
  $_SESSION['jumlah'] = $jumlah;
  $_SESSION['harga'] = $harga;
  $_SESSION['total'] = $total;
  $_SESSION['diskon'] = $diskon;
  $_SESSION['ppn'] = $ppn;
  $_SESSION['hargabersih'] = $hargabersih;
  header('location:belanja.php');
}
?>