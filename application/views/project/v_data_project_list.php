          <div class="box">
            <div class="box-header">
              <?= anchor('project/tambah_project', 'Tambah', 'class="btn btn-primary"') ?>
              <?= anchor('data_project/exportexcel', '<i class="fa fa-print"></i> Excel', 'class="btn btn-primary"') ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Project</th>
                    <th>Harga Project</th>
                    <th>Costumer</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($project as $b) {
                  ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><img src="<?= base_url('uploads/' . $b['foto']) ?>" width='50px'></td>
                      <td><?= $b['nama_project'] ?></td>
                      <td><?= $b['harga'] ?></td>
                      <td><?= $b['nama_costumer'] ?></td>
                      <td>
                        <!-- <?= anchor('project/view_project/' . $b['id'], '<i class="fa fa-eye"></i>', 'class="btn btn-success btn-sm"') ?> -->
                        <?= anchor('project/edit_project/' . $b['id'], '<i class="fa fa-edit"></i>', 'class="btn btn-warning btn-sm"') ?>
                        <?= anchor('project/delete_project/' . $b['id'], '<i class="fa fa-trash"></i>', 'class="btn btn-danger btn-sm"') ?>
                      </td>
                    </tr>
                  <?php
                    $no++;
                  }
                  ?>
                  </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->