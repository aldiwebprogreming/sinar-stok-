
<div class="content-wrapper mt-3">

  <div class="container">

    <div class="card">
      <div class="card-body">
        <h3 style="font-weight: bold;">Kirim Pesan</h3>
        <hr>


      </div>



      <div class="container">

        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <h5 class="card-header">Blast Whatsapp</h5>
                <div class="card-body">
                  <form method="post" action="<?= base_url('utama/act_kirimpesan') ?>">
                    <div class="form-group">
                      <label>Jumlah Pengiriman</label>
                      <select class="form-control" name="jml">
                        <option value="0" disabled>-- Pilih Jumlah Pengiriman -- </option>
                        <option>1</option>
                        <option>5</option>
                        <option>20</option>
                        <option>50</option>
                        <option>100</option>
                        <option>200</option>
                        <option>500</option>
                        <option>Semua</option>
                        <option>Acak</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Text Pesan</label>
                      <textarea class="form-control" name="pesan">
                        <?php 
                        if ($pesan == false) {
                          echo "";
                        }else{
                          echo $pesan['pesan'];
                        }
                        ?>

                      </textarea>
                    </div>

                    <?php 

                    if ($key == true) {
                     ?>
                     <div class="form-group">
                      <button id="wa" class="btn btn-success btn-block">Kirim Pesan <i class="fas fa-paper-plane"></i></button>
                    </div>
                  <?php } ?>

                </form>

                <?php 
                if ($key == false) {
                  ?>

                  <div class="form-group">
                    <button id="alert" class="btn btn-success btn-block">Kirim Pesan <i class="fas fa-paper-plane"></i></button>
                  </div>

                <?php } ?>



              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <br>
            <br>
            <br>
            <br>
            <br>

            <div id="load" style="display: none;">
              <center>
                <i id="load" class="fa-solid fa-spinner fa-spin-pulse fa-spin-reverse text-center text-success" style="font-size: 100px"></i>
                <p class="mt-2">Proses kirim pesan</p>
              </center>
            </div>

            <div id="showalert" style="display: none;">
              <center>
                <div class="alert alert-danger" role="alert">
                  Device key whatsapp anda belum aktif !<br>
                  Silahkan aktifkan terlebih dahulu di <a href="<?= base_url('') ?>utama/data_device"> sini</a>
                </div>
              </center>
            </div>
             <!--  <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">75%</div>
              </div> -->
            </div>
          </div>

        </div>



      <!--   <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>No hp</th>
              <th>Text</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($terkirim as $data) { ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nohp'] ?></td>
                <td><?= $data['text'] ?></td>
                <td><?= $data['date'] ?></td>
                <td>s
                </td>
              </tr>
            <?php } ?>


          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>No hp</th>
              <th>Text</th>
              <th>Date</th>

            </tr>
          </tfoot>
        </table> -->
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

    function btn(e){
      e.preventDefault();
    }
  })
</script>

<script>
  $("#wa").click(function(){
    $("#load").show();
  })
</script>


<script>
  $("#alert").click(function(){
    $("#showalert").show();
  })
</script>
