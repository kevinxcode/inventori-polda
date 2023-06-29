<?php

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>


<br>
<table border="1" width="100%">
  <tr>
    <th>#</th>
    <th>Tanggal</th>
    <th>Nama Barang</th>
    <th>Harga</th>
    <th>Jumlah</th>
    <th>Sisa</th>


  </tr>
    <?php $i = 1; ?>
   <?php foreach ($list as $value): ?>
     <tr>
       <td><?php echo $i++ ?></td>
       <td><?php echo $value->tanggal ?> </td>
       <td><?php echo $value->title ?></td>
       <td><?php echo $value->harga ?></td>
       <td><?php echo $value->jumlah ?></td>
       <td><?php echo $value->sisa ?></td>
     </tr>
    <?php endforeach; ?>
  </table>
