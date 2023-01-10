<!doctype html>
  <html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <title>Hello, world!</title>
  </head>
  <body>


    <div class="container">
      <h1>Form</h1>
      <hr>

      <!-- <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" id="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div> -->

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
          </tr>
        </thead>
        <tbody>

         <?php for ($i=1; $i <= 5 ; $i++) {  ?>
          <tr>
            <th scope="row"><?= $i ?></th>
            <td>
              <div class="form-group">
                <label for="exampleInputPassword1">Nama <?= $i ?></label>
                <input type="text" id="nama<?= $i ?>" class="form-control" id="exampleInputPassword1" >
              </div>
            </td>
            <td>

              <div class="form-group">
                <label for="exampleInputPassword1">Alamat <?= $i ?></label>
                <input type="text" id="alamat<?= $i ?>" class="form-control" id="exampleInputPassword1" >
              </div>
            </td>
          </tr>

          <script>
            $(document).ready(function(){
              $("#nama<?= $i ?>").keypress((event) => {
               var a = "Enter";
               if(event.key == a){
                $("#alamat<?= $i ?>").focus()
              }
            });
            })
            $(document).ready(function(){
              $("#alamat<?= $i ?>").keypress((event) => {
               var a = "Enter";
               if(event.key == a){
                $("#nama<?= $i + 1 ?>").focus()
              }
            });
            })
          </script>


        <?php } ?>

      </tbody>
    </table>

   <!--  <?php for ($i=1; $i <= 5 ; $i++) {  ?>

      <div class="form-group">
        <label for="exampleInputPassword1">Password <?= $i ?></label>
        <input type="password" id="pass<?= $i ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>


      <script>
        $(document).ready(function(){
          $("#pass<?= $i ?>").keypress((event) => {
           var a = "Enter";
           if(event.key == a){
            $("#pass<?= $i+1 ?>").focus()
          }
        });
        })
      </script>

    <?php } ?>

  -->

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>