  <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
 <!--          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
 -->
          <!-- DataTales Example -->
          <div class="card shadow mb-2">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary">Data aturan</h5>
                <div class="text-right">
            <a href="" class="btn btn-primary left" data-toggle="modal" data-target="#newSubMenuModal">Tambah Data</a>
          </div>
          </div>
            <div class="card-body">
               <?php echo $this->session->flashdata('message'); ?>
           <!--  <form action="<?php echo base_url() . 'admin/aturan/tambah/' ?>"> -->
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Penyakit</th>
                      <th>Kode Gejala</th>
                      <th>Probabilitas</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                 <!--  <tfoot> -->
                  <!--   <tr>
                      <th>No</th>
                      <th>Kode aturan</th>
                      <th>Nama aturan</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot> -->
                  <tbody>
                  <?php
                     $no = 1;
                       foreach ($aturan as $a) { ?>

                    <tr>
                      <td><?php echo $no++ ?></td>
                       <td><?php echo $a->kode_penyakit ?></td>
                      <td><?php echo $a->kode_gejala ?></td>
                       <td><?php echo $a->probabilitas?></td>
                      <td>
                       <!--  <?php echo anchor('admin/aturan/detail/' . $a->id_aturan, '<div class="btn btn-success btn-sm"><i class="fas fa-edit"></i></div>');  ?> 
 -->
                        <?php echo anchor('admin/aturan/ubah/' . $a->id_aturan, '<div class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></div>');  ?> 

                        <?php echo anchor('admin/aturan/hapus/' . $a->id_aturan, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>');  ?> 

                    </td>
                    </tr>
                             <?php } ?>
                  </tbody>
                </table>
        <!--       </form> -->
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
            <form action="<?= base_url('admin/aturan'); ?>" method="post">
                <div class="modal-body">
                   <div class="form-group">
                    <select name="kode_penyakit" class="form-control">
                       <option value="">Pilih Penyakit</option>
                          <?php foreach ($penyakit as $pe) : ?>
                       <option value="<?php echo $pe->kode_penyakit; ?>"><?php echo $pe->nama_penyakit; ?></option>
                           <?php endforeach; ?>
                    </select>
                     <?php echo form_error('kode_penyakit', ' <small class="text-danger pl-3">', '</small> '); ?>
                </div>
                    <div class="form-group">
                    <select name="kode_gejala" class="form-control">
                       <option value="">Pilih Gejala</option>
                          <?php foreach ($gejala as $ge) : ?>
                       <option value="<?php echo $ge->kode_gejala; ?>"><?php echo $ge->nama_gejala; ?></option>
                           <?php endforeach; ?>
                    </select>
                     <?php echo form_error('kode_gejala', ' <small class="text-danger pl-3">', '</small> '); ?>
                </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="probabilitas" name="probabilitas" placeholder="Probabilitas">
                    <?php echo form_error('probabilitas', ' <small class="text-danger pl-3">', '</small> '); ?>
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