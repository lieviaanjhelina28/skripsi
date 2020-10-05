  <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         <!--  <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="font-weight-bold text-primary">Data Penyakit</h5>
              <div class="text-right">
              <a href="" class="btn btn-primary" data-toggle="modal" data-target="#newSubMenuModal">Tambah Data</a>
            </div>
            </div>
            <div class="card-body">
           <!--  <form action="<?php echo base_url() . 'admin/penyakit/' ?>"> -->
             <?php echo $this->session->flashdata('message'); ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Penyakit</th>
                      <th>Nama Penyakit</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                 <!--  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Kode Penyakit</th>
                      <th>Nama Penyakit</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot> -->
                  <tbody>
                  <?php
                     $no = 1;
                       foreach ($penyakit as $p) { ?>

                    <tr>
                      <td><?php echo $no++ ?></td>
                       <td><?php echo $p->kode_penyakit ?></td>
                      <td><?php echo $p->nama_penyakit ?></td>
                      <td>
                        <?php echo anchor('admin/penyakit/ubah/' . $p->kode_penyakit, '<div class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></div>');  ?> 

                        <?php echo anchor('admin/penyakit/hapus/' . $p->kode_penyakit, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>');  ?> 

                    </td>
                    </tr>
                             <?php } ?>
                  </tbody>
                </table>
           <!--    </form> -->
              </div>
            </div>
          </div>

        </div> 
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Data Penyakit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/penyakit'); ?>" method="post">
                <div class="modal-body">
                   <div class="form-group">
                    <input type="text" class="form-control" id="kode_penyakit" name="kode_penyakit" placeholder="Kode Penyakit">
                      <?php echo form_error('kode_penyakit', ' <small class="text-danger pl-3">', '</small> '); ?>
                </div>
                    <div class="form-group">
                    <textarea type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" placeholder="Nama Penyakit"></textarea>
                    <?php echo form_error('nama_penyakit', ' <small class="text-danger pl-3">', '</small> '); ?>
                </div>
              </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    
                </div>
            </form>
        </div>
    </div>
</div> 
