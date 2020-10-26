 <br>
 <br><br>
 <br>
  <!-- Begin Page Content -->
<!--         <div class="container-fluid"> -->
   <section>
      <div class="container">
        <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <div class="text-center">
                  <h5 class="m-0 font-weight-bold text-gray-800">Pilih Gejala</h5>
                </div>
                </div>
                <div class="card-body">
                 <!--  <div class="text-center"> -->
                      <?php
                         $no = 1;
    echo "Penyakit Terdeteksi <strong>".$tampil_hasil['nama_penyakit']."</strong> dengan kepercayaan ".number_format($tampil_hasil['presentase'],2)."%<br><br>";
    echo "Gejala yang dipilih :<br>";
    foreach ($sakit as $id => $value) {
      foreach ($sakit[$id] as $gej) {
        echo $no++.". ".$gej['nama_gejala']."<br>";
      }
    }
    ?>
    </div>
  </div>
</div>
</section>


            