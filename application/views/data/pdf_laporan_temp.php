
<table border="0" style="width:100%">
 <tr>
   <td width="10%" align="center"><img class="media-object logo" src="<?php echo prefix_url;?>assets/inventory_logo/inventory_icon.png" style="width:70px;height:auto;" /></td>
   <td width="40%" style="vertical-align:middle"><small>SYSTEM</small><h3>INVENTORY WAREHOUSE</h1></td>
   <td width="40%" align="right"><h3>TRANSAKSI</h3>
   </td>
 </tr>
</table>
<hr>

<table class="custom_class_2" style="width:100%">


  <tr>
    <td width="10%">Tanggal </td>
    <td>: <?php echo date('d F Y', strtotime($start_date)) ?> s/d <?php echo date('d F Y', strtotime($end_date)) ?></td>
  </tr>



</table>
<hr>
<div align="center"><b><h4>LIST ITEM </h4></b></div>

<table    style="width:100%; border:solid 1px black;  border-collapse: collapse;">
  <thead>
    <tr style="border:solid 1px black; ">
      <th style="border:solid 1px black;">NO</th>
      <th style="border:solid 1px black;">TANGGAL </th>
      <th style="border:solid 1px black;">DESKRIPSI</th>
      <th style="border:solid 1px black;">PEMASUKAN</th>
      <th style="border:solid 1px black;">PENGELUARAN</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; ?>
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

  </tbody>
</table>
<br>

  <div class="footer">
  ( This document is generated automatically by INVENTORY SYSTEM )
</div>

<style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   text-align: left;
}

th, td {
   padding-top: 5px;
   padding-left: 5px;
   padding-bottom: 5px;
}

th{
   background-color:#e3e3e3;
}



</style>
