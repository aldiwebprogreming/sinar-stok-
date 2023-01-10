<style>
  .struk {
    display: block;
    border: 0px solid black;
    padding: 5px;
    width: 450px;
    font-family: Arial, sans-serif;
  }
  .struk h1 {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
  }
  .struk table {
    width: 100%;
    border-collapse: collapse;
  }
  .struk table th,
  .struk table td {
    border: 0px solid black;
    padding: 2px;
  }
  .struk .total {
    font-weight: bold;
  }
</style>

<div style="page-break-after: always;">
  <div class="struk">
   <h1>PT.SINAR ANEKA NIAGA</h1>
   <table border="0" style="font-size: 12px">
    <tr style="font-weight: bold;">
      <td width="70">FAKTUR</td>
    </tr>

    <table border="0" style="font-size: 12px">
      <tr style="font-weight: bold;">
        <td width="50">Tanggal</td>
        <td width="10">: </td>
        <td width="250"><?= date('d/m/Y') ?></td>
        <td>Kepda YTH</td>
      </tr>

      <tr style="font-weight: bold;">
        <td width="70">No Faktur</td>
        <td width="10">: </td>
        <td><?= $barang['kode_barang_keluar'] ?></td>
        <td><?= $barang['pembeli'] ?></td>
      </tr>

      <tr style="font-weight: bold;">
        <td width="70"></td>
        <td width="10"> </td>
        <td></td>
        <td></td>
      </tr>

    </table> 

    <label style="font-weight: bold;">___________________________________________________</label>

    <table style="font-size: 12px;">
      <tr>
        <th width="40" style="text-align:center;">QTY</th>
        <th width="150">Barang</th>
        <th width="60" style="text-align: left; ">Harga</th>
        <th width="60"  style="text-align: left;">Harga Total</th>
      </tr>
    </table>
    <label style="font-weight: bold;">___________________________________________________</label>

    <table style="font-size: 12px; font-weight: bold;">

      <?php 
      $nama_barang = $this->db->get_where('tbl_produk',['kode_produk' => $barang['kode_produk']])->row_array();
      ?>

      <tr>
        <td width="40" style="text-align:center;"><?= $barang['qty'] ?> <?= $barang['unit'] ?></td>
        <td width="150" style="text-align:center;"><?= $nama_barang['produk'] ?></td>
        <td width="60" style="text-align: left;"><?= $barang['harga_jual'] ?></td>
        <td width="60"  style="text-align: left;"><?= $barang['total_harga'] ?></td>
      </tr>

    </table>
    <label style="font-weight: bold;">___________________________________________________</label>


    <table border="0" style="font-size: 12px;">
      <tr class="total">
        <td width="355">Total : </td>
        <td width=""><?=  "Rp " . number_format($barang['total_harga'],0,',','.'); ?></td>
      </tr>
    </table>
  </div>
</div>

<!-- <button id="print" style="margin-top:30px;">Print</button> -->
<br><td><br></td>
<p>.</p>


<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){

    // window.print();

  })
</script>
