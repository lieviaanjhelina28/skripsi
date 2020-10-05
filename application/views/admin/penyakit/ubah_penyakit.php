  <!-- Begin Page Content -->
        <div class="container-fluid">
        <!-- Illustrations -->
              <div class="card shadow mb-4">
            <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Ubah Data Penyakit</h6>
                </div>
                <div class="card-body">

                  <?php 
                  foreach ($penyakit as $p) { ?>
                    
                  <form action="<?php echo base_url() . 'admin/penyakit/update/'; ?>" method="post">

                     <div class="form-group">
                     <label><b>Kode Penyakit</b></label>
                     <input type="text" name="kode_penyakit" readonly="" class="form-control" value="<?php echo $p->kode_penyakit ?>"><?php echo form_error('kode_penyakit', ' <small class="text-danger pl-3">', '</small> '); ?>
                    </div>

                    <div class="form-group">
                     <label><b>Nama Penyakit</b></label>
                     <input type="text" name="nama_penyakit" class="form-control" value="<?php echo $p->nama_penyakit ?>"><?php echo form_error('nama_penyakit', ' <small class="text-danger pl-3">', '</small> '); ?>
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