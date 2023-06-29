<?php

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>



<table border="1" width="100%">
  <tr>
    <th>#</th>
    <th>Tanggal Pinjam</th>
    <th>Nama Barang</th>
    <th>Peminjam</th>
    <th>Jumlah</th>
    <th>Tanggal Kembali</th>


  </tr>
    <?php $i = 1; ?>
   <?php foreach ($list as $value): ?>
     <tr>
       <td><?php echo $i++ ?></td>
       <td><?php echo $value->tanggal_pinjam ?> </td>
       <td><?php echo $value->nama_barang ?></td>
       <td><?php echo $value->peminjam ?></td>
       <td><?php echo $value->jumlah ?></td>
       <td><?php echo $value->tanggal_kembali ?></td>

     </tr>
    <?php endforeach; ?>
  </table>
