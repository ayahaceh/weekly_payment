          <div class="box">
            <div class="box-header">
              <?= anchor('suplier/add_suplier','Tambah','class="btn btn-primary"') ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Suplier</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                  foreach ($suplier as $s) {
                ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $s['nama_suplier'] ?></td>
                  <td>
                    <?= anchor('suplier/edit_suplier/'. $s['id_suplier'] ,'<i class="fa fa-edit"></i>','class="btn btn-warning btn-sm"') ?>
                    <?= anchor('suplier/delete_suplier/'. $s['id_suplier'] ,'<i class="fa fa-trash"></i>','class="btn btn-danger btn-sm"') ?>
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
