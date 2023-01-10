
<div class="content-wrapper mt-3">

  <div class="container">

    <div class="card">
      <div class="card-body">
        <h3 style="font-weight: bold;" class="text-primary">Data Barang</h3>
        <hr>

        <!-- Button trigger modal -->
     <!--    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
          Tambah Produk <i class="fas fa-plus"></i>
        </button> -->



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div clasxs="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
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



                <div class="form-group">
                  <label for="exampleInputEmail1">Stok</label>
                  <input type="number" name="stok" class="form-control" value="" required>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1 ?>
          <?php foreach ($produk as $data) { ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data['kode_produk'] ?></td>
              <td><?= $data['produk'] ?></td>
              <td><?= "Rp " . number_format($data['harga'],0 ,',','.'); ?> / <label class="text-success"><?= $data['unit_harga'] ?></label></td>
              <td><?= $data['stok'] ?> / <label style="" class="text-primary"> <?= $data['unit_stok'] ?> </label></td>
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
                        <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">


                        <form method="post" action="<?= base_url('index/edit_produk') ?>" enctype="multipart/form-data">
                          <input type="hidden" name="id" value="<?= $data['id'] ?>">

                          <div class="form-group">
                            <label for="exampleInputEmail1">Kode Produk</label>
                            <input type="text" name="kode_produk" class="form-control" readonly value="<?= $data['kode_produk'] ?>">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Kategori</label>
                            <select class="form-control" name="kategori" required>
                              <?php 
                              $kategori2 = $this->db->get_where('tbl_kategori',['kode_kategori' => $data['kode_kategori']])->row_array();
                              ?>
                              <option value="<?= $data['kode_kategori'] ?>"><?= $kategori2['nama_kategori'] ?></option>
                              <?php foreach ($kategori as $data1) { ?>
                                <option value="<?= $data1['kode_kategori'] ?>"><?= $data1['nama_kategori'] ?></option>
                              <?php } ?>
                            </select>
                          </div>


                          <div class="form-group">
                            <label for="exampleInputEmail1">Produk</label>
                            <input type="text" name="produk" class="form-control" value="<?= $data['produk'] ?>" required>
                          </div>

                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Harga</label>
                              <input type="number" name="harga" class="form-control" value="<?= $data['harga'] ?>" required>
                            </div>


                            <div class="form-group col-md-6">
                             <label for="exampleInputEmail1" class="mt-3"></label>
                             <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                <div class="input-group-text">PER</div>
                              </div>
                              <select class="form-control" required name="unit_harga">
                                <option><?= $data['unit_harga'] ?></option>
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
                            <input type="number" name="stok" class="form-control" value="<?= $data['stok'] ?>" required>
                          </div>

                          <div class="form-group col-md-6">
                           <label for="exampleInputEmail1" class="mt-3"></label>
                           <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text">UNIT</div>
                            </div>
                            <select class="form-control" required name="unit_stok">
                              <option><?= $data['unit_stok'] ?></option>
                              <option value="">--Pilih Unit Stok--</option>
                              <option>SAK</option>
                              <option>TON</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" name="edit" class="btn btn-primary" value="Edit ">
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
       <th>Kode Produk</th>
       <th>Produk</th>
       <th>Harga</th>
       <th>Stok</th>
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
