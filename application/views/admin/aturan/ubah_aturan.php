  <!-- Begin Page Content -->
        <div class="container-fluid">
        <!-- Illustrations -->
              <div class="card shadow mb-4">
            <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Ubah Data Aturan</h6>
                </div>
                <div class="card-body">

                  <?php 
                  foreach ($aturan as $a) { ?>
                    
                  <form action="<?php echo base_url() . 'admin/aturan/update/'; ?>" method="post">

                     <div class="form-group">
                     <label><b>Kode Penyakit</b></label>
                     <input type="hidden" name="id_aturan" class="form-control" value="<?php echo $a->id_aturan ?>" >
                     <input type="text" name="kode_penyakit" class="form-control" value="<?php echo $a->kode_penyakit ?>"><?php echo form_error('kode_penyakit', ' <small class="text-danger pl-3">', '</small> '); ?>
                    </div>

                    <div class="form-group">
                     <label><b>Kode Gejala</b></label>
                     <input type="text" name="kode_gejala" class="form-control" value="<?php echo $a->kode_gejala ?>"><?php echo form_error('kode_gejala', ' <small class="text-danger pl-3">', '</small> '); ?>
                    </div>

                     <div class="form-group">
                     <label><b>bobot</b></label>
                     <input type="text" name="bobot" class="form-control" value="<?php echo $a->bobot ?>"><?php echo form_error('bobot', ' <small class="text-danger pl-3">', '</small> '); ?>
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