
<div class="content-wrapper mt-3">

  <div class="container">

    <div class="card">
      <div class="card-body">
        <h3 style="font-weight: bold;">Data Pesan Terkirim</h3>
        <hr>


      </div>



      <div class="container">

        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>No hp</th>
              <th>Text</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <?php  $no = 1 ?>
            <?php foreach ($terkirim as $data) { ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nohp'] ?></td>
                <td><?= $data['pesan'] ?></td>
                <td><?= $data['tgl_terkrim'] ?></td>
                
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
