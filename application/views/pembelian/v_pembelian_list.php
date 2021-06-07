          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-tittle text-primary">Pembelian </h4>
              <div class="box-tools">
                <?= anchor('pembelian/tambah_pembelian', 'Tambah', 'class="btn btn-primary"') ?>
                <?= anchor('pembelian/exportexcel', '<i class="fa fa-print"></i> Excel', 'class="btn btn-primary"') ?>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kode Faktur</th>
                    <th>Supplier</th>
                    <th>Jumlah</th>
                    <th>Tgl Pengiriman</th>
                    <th>Alamat Pengiriman</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($pembelian as $b) {
                  ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= $b['tgl_pembelian'] ?></td>
                      <td><?= $b['kode_faktur'] ?></td>
                      <td><?= $b['nama_supplier'] ?></td>
                      <td>300.000,00</td>
                      <td><?= $b['tgl_pengiriman'] ?></td>
                      <td><?= $b['alamat_pengiriman'] ?></td>
                      <td>
                        <?= anchor('data_barang/view_data_barang/' . $b['id'], '<i class="fa fa-eye"></i>', 'class="btn btn-success btn-sm"') ?>
                        <?= anchor('data_barang/edit_data_barang/' . $b['id'], '<i class="fa fa-edit"></i>', 'class="btn btn-warning btn-sm"') ?>
                        <?= anchor('data_barang/delete_data_barang/' . $b['id'], '<i class="fa fa-trash"></i>', 'class="btn btn-danger btn-sm"') ?>
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