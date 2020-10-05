  <!-- Begin Page Content -->
        <div class="container-fluid">
        <!-- Illustrations -->
              <div class="card shadow mb-4">
            <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Ubah Data Gejala</h6>
                </div>
                <div class="card-body">

                  <?php 
                  foreach ($gejala as $g) { ?>
                    
                  <form action="<?php echo base_url() . 'admin/gejala/update/'; ?>" method="post">

                     <div class="form-group">
                     <label><b>Kode gejala</b></label>
                     <input type="text" name="kode_gejala" readonly="" class="form-control" value="<?php echo $g->kode_gejala ?>"><?php echo form_error('kode_gejala', ' <small class="text-danger pl-3">', '</small> '); ?>
                    </div>

                    <div class="form-group">
                     <label><b>Nama gejala</b></label>
                     <input type="text" name="nama_gejala" class="form-control" value="<?php echo $g->nama_gejala ?>"><?php echo form_error('nama_gejala', ' <small class="text-danger pl-3">', '</small> '); ?>
                    </div>

                     <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                </div>

                  <?php  } ?>
                
              </div>
              </form>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->