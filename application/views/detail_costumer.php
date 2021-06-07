<!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

              <div class="box-tools">
                <!-- <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div> -->
              
              <?= anchor('costumer/exportpdf/'.$id,'<i class="fa fa-print"></i> PDF','class="btn btn-default"') ?>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th>Barang</th>
                  <th>Jenis Barang</th>
                  <th>Suplier</th>
                  <th>Jumlah</th>
                  <th>Harga Jual</th>
                  <th>Total</th>
                  <th>Laba</th>
                </tr>
                <?php
                  $no = 1;
                  foreach ($costumer as $j) {
                ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $j['kode_transaksi'] ?></td>
                  <td><?= $j['tanggal'] ?></td>
                  <td><?= $j['uname'] ?></td>
                  <td><?= $j['nama'] ?></td>
                  <td><?= $j['jenis_barang'] ?></td>
                  <td><?= $j['nama_suplier'] ?></td>
                  <td><?= $j['jumlah'] ?></td>
                  <td><?= $j['harga'] ?></td>
                  <td><?= $j['total_harga'] ?></td>
                  <td><?= $j['laba'] ?></td>
                </tr>
                <?php
                    $no++;
                   } 
                ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>