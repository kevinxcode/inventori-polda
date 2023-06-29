<?php

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table class="custom_class_2" style="width:100%">


  <tr>
    <td colspan="2" width="10%">Tanggal </td>
    <td colspan="3">: <?php echo date('d F Y', strtotime($start_date)) ?> s/d <?php echo date('d F Y', strtotime($end_date)) ?></td>
  </tr>



</table>


<br>
<table border="1" width="100%">
  <tr style="border:solid 1px black; ">
    <th style="border:solid 1px black;">NO</th>
    <th style="border:solid 1px black;">TANGGAL </th>
    <th style="border:solid 1px black;">DESKRIPSI</th>
    <th style="border:solid 1px black;">PEMASUKAN</th>
    <th style="border:solid 1px black;">PENGELUARAN</th>
  </tr>
    <?php $i = 1; ?>
   <?php foreach ($list as $value): ?>
     <tr>
       <td width="6%" align="center" style="border:solid 1px black;"><?php echo $i++ ?></td>
       <td  width="12%" style="border:solid 1px black;"><?php echo $value->tanggal ?></td>
       <td align="left" style="border:solid 1px black;"><?php echo $value->deskripsi ?></td>
       <td align="left" style="border:solid 1px black;">
         <?php if($value->pay_in==''): ?>
         <?php else: ?>
             Rp. <?php echo number_format($value->pay_in); ?>
         <?php endif; ?>
       </td>
       <td align="left" style="border:solid 1px black;">
         <?php if($value->pay_out==''): ?>
           <?php else: ?>
               Rp. <?php echo number_format($value->pay_out); ?>
           <?php endif; ?>
       </td>
     </tr>
     <?php endforeach; ?>
     <tr>
       <td colspan="3">Jumlah</td>

       <td><b>Rp. <?php echo number_format($total_in); ?><b></td>
       <td><b>Rp. <?php echo number_format($total_out); ?><b></td>

     </tr>
     <tr>
       <td colspan="3">Balance : <b>Rp. <?php echo number_format($balance); ?></b></td>

       <td ></td>

       <td></td>
     </tr>
  </table>
