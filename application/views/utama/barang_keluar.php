
<div class="content-wrapper mt-3">

  <div class="container">

    <div class="card">
      <div class="card-body">
        <h3 style="font-weight: bold;" class="text-primary">Barang Keluar</h3>
        <hr>
        <div class="row">
          <?php foreach ($barang as $data) { ?>
            <div class="col-sm-4 col-6">
              <?php 
              if ($data['stok'] < 1) {
               ?>
               <a href="#" id="stokkosong<?= $data['id'] ?>">
                 <div class="card text-white bg-secondary mb-3" style="height: 200px;">
                 <?php }else{ ?>
                  <a href="#" data-toggle="modal" data-target="#exampleModal<?= $data['id'] ?>">
                   <div class="card text-white bg-primary mb-3" style="height: 200px;">
                   <?php } ?>

                   <div class="card-header" style="font-weight: bold;"><?= $data['produk'] ?> (<?= $data['unit_harga'] ?>)</div>
                   <div class="card-body">
                    <h5 class="card-title"><?= "Rp " . number_format($data['harga'],0,',','.'); ?> / <?= $data['unit_stok'] ?></h5>
                    <h4 class="mt-4"><?= $data['stok'] ?> <?= $data['unit_stok'] ?></h4>
                  </div>
                </div>
              </div>
            </a>

            <!-- Modal -->   
            <div class="modal fade" id="exampleModal<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form barang keluar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="<?= base_url('index/act_barang_keluar') ?>">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Kode Barang</label>
                        <input type="text" name="kode" class="form-control" value="<?= $kode ?>">
                      </div>
                      <input type="hidden" name="kode_produk" value="<?= $data['kode_produk'] ?>">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Barang</label>
                        <input type="text" name="barang" class="form-control" value="<?= $data['produk'] ?>">
                      </div>

                      <?php 

                      $kate = $this->db->get_where('tbl_kategori', ['kode_kategori' => $data['kode_kategori']])->row_array();
                      ?>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Kategori </label>
                        <input type="text" name="kategori" class="form-control" value="<?= $kate['nama_kategori'] ?>">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Harga</label>
                        <input type="text" name="harga" class="form-control" value="<?= $data['harga'] ?>">
                      </div>


                      <div class="form-group">
                        <label for="exampleInputEmail1">Pembeli</label>
                        <input type="text" name="pembeli" class="form-control" value="" required>
                        <small>Masukan nama pembeli yang benar</small>
                      </div>



                      <div class="form-group">
                        <label for="exampleInputEmail1">Harga Jual</label>
                        <input type="text" name="harga_jual" class="form-control" value="<?= $data['harga'] ?>">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">QTY / <?= $data['unit_stok'] ?></label>
                        <input type="number" name="qty" class="form-control" value="" required>

                      </div>

                      <input type="hidden" name="unit" value="<?= $data['unit_stok'] ?>">

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </form>
                </form>
              </div>
            </div>
          </div>

          <script>
            $(document).ready(() => {
             $("#stokkosong<?= $data['id'] ?>").click(() => {
               swal("Oops", "Stok barang kosong!", "error");

             })  
           })
         </script>

       <?php } ?>
     </div>


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
    });




  })
</script>
