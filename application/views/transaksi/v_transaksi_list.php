          <div class="box">
            <div class="box-header bg-info">
              <h4 class="text-primary">Transaksi Pemakaian Barang Project</h4>
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
                        <?= anchor('transaksi/pemakaian/' . $b['id'], '<i class="fa fa-clone"></i> &nbsp; Pemakaian', 'class="btn btn-success btn-sm"') ?>
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