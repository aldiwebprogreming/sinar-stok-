
<div class="content-wrapper mt-3">

  <div class="container">

    <div class="card">
      <div class="card-body">
        <h3 style="font-weight: bold;" class="text-primary">Barang Masuk</h3>
        <hr>

        <div class="card col-md-8">
          <div class="card-body">
            <h5><i class="fas fa-plus"></i> Form Tambah Barang</h5>
            <hr>
            <form method="post" action="<?= base_url('index/tambah_produk') ?>" enctype="multipart/form-data">

              <div class="form-group">
                <label for="exampleInputEmail1">Kode Produk</label>
                <input type="text" name="kode_produk" class="form-control" value="<?= $kode ?>">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Kategori</label>
                <select class="form-control" name="kategori" required>
                  <option value="">--Pilih Kategori--</option>
                  <?php foreach ($kategori as $data) { ?>
                    <option value="<?= $data['kode_kategori'] ?>"><?= $data['nama_kategori'] ?></option>
                  <?php } ?>
                </select>
              </div>


              <div class="form-group">
                <label for="exampleInputEmail1">Produk</label>
                <input type="text" name="produk" class="form-control" value="">
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Harga</label>
                  <input type="number" name="harga" class="form-control" value="" required>
                </div>

                <div class="form-group col-md-6">
                 <label for="exampleInputEmail1" class="mt-3"></label>
                 <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">PER</div>
                  </div>
                  <select class="form-control" required name="unit_harga">
                    <option value="">--Pilih Unit Harga--</option>
                    <option>1 Kg</option>
                    <option>5 Kg</option>
                    <option>10 Kg</option>
                    <option>20 Kg</option>
                    <option>30 Kg</option>
                    <option>50 Kg</option>
                    <option>TON</option>
                  </select>
                </div>
              </div>
            </div>


            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Stok</label>
                <input type="number" name="stok" class="form-control" value="" required>
              </div>

              <div class="form-group col-md-6">
               <label for="exampleInputEmail1" class="mt-3"></label>
               <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">UNIT</div>
                </div>
                <select class="form-control" required name="unit_stok">
                  <option value="">--Pilih Unit Stok--</option>
                  <option>SAK</option>
                  <option>TON</option>
                </select>
              </div>
            </div>
          </div>






          <div class="modal-footer">
            <a href="" class="btn btn-info">Reffres</a>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
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
    })    

  })
</script>
