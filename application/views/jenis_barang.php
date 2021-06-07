          <div class="box">
            <div class="box-header">
              <?= anchor('jenis_barang/add_jenis_barang','Tambah','class="btn btn-primary"') ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Jenis Barang</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                  foreach ($jenis as $j) {
                ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $j['jenis_barang'] ?></td>
                  <td>
                    <?= anchor('jenis_barang/edit_jenis_barang/'. $j['id_jenis'] ,'<i class="fa fa-edit"></i>','class="btn btn-warning btn-sm"') ?>
                    <?= anchor('jenis_barang/delete_jenis_barang/'. $j['id_jenis'] ,'<i class="fa fa-trash"></i>','class="btn btn-danger btn-sm"') ?>
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

