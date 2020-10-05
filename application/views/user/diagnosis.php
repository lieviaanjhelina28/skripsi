  <!-- Begin Page Content -->
        <div class="container-fluid">
        <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <div class="text-center">
                  <h5 class="m-0 font-weight-bold text-gray-800">Pilih Gejala</h5>
                </div>
                </div>
                <div class="card-body">
                 <!--  <div class="text-center"> -->
                  <form action="<?php echo base_url().'user/diagnosis/proses/';  ?>" method="post">
              <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                <th><input type="checkbox" aria-label="Checkbox for following text input" id="checkAll" /></th>
               <!--  <th>No</th> -->
                <th>Nama Gejala</th>
            </tr>
        </thead>
        <tbody>   
                      <?php
                     $konsul = $this->db->get('gejala')->result();
                      $no = 1;
                      
                        foreach ($konsul as $k) { ?>
        <tr>    
                      
                      <td><input type="checkbox" name="selectall[]" value="<?php echo $k->kode_gejala ?>"></td>
                     <!--  <td><?php echo $no++ ?></td> -->
                      <td><?php echo $k->nama_gejala ?></td>
                          
                        </tr>
                        <?php } ?>
                           
</tbody>
</table>
    <div class="panel-footer">
        <button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-ok"></span>Diagnosa</button>

                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

            