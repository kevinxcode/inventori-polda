<?php

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>



<table border="1" width="100%">
  <tr>
    <th>#</th>
    <th>Pengadaan</th>
    <th>Jenis</th>
    <th>Jumlah</th>
    <th>B</th>
    <th>RR</th>
    <th>RB</th>


  </tr>
    <?php $i = 1; ?>
   <?php foreach ($list as $value): ?>
     <tr>
       <td><?php echo $i++ ?></td>
       <td><?php echo $value->judul_pengadaan ?> </td>
       <td><?php echo $value->jenis ?></td>
       <td><?php echo $value->jumlah ?></td>
       <td><?php echo $value->b ?></td>
       <td><?php echo $value->rr ?></td>
       <td><?php echo $value->rb ?></td>

     </tr>
    <?php endforeach; ?>
  </table>
