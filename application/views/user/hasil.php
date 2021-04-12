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
                  <h5 class="m-0 font-weight-bold text-gray-800">Hasil Diagnosis</h5>
                </div>
                </div>
                <div class="card-body">
                <?php
    $no = 1;
    echo "<b>Gejala yang dipilih :</b><br>";
    foreach ($sakit as $id => $value) {
      foreach ($sakit[$id] as $gej) {
        echo $no++.". ".$gej['nama_gejala']."<br>";
      }
    } 
    echo "<br>";

    echo "Penyakit Terdeteksi <strong>".$tampil_hasil['nama_penyakit']."</strong> dengan nilai ".number_format($tampil_hasil['persentase'],2)."%<br><br>";

     echo "<b>Solusi yang diberikan :</b><br>".$tampil_hasil['solusi']."<br>";
     ?>
    </div>
  </div>
</div>
</section>


            