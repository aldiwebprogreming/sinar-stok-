
<div class="content-wrapper mt-3">

  <div class="container">

    <div class="card">
      <div class="card-body">
        <h3 style="font-weight: bold;" class="text-primary">Data Barang Keluar</h3>
        <hr>


        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode BK</th>
              <th>Barang</th>
              <th>Harga</th>
              <th>Harga Jual</th>
              <th>Qty</th>
              <th>Tgl</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1 ?>
            <?php foreach ($keluar as $data) { ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['kode_barang_keluar'] ?></td>
                <td><?= $data['kode_produk'] ?></td>
                <td><?= "Rp " . number_format($data['harga_produk'],0 ,',','.'); ?> </td>
                <td><?= "Rp " . number_format($data['harga_jual'],0 ,',','.'); ?></td>
                <td><?= $data['qty'] ?></td>
                <td><?= $data['date'] ?></td>
                <td>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?= $data['id'] ?>">
                    Hapus
                  </button>
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModaledit<?= $data['id'] ?>">
                    Edit
                  </button>

                  <div class="modal fade" id="myModal<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Apakah anda ingin menghapus data ini?
                          <form method="post" action="<?= base_url('index/hapus_produk') ?>">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" name="hapus" class="btn btn-danger" value="Hapus">
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>



                  <div class="modal fade" id="myModaledit<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Barang Keluar</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">


                          <form method="post" action="<?= base_url('index/edit_barang_keluar') ?>" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Kode Barang Keluar</label>
                              <input type="text" name="kode" class="form-control" value="<?= $data['kode_barang_keluar'] ?>" readonly>
                            </div>

                            <?php 
                            $barang = $this->db->get_where('tbl_produk', ['kode_produk' => $data['kode_produk']])->row_array();
                            ?>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Barang</label>
                              <input type="text" name="barang" class="form-control" value="<?= $barang['produk'] ?>" readonly>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Harga</label>
                              <input type="text" name="harga" class="form-control" value="<?= $data['harga_produk'] ?>" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Harga Jual</label>
                              <input type="text" name="harga_jual" class="form-control" value="<?= $data['harga_jual'] ?>" required>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">QTY</label>
                              <input type="number" name="qty" class="form-control" value="<?= $data['qty'] ?>" required>
                            </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                        </form>

                      </div>

                    </div>
                  </div>
                </div>


              </td>
            </tr>
          <?php } ?>


        </tbody>
        <tfoot>
          <tr>
           <th>No</th>
           <th>Kode BK</th>
           <th>Barang</th>
           <th>Harga</th>
           <th>Harga Jual</th>
           <th>Qty</th>
           <th>Tgl</th>
           <th>Opsi</th>

         </tr>
       </tfoot>
     </table>


   </div>
 </div>









</div>
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->




<!-- Main Footer -->
<script src="http://momentjs.com/downloads/moment.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> 

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<!-- kalender -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script>
  $(document).ready(function(){

    $("#uang").keyup(function(){
      var uang_anda = $(this).val();
      var totalbayar = $(".totalbayar2").val();
      var hasil = uang_anda - totalbayar;
      $("#hasilkembalian").val(hasil);
    })    

  })
</script>
