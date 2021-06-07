          <div class="box">
            <div class="box-header">
              <?= anchor('data_barang/tambah_barang', 'Tambah', 'class="btn btn-primary"') ?>
              <?= anchor('data_barang/exportexcel', '<i class="fa fa-print"></i> Excel', 'class="btn btn-primary"') ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Barang</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($barang as $b) {
                  ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><img src="<?= base_url('uploads/' . $b['foto']) ?>" width='50px'></td>
                      <td><?= $b['nama'] ?></td>
                      <td><?= $b['harga'] ?></td>
                      <td><?= $b['stok_barang'] ?></td>
                      <td>
                        <?= anchor('data_barang/view_data_barang/' . $b['id_barang'], '<i class="fa fa-eye"></i>', 'class="btn btn-success btn-sm"') ?>
                        <?= anchor('data_barang/edit_data_barang/' . $b['id_barang'], '<i class="fa fa-edit"></i>', 'class="btn btn-warning btn-sm"') ?>
                        <?= anchor('data_barang/delete_data_barang/' . $b['id_barang'], '<i class="fa fa-trash"></i>', 'class="btn btn-danger btn-sm"') ?>
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