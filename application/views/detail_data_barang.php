<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">

                    <?= anchor('data_barang','Kembali',' class="btn btn-default pull-right"') ?>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Nama Barang</th>
                  <td><?= $barang['nama'] ?></td>
                </tr>
                <tr>
                  <th>Jenis Barang</th>
                  <td><?= $barang['jenis_barang'] ?></td>
                </tr>
                <tr>
                  <th>Suplier</th>
                  <td><?= $barang['nama_suplier'] ?></td>
                </tr>
                <tr>
                  <th>Modal</th>
                  <td><?= $barang['modal'] ?></td>
                </tr>
                <tr>
                  <th>Harga Jual</th>
                  <td><?= $barang['harga'] ?></td>
                </tr>
                <tr>
                  <th>Stok</th>
                  <td><?= $barang['stok_barang'] ?></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>