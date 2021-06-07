          <div class="box">
            <div class="box-header">
                <div class="row">
                <div class="col-sm-8">
                    <?= anchor('penjualan/tambah_penjualan','Tambah','class="btn btn-primary"') ?>
                    <?= anchor('penjualan/exportexcel/'.$this->input->post('tanggal'),'<i class="fa fa-print"></i> Excel','class="btn btn-primary"') ?>
                </div>
                <div class="col-sm-4">
                    <?= form_open(''); ?>
                    <select class="form-control" name="tanggal" type="submit" onchange="this.form.submit()">
                          <option>-- Pilih Tanggal --</option>
                          <?php
                            foreach($tanggal as $t)
                            { 
                              echo '<option>'.$t['tanggal'].'</option>';
                            }  
                          ?>
                    </select>
                    </form>
                </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
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
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                  foreach ($penjualan as $j) {
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
                  <td>
                    <?= anchor('penjualan/edit_penjualan/'. $j['id_transaksi'] ,'<i class="fa fa-edit"></i>','class="btn btn-warning btn-sm"') ?>
                    <?= anchor('penjualan/delete_penjualan/'. $j['id_transaksi'] ,'<i class="fa fa-trash"></i>','class="btn btn-danger btn-sm"') ?>
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
