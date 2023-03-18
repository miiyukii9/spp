<?php
session_start();
include('../connect.php');
if ($_SESSION['level'] == 'admin' or $_SESSION['level'] == 'petugas') {

?>

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../template/css.css">

    <title>Pembayaran</title>
  </head>

  <body>

    <?php include '../template/navbar.php'; ?>

    <div>
      <h1>Data Pembayaran</h1>
      <hr>
    </div>


    <!-- pencarian NIS -->

    <div class="container">
      <div class="cari_nis">
        <form method="GET" action="">
          <label for="">MASUKAN NIS</label>
          <input type="text" autocomplete="off" name="nis" list="nis">
          <datalist id="nis">
            <?php
            $query = "SELECT * FROM tb_siswa";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <option value="<?php echo $row['nis']; ?>"><?php echo $row['nama_siswa'] ?></option>
            <?php
            }
            ?>
          </datalist>
          <button type="submit" class="button">Cari</button>
        </form>
      </div>

      <?php
      if (@$_POST['nis'] or @$_GET['nis']) {
        @$nis = $_POST['nis'];
        @$nis = $_GET['nis'];
        $querycari = "SELECT * FROM tb_siswa inner join tb_kelas on tb_siswa.id_kelas = tb_kelas.id_kelas inner join tb_tarif on tb_siswa.id_tarif = tb_tarif.id_tarif WHERE nis = '$nis'";
        $resultcari = mysqli_query($connect, $querycari);
        $data = mysqli_fetch_assoc($resultcari);
      ?>
        <!-- Box Biodata -->

        <div class="box_biodata">
          <table class="bd">



            <form method="POST" action="bayar.php">
              <tr>
                <th>NIS</th>
                <td><?= $data['nis'] ?></td>
              </tr>
              <tr>
                <th>NAMA</th>
                <td><?= $data['nama_siswa'] ?></td>
              </tr>
              <tr>
                <th>KELAS</th>
                <td><?= $data['jurusan']?></td>
              </tr>
              <tr>
                <th>ANGKATAN</th>
                <td><?= $data['angaktan'] ?></td>
              </tr>
              <tr>
                <th>NOMINAL</th>
                <?php
                $angkatan = $data['id_tarif'];
                $queryspp = mysqli_query($connect, "SELECT nominal FROM tb_tarif WHERE id_tarif='$angkatan'");
                $dataspp = mysqli_fetch_assoc($queryspp);
                ?><input type="text" hidden name="angaktan" value="<?= $angkatan ?>">
                <td>Rp. <?= number_format($dataspp['nominal'], 0, ',', '.'); ?></td>
              </tr>
          </table>
        </div>


        <!-- Tabel Pembayaran -->

        <div class="tabel_pembayaran">
          <table class="pb">
            <tr>
              <th>NO</th>
              <th>NIS</th>
              <th>ID TARIF</th>
              <th>TANGGAL</th>
              <th>BULAN</th>
              <th>TAHUN</th>
              <th>NIP</th>
              <th>KETERANGAN</th>
              <th>AKSI</th>
            </tr>
            <?php
            $query = mysqli_query($connect, "SELECT * FROM tb_pembayaran WHERE nis='$nis'");
            $number = 1;
            while ($row = mysqli_fetch_assoc($query)) :
            ?>
              <tr>
                <td><?= $number++ ?></td>
                <td><?= $nis ?></td>
                <td><?= $dataspp['nominal'] ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['bulan']?></td>
                <td><?= $row['tahun']?></td>
                <td><?= $row['nip']?></td>
                <?php if ($row['tanggal'] == null) : ?>
                  <td>
                    Belum Lunas
                  </td>
                  <td><button type="submit" name="id_pembayaran" value="<?= $row['id_pembayaran'] ?>">Bayar</button></td>
                <?php else : ?>
                  <td>
                    Lunas
                  </td>
                  <td><button class='lunas' disabled>Terbayar</button></td>
                <?php endif; ?>
              </tr>
            <?php endwhile; ?>
            <!-- <tr>
              <td rowspan="7" style="border-bottom: 1px solid rgb(236, 225, 225);"></td>
            </tr> -->
          </table>
        </div>
      <?php
      }
      ?>
      </form>
    </div>
  <?php
} else {
  echo "<script>alert('Anda Tidak Memiliki Akses Untuk Menu Ini');location.href='../dashboard.php';</script>";
}
  ?>


  </body>

  </html>