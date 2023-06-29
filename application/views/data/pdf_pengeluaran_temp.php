
<table border="0" style="width:100%">
 <tr>
   <td width="10%" align="center"><img class="media-object logo" src="<?php echo prefix_url;?>assets/inventory_logo/inventory_icon.png" style="width:70px;height:auto;" /></td>
   <td width="40%" style="vertical-align:middle"><small>SYSTEM</small><h3>INVENTORY WAREHOUSE</h1></td>
   <td width="40%" align="right"><h3>NOTA KELUAR</h3>
   </td>
 </tr>
</table>
<hr>

<table class="custom_class_2" style="width:100%">
  <?php foreach ($list as $value): ?>
  <tr>
    <td width="10%">Kode </td>
    <td>: P - <?php echo $value->kode ?></td>
  </tr>
  <tr>
    <td width="10%">Tanggal </td>
    <td>: <?php echo date('d F Y', strtotime($value->tanggal)) ?></td>
  </tr>

  <tr>
    <td width="10%">Status </td>
    <td>: <?php echo $value->remark ?></td>
  </tr>
  <?php endforeach; ?>
</table>
<hr>
<div align="center"><b><h4>LIST ITEM </h4></b></div>

<table    style="width:100%; border:solid 1px black;  border-collapse: collapse;">
  <thead>
    <tr style="border:solid 1px black; ">
      <th style="border:solid 1px black;">NO</th>
      <th style="border:solid 1px black;">ITEM </th>
      <th style="border:solid 1px black;">JUMLAH</th>
      <th style="border:solid 1px black;">HARGA / ITEM</th>
      <th style="border:solid 1px black;">TOTAL</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; ?>
    <?php foreach ($list_item as $value): ?>
    <tr>
      <td width="6%" align="center" style="border:solid 1px black;"><?php echo $i++ ?></td>
      <td style="border:solid 1px black;"><?php echo $value->judul ?></td>
      <td width="10%" align="center" style="border:solid 1px black;"><?php echo $value->jumlah_keluar ?></td>
      <td width="20%" style="border:solid 1px black;">Rp. <?php echo number_format($value->harga_item); ?></td>
      <td width="20%" style="border:solid 1px black;">Rp. <?php echo number_format($value->total); ?></td>

    </tr>
    <?php endforeach; ?>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>


    </tr>
    <tr>
      <td colspan="4">GRAND TOTAL</td>
      <td >:   <b>Rp. <?php echo number_format($grand_total); ?></b></td>

    </tr>
  </tbody>
</table>
<br>
<table class="custom_class_2"  style="width:100%">
  <tr>
    <td width="8%" style="vertical-align:top">Noted :</td>
    <td style="vertical-align:top"><?php foreach ($list as $value): ?><?php echo $value->noted ?><?php endforeach; ?></td>
    <td width="20%" align="center" ><?php foreach ($list as $value): ?><?php echo date('d F Y', strtotime($value->tanggal)) ?><?php endforeach; ?><br> Yang mengeluarkan,
      <br>  <br>  <br>
      <div style="text-transform: uppercase;"><?php foreach ($list as $value): ?><?php echo $value->oleh ?><?php endforeach; ?></div></td>
  </tr>
  </table>

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
