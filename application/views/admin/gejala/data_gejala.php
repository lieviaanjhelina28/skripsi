  <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
        <!--   <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary">Data Gejala</h5>
                <div class="text-right">
               <a href="" class="btn btn-primary"  data-toggle="modal" data-target="#newSubMenuModal">Tambah Data</a>
            </div>
          </div>
            <div class="card-body">
            <?php echo $this->session->flashdata('message'); ?>
           <!--  <form action="<?php echo base_url() . 'admin/gejala/tambah/' ?>"> -->
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Gejala</th>
                      <th scope="2">Nama Gejala</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <!-- <tfoot> -->
                  <!--   <tr>
                      <th>No</th>
                      <th>Kode Gejala</th>
                      <th>Nama Gejala</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot> -->
                  <tbody>
                  <?php
                     $no = 1;
                       foreach ($gejala as $g) { ?>

                    <tr>
                      <td><?php echo $no++ ?></td>
                       <td><?php echo $g->kode_gejala ?></td>
                      <td><?php echo $g->nama_gejala ?></td>
                      <td>
                        <?php echo anchor('admin/gejala/ubah/' . $g->kode_gejala, '<div class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></div>');  ?> 

                        <?php echo anchor('admin/gejala/hapus/' . $g->kode_gejala, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>');  ?> 

                    </td>
                    </tr>
                             <?php } ?>
                  </tbody>
                </table>
          <!--     </form> -->
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
                <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Data Gejala</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/gejala'); ?>" method="post">
                <div class="modal-body">
                   <div class="form-group">
                    <input type="text" class="form-control" id="kode_gejala" name="kode_gejala" placeholder="Kode Gejala">
                     <?php echo form_error('kode_gejala', ' <small class="text-danger pl-3">', '</small> '); ?>
                </div>
                    <div class="form-group">
                    <textarea type="text" class="form-control" id="nama_gejala" name="nama_gejala" placeholder="Nama Gejala"></textarea>
                     <?php echo form_error('nama_gejala', ' <small class="text-danger pl-3">', '</small> '); ?>
                </div>
              </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div> 